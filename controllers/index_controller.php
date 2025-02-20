<?php
session_start();
// We just display the home page
require "views/index.php"; // and not ../views/index.php since we always go through the router before