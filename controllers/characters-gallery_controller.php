<?php
session_start();

require_once "models/weapons.php";
require_once "models/common.php";
require_once "models/characters.php";

$weaponTypes = getAllWeaponTypesOrderedById();
$elements = getAllElementsOrderedById();
$characters = getAllCharacters();

require_once "views/characters-gallery.php";