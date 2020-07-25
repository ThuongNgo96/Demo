
<?php
session_start();
require_once __DIR__ . "./../database/database.php";
require_once __DIR__ . "./../database/function.php";
// require_once __DIR__ . "./../script/sweetalert.js";
$db = new Database;
define("ROOT", $_SERVER['DOCUMENT_ROOT'] . "/DoAnTong/ANH/");
?>