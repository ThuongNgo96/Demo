<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
$connect = mysqli_connect('localhost', 'root', '', 'shopmypham') or die('lỗi kết nối');
mysqli_select_db($connect, "shopmypham");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "<script>alert('Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu');location.href='./../login.php'</script>";
        exit;
    }
    //Kiểm tra tên đăng nhập có tồn tại không
    $sql1 = "SELECT UserName,Password FROM nhanvien WHERE UserName='$username'";
    $query = mysqli_query($connect, $sql1);
    // $query = $db->query($sql1);
    if (mysqli_num_rows($query) == 0) {
        echo "<script>alert('Tên đăng nhập này không tồn tại ');location.href='./login.php'</script>";
        exit;
    }

    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['Password']) {
        echo "<script>alert('Nhập mật khẩu không đúng vui lòng nhập lại');location.href='./login.php'</script>";
        exit;
    }

    // $name_session = "";

   
    //Lưu tên đăng nhập
    //Lưu tên đăng nhập
    $_SESSION["useradmin"] = $username;
    $phanquyen =$db->fetchidByUsername('nhanvien', $username);

    // if($phanquyen['MaPQ'] == 1){
    //     $_SESSION["useradmin"] = $username;
    // }else{
    //     if( $row['MaPQ']==4){
    //         $_SESSION["nvbanhang"] = $username1;
    //     }
    //     else{
    //         if($row['MaPQ'] == 2){
    //             $_SESSION["shipper"] = $username2;

    //         }
    //     }

    // }

    if ($phanquyen['MaPQ'] == '1' || $phanquyen['MaPQ']=='2'||$phanquyen=='4') {
        header('location: ./index.php');
    }
    // else if($phanquyen['MaPQ']=='2'){
    //     header('location')   
    // }
    else {
        header('Location: ./index.php');
        die();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head ('Content-Type: text/html; charset=utf-8');>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="./../css/bootstrap.css">
    <link rel="shortcut icon" type="image/png" href="ANH/icon.jpg">
    <title>Admin</title>
</head>

<body style="height: 100vh ; background-image:url(https://data.whicdn.com/images/84259561/original.gif); background-size:cover;">
    <div class=" container Login h-100 ">
        <div class="row  d-flex align-items-center w-100 h-100">
            <form method="POST" action="./login.php" class=" d-flex flex-column align-items-center m-auto btn-outline-info col-4" style="background-color:hotpink;">
                <img src="./../ANH/logo.png"  height="150px" width="170px">
              
                <h3 class="Login__1st-Row__Form__h3 pt-3 pb-2">Trang login ADMIN</h3>
                <input class=" form-control " type="text" name="username" placeholder="Username">
                <!-- <?php
                        if (isset($error['username'])) :
                        ?>
                    <strong class="text-danger"><?php echo $error['username'] ?></strong>
                <?php
                        endif
                ?> -->
                <input class="form-control " type="password" name="password" placeholder="Password">
                <div class=" mt-2">
                    <input type="checkbox">
                    <label>Remember me</label>
                </div>
                <button type="submit" name="login" class="mt-3 btn btn-success w-75"> Sign in</button>
                <p class="mt-5 ">©Design  By Thương Ngô 2020</p>
            </form>
        </div>
    </div>
</body>

</html>