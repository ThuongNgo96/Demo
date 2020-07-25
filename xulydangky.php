
<?php
// session_start();
require_once __DIR__ . "./ImportFile/importFile.php";
?>
<?php
header('Content-Type: text/html; charset=utf-8');
$connect = mysqli_connect('localhost', 'root', '', 'shopmypham') or die('Lỗi kết nối');
mysqli_select_db($connect, 'shopmypham');
mysqli_set_charset($connect, 'utf8');

if (isset($_POST['gui'])) {
    $hoten = $_POST['hoten'];
    $diachi = $_POST['address'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nhaplaimk = $_POST['nhaplaimk'];
    // echo $hoten . "\n" . $diachi . "\n" . $phone . "\n" . $username . "." . $password;


    if ($password != $nhaplaimk) {
        echo '<script language="javascript">alert("Mật khẩu không khớp, vui lòng nhập lại "); window.location="./dangky.php"; 
        alert= "mời bạn nhập lại "</script>';
        exit;
    } else {
        $password = $nhaplaimk;
    }
    $sql = "SELECT * FROM TaiKhoan WHERE UserName = '$username' ";

    // Thực thi câu truy vấn
    $result = mysqli_query($connect, $sql);
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username l đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0) {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Username này đã có người sử dụng mời bạn chọn UserName khác."); window.location="./dangky.php";</script>';

        // Dừng chương trìnhPf
        die();
    }


    if (!isset($hoten, $diachi, $phone, $username, $password)) {
        echo '<script language="javascript">alert("Đăng ký không thành công"); window.location="../dangky.php"; 
                                alert= "mời bạn nhập đầy đủ"</script>';
    } else {

        $sql = "INSERT INTO taikhoan(HoTen, DiaChi, SoDienThoai , UserName, Password, MaPQ) VALUES('$hoten','$diachi','$phone','$username', '$password',3)";
        echo $sql;

        $query = mysqli_query($connect, $sql);
        if ($query) {
            echo '<script language="javascript">alert("Đăng ký thành công"); 
            alert= "Xin chào user: ' . $username . '"; 
            window.location="./index.php"; </script>';
            $_SESSION['username'] = $username;
        } else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="./dangky.php";</script>';
        }
    }
}

// if ($query) {
//     echo '<script language="javascript">alert("Đăng ký thành công"); window.location="..//index.php"; 
//         alert= "mời bạn đăng nhập "</script>';
// } else {
//     echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="./dangky.php";</script>';
// }
?>