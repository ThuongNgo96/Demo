<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
$id = getInput('key');
unset($_SESSION['cart'][$id]);
echo 1;
