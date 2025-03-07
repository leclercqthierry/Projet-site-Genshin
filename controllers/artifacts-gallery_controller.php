<?php
session_start();

require_once "models/artifacts.php";

$artifacts = getAllArtifacts();

include_once "views/artifacts-gallery.php";