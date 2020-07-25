
<?php
require_once __DIR__ . "./../../ImportFile/importFile.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data =
        [
            "TenSP" => postInput('TenSP'),
            "GiaGoc" => postInput('price'),
            "DonGia" => postInput('pricesell'),
            "SoLuong" => postInput('soluong'),
            "MaDM" => postInput('category_id'),
            "ChiTietSP"=>postInput('ChiTietSP')
        ];
    // _debug($data);
    // _debug($data[]);
    if (isset($_FILES['thunbar'])) {
        $file_name = $_FILES['thunbar']['name'];
        $file_tmp = $_FILES['thunbar']['tmp_name'];
        $file_type = $_FILES['thunbar']['type'];
        $file_erro = $_FILES['thunbar']['error'];
        if ($file_erro == 0) {
            $part = ROOT;
            $data['HinhAnh'] = $file_name;
        }
    }
    $id_insert = $db->insert("sanpham", $data);
    if ($id_insert) {
        move_uploaded_file($file_tmp,$part.$file_name);
        $_SESSION['success'] = " thêm mới thành công ";
        redirect("./admin/sanpham.php");
    } else {
        $_SESSION['error'] = " thêm mới thất bại";
    }
}



// $id_insert= $db->insert("sanpham",$data);
// if($id_insert)
// {
//     $_SESSION['success']=" thêm mới thành công";
//     redirectAdmin("sanpham");
// }
// else
// {
//     $_SESSION['error']=" thêm mới thất bại ";
// }
// }
// 
?>