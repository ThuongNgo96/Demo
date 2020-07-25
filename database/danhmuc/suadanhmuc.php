<?php
require_once __DIR__ . "./../../ImportFile/importFile.php";

// $idDM=getInput('id');
// $tenDM = $db->fetchDM("danhmuc",$idDM);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDM = postInput('idDanhMuc');
    $tenDM = postInput('tenDanhMuc');
    $EditCategory = $db->fetchDM("danhmuc", $idDM);
    if (empty($EditCategory)) {
        echo '0';
    }
    $id_update = $db->update("danhmuc",array('tenDM' => $tenDM),array("MaDM"=>$idDM));
    if ($id_update > 0) {
        echo '1';
    }
}



?>

