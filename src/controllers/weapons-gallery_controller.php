<?php
/**
 * This file is the controller for the weapons gallery page.
 * It handles the logic for displaying the gallery of weapons.
 * It retrieves the weapon types and weapons from the database and includes the view file.
 */
session_start();

require_once "models/weapons.php";

$weaponTypes = getAllWeaponTypesOrderedById();
$weapons = getAllWeapons();
$number = count($weapons);

include_once "views/weapons-gallery.php";