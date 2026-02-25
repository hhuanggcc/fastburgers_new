<?php
// This controller handles the home page (/)

class MenuController
{
public function index(): void
{
// Page title used by the layout
$title = 'Fast Burgers - Menu';

// Tell the layout which view to display
$view = BASE_PATH . '/app/Views/menu.php';

// Load the layout (which will load the view)
require BASE_PATH . '/app/Views/layout.php';
}
}