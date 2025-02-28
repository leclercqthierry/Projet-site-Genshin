<?php
session_start();

require_once "models/artifacts.php";

$artifacts = getAllArtifacts();

require_once "views/artifacts-gallery.php";