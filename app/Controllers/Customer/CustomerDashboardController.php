<?php

class CustomerDashboardController
{
    public function index(): void
    {
        // 确保会话已启动，这是修复的核心
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // 检查会话
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Customer') {
            header("Location: /login");
            exit;
        }

        $title = 'Fast Burgers - Customer Dashboard';
        $view = BASE_PATH . '/app/Views/customerDashboard.php';
        require BASE_PATH . '/app/Views/layout.php';
    }
}