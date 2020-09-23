<?php
// $open = "nhanvien";
require_once __DIR__ . "./../../ImportFile/importFile.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = postInput('idTaiKhoan');
    $EditTaiKhoan = $db->fetchTKNV("nhanvien", $id);
    if (empty($EditTaiKhoan)) {
        echo '0';
    }
    $num = $db->deleteTK("nhanvien", $id);
    if ($num > 0) {
        echo '1';
    }else{
        echo '0';
    }
}