<?php
session_start();

require_once "models/artifacts.php";

$artifacts = getAllArtifacts();
$number = count($artifacts);

include_once "views/artifacts-gallery.php";