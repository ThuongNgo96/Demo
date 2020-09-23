<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
$key = getInput('key');
$soluong = getInput('soluong');
$sql = "SELECT * FROM sanpham ";
$product = $db->fetchsql($sql);
foreach ($product as $masp => $value) {
    if ($value['MaSP'] == $key and $value['SoLuong'] > $soluong) {
        $_SESSION['cart'][$key]['SoLuong'] = $soluong;
        echo '1';
        exit();
    }
}
echo '0';