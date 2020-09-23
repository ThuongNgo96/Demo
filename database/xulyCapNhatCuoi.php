

<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy Id đơn hàng bên Xử Lý Đơn
    $idDH = postInput('id');
    $donhang = $db->fetchIDdonhang("donhang", $idDH);
    // echo($donhang['MaTTDH']);
    // die;
    //Update mã tình trạng đơn hàng thành 11  trong bảng donhanì
    if ($donhang['MaTTDH'] == 3) {
        $update = $db->update('donhang', array('MaTTDH' => 11), array('MaDH' => $idDH));
    } else {
        $update = $db->update('donhang', array('MaTTDH' => 12), array('MaDH' => $idDH));
    }
    if ($update) {
        echo 1;
    }else {
        echo 0;
    }

}
