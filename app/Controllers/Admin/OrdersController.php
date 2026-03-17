<?php

class OrdersController
{
    public function index(): void
    {
        // open connection
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check permission, only Manager and Sales can get access
        if (!isset($_SESSION['role']) ||
            ($_SESSION['role'] !== 'Manager' && $_SESSION['role'] !== 'Sales')) {
            header("Location: /login");
            exit;
        }

        $title = 'Fast Burgers - Orders';
        $view = BASE_PATH . '/app/Views/admin/orders.php';
        require BASE_PATH . '/app/Views/layout.php';
    }
}