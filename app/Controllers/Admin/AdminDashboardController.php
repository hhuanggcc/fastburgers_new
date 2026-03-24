<?php
// This controller handles the home page (/)
// require BASE_PATH . '/config/database.php';
class AdminDashboardController
{
    public function index(): void
    {
        // Page title used by the layout
        $title = 'Fast Burgers - Dashboard';
        

if (session_status() === PHP_SESSION_NONE) session_start();

if (empty($_SESSION['auth']['logged_in']) || empty($_SESSION['auth']['token'])) {
    header("Location: /login");
    exit;
}

/** @var mysqli $conn */
$conn =require BASE_PATH . '/config/database.php';
if (!$conn || !($conn instanceof mysqli)){
    die('Database connection not available.');
}

// Default values
$totalCustomers = 0;
$totalOrders = 0;
$totalRevenue = 0;
$totalStaffName = 'N/A';
$totalStaffOrders = 0;
$recentOrders = [];

// Total customers
$sqlCustomers = "SELECT COUNT(*) AS total_customers FROM customers";
$resultCustomers = $conn->query($sqlCustomers);

if ($resultCustomers && $row = $resultCustomers->fetch_assoc()){
    $totalCustomers = (int) $row['total_customers'];
}

// Total orders
$sqlOrders = "SELECT COUNT(*) AS total_orders FROM orders";
$resultOrders = $conn->query($sqlOrders);

if ($resultOrders && $row = $resultOrders->fetch_assoc()){
    $totalOrders = (int) $row['total_orders'];
}

// Total revenue form paid orders
$sqlRevenue = "SELECT IFNULL(SUM(order_total), 0) AS total_revenue
                 FROM orders";
$resultRevenue = $conn->query($sqlRevenue);

if ($resultRevenue && $row = $resultRevenue->fetch_assoc()){
    $totalRevenue = (int) $row['total_revenue'];
 }

 // Staff member with the most orders
 $sqlTotalStaff = "
     SELECT
         s.first_name,
         s.last_name,
         COUNT(o.order_id) AS order_count
     FROM orders o
     INNER JOIN staff s ON o.staff_id = s.staff_id
     GROUP BY s.staff_id, s.first_name, s.last_name
     ORDER BY order_count DESC, s.last_name ASC, s.first_name ASC
     LIMIT 1
     ";
     $resultTopStaff = $conn->query($sqlTopStaff);

     if ($resultTopStaff && $row = $resultTopStaff->fetch_assoc()){
         $topStaffName = trim($row['first_name'] . ' ' . $row['last_name']);
         $topStaffOrders = (int) $row['order_count'];
     }

//     // Recent orders with customer and staff names
//     $sqlRencentOrder = "
//         SELECT
//             o.order_id,
//             o.order_datetime,
//             o.payment_method,
//             o.order_total,
//             c.cust_first_name AS customer_first_name,
//             c.cust_last_name AS customer_last_name,
//             s.first_name AS staff_first_name,
//             s.last_name AS staff_last_name
//         FROM orders.o
//         INNER JOIN customers c ON o.customer_id = c.customer_id
//         INNER JOIN staff s ON o.staff_id = s.staff_id
//         ORDER BY o.order_datetime DESC
//         LIMIT 5
//         ";
//         $resultRencentOrders = $conn->query($sqlRencentOrder);

//         if($resultRencentOrders){
//             while ($row = $resultRencentOrders->fetch_assoc()){
//                 $rencentOrders[] = $row;
//             }
//         }



        // Tell the layout which view to display
        $view = BASE_PATH . '/app/Views/admin/adminDashboard.php';

        // Load the layout (which will load the view)
        require BASE_PATH . '/app/Views/layout.php';
    }
}