<?php
// This controller handles the home page (/)

class ContactController
{
public function index(): void
{
// Page title used by the layout
$title = 'Fast Burgers - Contact Us';

// Tell the layout which view to display
$view = BASE_PATH . '/app/Views/contact.php';

// Load the layout (which will load the view)
require BASE_PATH . '/app/Views/layout.php';
}
}