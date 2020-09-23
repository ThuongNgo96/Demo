<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
$soluong = getInput('soluong');
$sql = "SELECT * FROM sanpham ";
$product = $db->fetchsql($sql);
$MaCTDH= getInput('MaCTDH');
$CTDH = $db->fetchCTDHByID('chitietdonhang',$MaCTDH);
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = getInput('MaCTDH');

    $deleteCTDH = $db->fetchCTDHByID("chitietdonhang", $id);

    if (empty($deleteCTDH)) {
        echo '0';
    }
    $num = $db->deleteCTDH("chitietdonhang", $id);
    if ($num > 0) {
        $CTDHsauxoa = $db->fetchAllCTHDbyMaHD("chitietdonhang", $deleteCTDH["MaDH"]);
        if (count($CTDHsauxoa) > 0) {
            $db->update("donhang",["TongTien" => ($_SESSION['tongtiensausua'] - ( $CTDH['SoLuongMua']) * $CTDH['Gia'] )],["MaDH"=> $CTDH["MaDH"]]);
            echo '1';
            exit;
        } else {
            $deleteDH=$db->deleteDH("donhang",$deleteCTDH["MaDH"]);
            echo '2';
            exit;
        }
    
     } else {
       echo '0';
    }
 }
