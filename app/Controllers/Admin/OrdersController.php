<?php

class OrdersController
{
    public function index(): void
    {
        // 先启动会话，这是核心修复
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // 权限检查：只允许 Manager 和 Sales 角色
        if (!isset($_SESSION['role']) ||
            ($_SESSION['role'] !== 'Manager' && $_SESSION['role'] !== 'Sales')) {
            header("Location: /login");
            exit;
        }

        $title = 'Fast Burgers - Orders';
        $view = BASE_PATH . '/app/Views/admin/orders.php'; // 修正视图路径
        require BASE_PATH . '/app/Views/layout.php';
    }
}