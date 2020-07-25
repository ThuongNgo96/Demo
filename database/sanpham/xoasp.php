<?php
$open= "sanpham";
require_once __DIR__ . "./../../ImportFile/importFile.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = postInput('idSanPham');

$EditProduct = $db->fetchSP("sanpham",$id);
if(empty($EditProduct)){
    echo '0';
}
$num=$db->deleteSP("sanpham",$id);
if($num>0){
    echo '1';
}else {
    echo '2';
}
}
