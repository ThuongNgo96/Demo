
<?php
require_once __DIR__ . "./../../ImportFile/importFile.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $tenDM=[
        'tenDM' => postInput('TenDM'),
    ];
    // _debug($tenDM);
    if (empty($error)) {
        $id_insert = $db->insert("danhmuc", $tenDM);
        if ($id_insert > 0) {
            $_SESSION['success'] = " thêm mới thành công";
            redirectAdmin("danhmuc.php");
        } else {
            $_SESSION['error'] = " thêm mới thất bại";
        }
        print_r($id_insert);
    }
}


?>