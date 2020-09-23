<?php
require_once __DIR__ . "./../ImportFile/importFile.php";

if (isset($_SESSION['username'])) {

    unset($_SESSION['username']); // xóa session login
    unset($_SESSION['cart']);
    header('Location: ../index.php');
}
