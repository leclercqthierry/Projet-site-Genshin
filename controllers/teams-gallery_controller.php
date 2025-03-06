<?php
session_start();

require_once "models/teams.php";

$teams = getAllTeams();

require_once "views/teams-gallery.php";