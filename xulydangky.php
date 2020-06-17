<?php
header('Content-Type: text/html; charset=utf-8');
  
// Vì tên button submit là do-register nên ta sẽ kiểm tra nếu
// tồn tại key này trong biến toàn cục $_POST thì nghĩa là người 
// dùng đã click register(submit)
if (isset($_POST['gui']))
{
    // Lấy thông tin
    // Để an toàn thì ta dùng hàm mssql_escape_string để
    // chống hack sql injection
   // $username   = isset($_POST['username']); //? //mysqli_escape_string($_POST['username']) : '';
   // $password   = isset($_POST['password']) ? md5($_POST['password']) : '';
    $phone      = mysqli_escape_string($conn,$_POST['phone']);
   // $password   = isset($_POST['password']) ;//? //md5($_POST['password']) : '';
    $hoten      = isset($_POST['hoten']) ?mysqli_real_escape_string($conn,$_POST['hoten']) : '';
    $diachi     = mysqli_escape_string($conn,$_POST['address']);
    // Validate Thông Tin Username và Email có bị trùng hay không
        //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    //if (!$username || !$password || !$diachi || !$phone || !$hoten)
    //{
     //   echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
      //  exit;
    //}
    // Kết nối CSDL
    $conn = mysqli_connect('localhost', 'root', '', 'doantong') or die ('Lỗi kết nối');
    mysqli_set_charset($conn, "utf8");
      
    // Kiểm tra username hoặc email có bị trùng hay không
    
    $sql = "SELECT * FROM taikhoan WHERE username = '$username' OR email = '$email'";
      
    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);
      
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Thông tin đăng nhập bị sai"); window.location="register.php";</script>';
          
        // Dừng chương trình
        die ();
    }
    else {
        // Ngược lại thì thêm bình thường
        $sql = "INSERT INTO taikhoan (HoTen, DiaChi, SoDienThoai, UseName,Password) VALUES ('$hoten','$diachi','$phone','$username ', '$password')";
          
        if (mysqli_query($conn, $sql)){
            echo '<script language="javascript">alert("Đăng ký thành công"); window.location="index.php";</script>';
        }
        else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
        }
    }
}