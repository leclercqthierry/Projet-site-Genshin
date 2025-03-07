<?php
session_start();

require_once "models/weapons.php";

$weaponTypes = getAllWeaponTypesOrderedById();
$weapons = getAllWeapons();

include_once "views/weapons-gallery.php";