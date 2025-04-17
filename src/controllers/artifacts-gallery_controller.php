<?php
/**
 * This file is the controller for the artifacts gallery page.
 * It handles the request and response for the artifacts gallery page.
 * It retrieves the artifacts from the database and passes them to the view.
 */
session_start();

require_once "models/artifacts.php";

$artifacts = getAllArtifacts();
$number = count($artifacts);

include_once "views/artifacts-gallery.php";