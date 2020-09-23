<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
// var_dump( $_SESSION['cart']);

header('Content-Type: text/html; charset=utf-8');
$connect = mysqli_connect('localhost', 'root', '', 'shopmypham') or die('Lỗi kết nối');
mysqli_select_db($connect, 'shopmypham');
mysqli_set_charset($connect, 'utf8');


    $hoten=$_POST['tennguoinhan'];
    $diachi=$_POST['diachi'];
    $phone=$_POST['sdt'];
    $mapt = $_POST['mapt'];

    $sql = "INSERT INTO nguoinhankhac(HoTen, DiaChi, SoDienThoai) VALUES('$hoten','$diachi','$phone')";
    // echo $sql;

    $query = mysqli_query($connect, $sql);
    $idnn = $connect->insert_id;
    if ($query) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $product = $db->fetchAll('sanpham');
            foreach ($_SESSION['cart'] as $key => $value) {
                $product = $db->fetchID('sanpham', $key);
                $soluong = $product['SoLuong'] - $value['SoLuong'];
                $updateSoLuong = $db->update("sanpham", array('SoLuong' => $soluong), array('MaSP' => $key));
            }
            $data = [
                'ID' => postInput('id'),
                'IDNguoiNhanKhac' => $idnn,
                'MaPT' => $mapt,
                'MaTTDH' => postInput('status'),
                'TongTien' => $_SESSION['sum'],
            ];
    
        $idHoaDon = $db->insert("donhang", $data);
        if ($idHoaDon > 0) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $data1 = [
                    'MaDH' => $idHoaDon,
                    'MaSP' => $key,
                    'SoLuongMua' => $value['SoLuong'],
                    'Gia' => $value['Gia'],
                ];
                $idCTHD = $db->insert("chitietdonhang", $data1);
            }
        }
    
        unset($_SESSION['cart']);
    } else {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="./dangky.php";</script>';
    }


    }
    echo "<script>alert('Thanh toán thành công');location.href='../index.php'</script>";
?>
