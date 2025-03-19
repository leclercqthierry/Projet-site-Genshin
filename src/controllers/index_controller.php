<?php
session_start();
// We just display the home page
include_once "views/index.php"; // and not ../views/index.php since we always go through the router before