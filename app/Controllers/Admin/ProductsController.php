<?php

class ProductsController
{
    public function index(): void
    {
        $title = 'Fast Burgers - Products';

        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Admin only protection
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
        if (!$conn || !$conn instanceof mysqli) {
            die('Database connection failed');
        }

        $products = [];

        $sqlProducts = "
            SELECT
                p.product_id,
                p.product_name,
                p.category,
                p.price,
                m.menu_name,
                s.stock_id,
                s.current_quantity,
                s.restock_threshold,
                ot.outlet_name
            FROM product p
            INNER JOIN menu m 
                ON p.menu_id = m.menu_id
            INNER JOIN stock s 
                ON p.product_id = s.product_id
            INNER JOIN outlet ot ON s.outlet_id = ot.outlet_id
            
            ORDER BY p.product_id ASC
        ";

        $result = $conn->query($sqlProducts);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        // Load view
        $view = BASE_PATH . '/app/Views/admin/products.php';
        require BASE_PATH . '/app/Views/layout.php';
    }
public function updateStock(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (empty($_SESSION['auth']['logged_in'])) {
        header("Location: /admin-login");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: /products");
        exit;
    }

    // Get POST values
    $stockId = (int)($_POST['stock_id'] ?? 0);
    $qty = (int)($_POST['current_quantity'] ?? -1);

    if ($stockId <= 0 || $qty < 0) {
        header("Location: /products");
        exit;
    }

    // DB connection
    /** @var mysqli $conn */
    $conn = require BASE_PATH . '/config/database.php';

    // Update stock
    $stmt = $conn->prepare("
        UPDATE stock
        SET current_quantity = ?
        WHERE stock_id = ?
    ");

    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }

    $stmt->bind_param("ii", $qty, $stockId);

    if (!$stmt->execute()) {
        die('Update failed: ' . $stmt->error);
    }

    $stmt->close();

    header("Location: /products");
    exit;
}
}
    


