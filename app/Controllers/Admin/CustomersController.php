<?php

class CustomersController
{
    public function index(): void
    {
        $title = 'Fast Burgers - Customers';

        // Start session if not active
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Secure: Only logged-in admins can access (redirect to admin login)
        if (
            empty($_SESSION['auth']['logged_in']) ||
            empty($_SESSION['auth']['token']) ||
            empty($_SESSION['auth']['is_admin'])
        ) {
            header('Location: /admin-login');
            exit;
        }

        // Database connection
        /** @var mysqli $conn */
        $conn = require BASE_PATH . '/config/database.php';

        if (!$conn || !($conn instanceof mysqli)) {
            die('Database connection not available.');
        }

        $customers = [];

        $sqlCustomers = "
            SELECT
                c.customer_id,
                c.cust_first_name,
                c.cust_last_name,
                c.customer_phoneNo,
                c.email,
                COUNT(o.order_id) AS total_orders
            FROM customers c
            LEFT JOIN orders o ON c.customer_id = o.customer_id
            WHERE c.customer_type = 'online'
            GROUP BY c.customer_id
            ORDER BY c.customer_id ASC 
        ";
        
        $result = $conn->query($sqlCustomers);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $customers[] = $row;
            }
        }


        // Load the orders view
        $view = BASE_PATH . '/app/Views/admin/customers.php';
        require BASE_PATH . '/app/Views/layout.php';
    }
}