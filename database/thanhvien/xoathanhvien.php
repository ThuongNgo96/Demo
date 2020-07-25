<?php
$open = "taikhoan";
require_once __DIR__ . "./../../ImportFile/importFile.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = postInput('idTaiKhoan');
    $EditTK = $db->fetchTK("taikhoan", $id);
    if (empty($EditTK)) {
        echo '0';
        die;
    }
    $num = $db->deleteTK("taikhoan", $id);
    if ($num > 0) {
        echo '1';
    }
}
