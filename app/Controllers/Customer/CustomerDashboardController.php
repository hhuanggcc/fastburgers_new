<?php
// This controller handles the home page (/)
// require BASE_PATH . '/config/database.php';
class CustomerDashboardController
{
    public function index(): void
    {
        // Page title used by the layout
        $title = 'Fast Burgers - Dashboard';

        // Tell the layout which view to display
        $view = BASE_PATH . '/app/Views/customer/customerDashboard.php';

        // Load the layout (which will load the view)
        require BASE_PATH . '/app/Views/layout.php';
    }
}