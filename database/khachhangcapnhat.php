<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
// $MaSP = getInput('MaSP');
$soluong = getInput('soluong');
$sql = "SELECT * FROM sanpham ";
$product = $db->fetchsql($sql);
$MaCTDH= getInput('MaCTDH');
$CTDH = $db->fetchCTDHByID('chitietdonhang',$MaCTDH);
foreach ($product as $masp => $value) {
    if ($value['MaSP'] == $CTDH["MaSP"] and $value['SoLuong'] > $soluong) {
      // $updateSoluong="UPDATE chitietdonhang SET SoLuongMua= $soluong WHERE id= $MaCTDH ";
      $SoLuongsauUpdate=$value['SoLuong']-$soluong + $CTDH['SoLuongMua'];
      if ($db->update("chitietdonhang",["SoLuongMua" => $soluong],["id"=> $MaCTDH])) {
        $db->update("sanpham",["SoLuong" => $SoLuongsauUpdate],["MaSP"=> $CTDH["MaSP"]]);
        $db->update("donhang",["TongTien" => ($_SESSION['tongtiensausua'] + (($soluong - $CTDH['SoLuongMua']) * $CTDH['Gia']) )],["MaDH"=> $CTDH["MaDH"]]);
        echo '1';
        exit();
      }     
    }
}
echo '2';

//<?php
// require_once __DIR__ . "./../ImportFile/importFile.php";
// $key = getInput('key');
// $soluong = getInput('soluong');
// $sql = "SELECT * FROM sanpham ";
// $product = $db->fetchsql($sql);
// foreach ($product as $masp => $value) {
//     if ($value['MaSP'] == $key and $value['SoLuong'] > $soluong) {
//         $_SESSION['cart'][$key]['SoLuong'] = $soluong;
//         echo '1';
//         exit();
//     }
// }
// echo '0';