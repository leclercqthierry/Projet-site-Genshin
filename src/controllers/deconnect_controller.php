<?php
session_start();
session_destroy();

// Redirect to home page
header("location: index");