<?php

class UsersController
{
    public function index(): void
    {
        // 先启动会话，这是核心修复
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // 权限检查：只允许 Manager 角色
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Manager') {
            header("Location: /login");
            exit;
        }

        $title = 'Fast Burgers - Users';
        $view = BASE_PATH . '/app/Views/admin/user.php'; // 修正视图路径
        require BASE_PATH . '/app/Views/layout.php';
    }
}