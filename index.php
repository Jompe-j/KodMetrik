<?php

require_once "view/LayoutView.php";

// Display error messages.
error_reporting(E_ALL);
ini_set('display_errors', 'On');

LayoutView::render();
