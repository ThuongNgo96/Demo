<?php
require_once __DIR__ . "./../../ImportFile/importFile.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = postInput('idDH');
    $EditDH = $db->fetchIDdonhang("donhang", $id);
    if (empty($EditDH)) {
        echo '0';
        exit;
    }
    $deleteCTDH = $db->fetchAllCTHDbyMaHD("chitietdonhang", $id);
    foreach ($deleteCTDH as $key => $value) {
        $deleteCTDH = $db->deleteCTDH("chitietdonhang", $value["id"]);
    }
    $num = $db->deleteDH("donhang", $id);
    if ($num > 0) {
        echo '1';
    } else {
        echo '2';
    }
}
