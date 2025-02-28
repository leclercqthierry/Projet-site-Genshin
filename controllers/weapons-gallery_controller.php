<?php

require_once "models/weapons.php";

$weaponTypes = getAllWeaponTypesOrderedById();
$weapons = getAllWeapons();

require_once "views/weapons-gallery.php";