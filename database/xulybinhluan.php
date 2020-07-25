<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idSP = postInput('idSP');
    $username = postInput('username');
    $comment = postInput('comment');
    $MaTK = $db->fetchidByUsername("taikhoan", $username);
    if ($comment == '') {
        echo 2;
        die;
    }
    $data1 = [
        'MaTK' => $MaTK['ID'],
        'MaSP' => $idSP,
        'BinhLuan' => $comment,
    ];
    $insert = $db->insert("binhluansp", $data1);
    if ($insert) {
        echo 1;
        die;
    } else {
        echo 0;
        die;
    }
    // $product = $db->fetchIDdonhang('donhang', $idDH);
    // $update = $db->update('donhang', array('MaTTDH' => '1'), array('MaDH' => $idDH));
}
