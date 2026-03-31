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
}