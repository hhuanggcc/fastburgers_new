<?php

class OrdersController
{
    public function index(): void
    {
        $title = 'Fast Burgers - Orders';

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

        // Default empty orders array
        $recentOrders = [];

        // Get ALL orders with customer + staff details (sorted newest first)
        $sqlRecentOrders = "
            SELECT
                o.order_id,
                o.order_datetime,
                o.payment_method,
                o.order_total,
                o.status,
                c.cust_first_name AS customer_first_name,
                c.cust_last_name AS customer_last_name,
                s.first_name AS staff_first_name,
                s.last_name AS staff_last_name
            FROM orders o
            INNER JOIN customers c ON o.customer_id = c.customer_id
            INNER JOIN staff s ON o.staff_id = s.staff_id
            ORDER BY o.order_datetime DESC
        ";
        
        $resultRecentOrders = $conn->query($sqlRecentOrders);

        if ($resultRecentOrders) {
            while ($row = $resultRecentOrders->fetch_assoc()) {
                $recentOrders[] = $row;
            }
        }

        // Load the orders view
        $view = BASE_PATH . '/app/Views/admin/orders.php';
        require BASE_PATH . '/app/Views/layout.php';
    }
    public function delete(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['auth']['logged_in'])) {
            header('Location: /admin-login');
            exit;
        }

        $orderId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        if ($orderId <= 0) {
            die('Invalid order ID.');
        }

        /** @var mysqli $conn */
        $conn = require BASE_PATH . '/config/database.php';

        if (!$conn || !($conn instanceof mysqli)) {
            die('Database connection not available.');
        }   
        
        // FIRST: DELETE RELATED ORDER ITEMS (fix foreign key error)
        $stmt = $conn->prepare("DELETE FROM order_item WHERE order_id = ?");

        if (!$stmt) {
            die('Prepare order item delete failed: ' . $conn->error);
        }

        $stmt->bind_param("i", $orderId);

        if (!$stmt->execute()) {
            die('Order item delete failed: ' . $stmt->error);
        }

        $stmt->close();

        // Then, delete the order
        $stmt = $conn->prepare("DELETE FROM orders WHERE order_id = ?");

        if (!$stmt) {
            die('Prepare failed: ' . $conn->error);
        }

        $stmt->bind_param("i", $orderId);

        if (!$stmt->execute()) {
            die('Delete failed: ' . $stmt->error);
        }

        $stmt->close();

        header('Location: /orders');
        exit;
    }

    public function edit(): void
    {
        $title = 'Fast Burgers - Edit Order';
        $errors = [];

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['auth']['logged_in'])) {
            header('Location: /admin-login');
            exit;
        }

        $orderId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        if ($orderId <= 0) {
            die('Invalid order ID.');
        }

        /** @var mysqli $conn */
        $conn = require BASE_PATH . '/config/database.php';

        if (!$conn || !($conn instanceof mysqli)) {
            die('Database connection not available.');
        }

        // If form submitted, update order
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $paymentMethod = trim($_POST['payment_method'] ?? '');
            $status = trim($_POST['status'] ?? '');
            $ordertotal = isset($_POST['order_total']) ? (float) $_POST['order_total'] : 0;

            if ($paymentMethod === '') {
                $errors[] = 'Payment method is required.';
            }

            if ($status === '') {
                $errors[] = 'Status is required.';
            }

            if ($ordertotalal < 0) {
                $errors[] = 'Total must be 0 or greater.';
            }

            if (empty($errors)) {
                $stmt = $conn->prepare("
                    UPDATE orders
                    SET payment_method = ?, status = ?, order_total = ?
                    WHERE order_id = ?
                ");

                if (!$stmt) {
                    die('Prepare failed: ' . $conn->error);
                }

                $stmt->bind_param("ssdi", $paymentMethod, $status, $ordertotal, $orderId);

                if (!$stmt->execute()) {
                    die('Update failed: ' . $stmt->error);
                }

                $stmt->close();

                header('Location: /orders');
                exit;
            }
        }

        // Load current order data
        $stmt = $conn->prepare("
            SELECT order_id, order_datetime, payment_method, order_total, status
            FROM orders
            WHERE order_id = ?
            LIMIT 1
        ");

        if (!$stmt) {
            die('Prepare failed: ' . $conn->error);
        }

        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();
        $order = $result ? $result->fetch_assoc() : null;
        $stmt->close();

        if (!$order) {
            die('Order not found.');
        }

        $view = BASE_PATH . '/app/Views/admin/edit-order.php';
        require BASE_PATH . '/app/Views/layout.php';
    }
}