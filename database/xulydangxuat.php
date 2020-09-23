<?php
require_once __DIR__ . "./../ImportFile/importFile.php";

// if (isset($_SESSION['username'])) {

//     unset($_SESSION['username']); // xóa session login
//     unset($_SESSION['cart']);
//     header('Location: ../index.php');
// }
if (isset($_SESSION['useradmin'])) {
    
    unset($_SESSION['useradmin']); // xóa session login
    unset($_SESSION['cart']);
    header('Location: ../admin/login.php');
}