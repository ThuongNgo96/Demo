<?php
require_once __DIR__ . "./../ImportFile/importFile.php";

if (!isset($_SESSION['username'])) {
    echo "0";
    exit();
}
$id = getInput('id');
$product = $db->fetchID('sanpham', $id);

if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['TenSP'] = $product['TenSP'];
    $_SESSION['cart'][$id]['HinhAnh'] = $product['HinhAnh'];
    $_SESSION['cart'][$id]['Gia'] = $product['Gia'];
    $_SESSION['cart'][$id]['SoLuong'] = 1;
} else if ($_SESSION['cart'][$id]['SoLuong'] == $product['SoLuong']) {
    $_SESSION['cart'][$id]['SoLuong'] += 0;
    echo 101010;
    exit();
} else {
    $_SESSION['cart'][$id]['SoLuong'] += 1;
}
$qtyProduct = count($_SESSION['cart']);
echo $qtyProduct;
