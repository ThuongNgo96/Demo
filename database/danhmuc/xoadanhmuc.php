<?php
$open = "danhmuc";
require_once __DIR__ . "./../../ImportFile/importFile.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = postInput('idDanhMuc');

    $EditCategory = $db->fetchDM("danhmuc", $id);
    if (empty($EditCategory)) {
        echo '0';
    }
    $num = $db->deleteDM("danhmuc", $id);
    if ($num > 0) {
        echo '1';
    }else{
        echo '0';
    }
}
