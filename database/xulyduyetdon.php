<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idDH = postInput('id');
    $idNV = postInput('idNV');
    $product = $db->fetchIDdonhang('donhang', $idDH);
    $update = $db->update('donhang', array('MaTTDH' => '1','MaNVGiaoHang' => $idNV), array('MaDH' => $idDH));
    if ($update) {
        echo 1;
    }else{
        echo 0;
    }
}

