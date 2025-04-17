<?php
/**
 * This file is the controller for the characters gallery page.
 * It handles the logic for displaying the characters in the gallery.
 */

session_start();

require_once "models/weapons.php";
require_once "models/common.php";
require_once "models/characters.php";

$weaponTypes = getAllWeaponTypesOrderedById();
$elements = getAllElementsOrderedById();
$characters = getAllCharacters();
$number = count($characters);

include_once "views/characters-gallery.php";