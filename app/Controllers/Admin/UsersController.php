<?php

class UsersController
{
    public function index(): void
    {
        // start connection
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // only manager get access
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Manager') {
            header("Location: /login");
            exit;
        }

        $title = 'Fast Burgers - Users';
        $view = BASE_PATH . '/app/Views/admin/user.php'; // 修正视图路径
        require BASE_PATH . '/app/Views/layout.php';
    }
}