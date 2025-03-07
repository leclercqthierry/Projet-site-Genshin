<?php
session_start();

require_once "models/teams.php";

$teams = getAllTeams();

include_once "views/teams-gallery.php";