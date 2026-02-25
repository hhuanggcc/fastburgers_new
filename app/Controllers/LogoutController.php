<?php

class LoginController
{
    public function index(): void
    {
        $title = 'Fast Burgers - Login';
        $errors = [];

        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            // Optional: strengthen session cookie settings (works if HTTPS in prod)
            // ini_set('session.cookie_secure', '1');   // only over HTTPS
            // ini_set('session.cookie_httponly', '1'); // JS cannot read cookie
            // ini_set('session.cookie_samesite', 'Lax');
            session_start();
        }

        // If already logged in, redirect away (optional)
        if (!empty($_SESSION['auth']['logged_in'])) {
            header('Location: /');
            exit;
        }

        /** @var mysqli $conn */
        $conn = require BASE_PATH . '/config/database.php';

        if (!$conn || !($conn instanceof mysqli)) {
            die('Database connection not available.');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            // Validate
            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Please enter a valid email address.';
            }
            if ($password === '') {
                $errors[] = 'Please enter your password.';
            }

            if (empty($errors)) {
               $sql = "SELECT customer_id, cust_first_name, cust_last_name, email, hashed_password
        FROM customers
        WHERE email = ?
        LIMIT 1";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    $errors[] = 'Database error. Please try again.';
} else {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result ? $result->fetch_assoc() : null;
    $stmt->close();   

    if (
        !$user ||
        empty($user['hashed_password']) ||
        !password_verify($password, $user['hashed_password'])
    ) {
        $errors[] = 'Incorrect email or password.';
    } else {
        session_regenerate_id(true);

        $customerName = trim(($user['cust_first_name'] ?? '') . ' ' . ($user['cust_last_name'] ?? ''));

        $_SESSION['auth'] = [
            'logged_in' => true,
            'token' => bin2hex(random_bytes(32)),
            'token_issued_at' => time(),
        ];

        $_SESSION['customer'] = [
            'customer_id' => (int)$user['customer_id'],
            'name' => $customerName,
            'first_name' => $user['cust_first_name'],
            'last_name' => $user['cust_last_name'],
            'email' => $user['email'],
        ];

        header('Location: customer-dashboard');
        exit;
    }
}

            }
        }

        // Render view
        $view = BASE_PATH . '/app/Views/login.php';
        require BASE_PATH . '/app/Views/layout.php';
    }
}