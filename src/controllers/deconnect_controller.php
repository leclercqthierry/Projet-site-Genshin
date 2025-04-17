<?php
/**
 * This file is the controller for the deconnection.
 * It destroys the session and redirects to the home page.
 */

session_start();
session_destroy();

// Redirect to home page
header("location: index");