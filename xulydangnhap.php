 <?php
    require_once __DIR__ . "./ImportFile/importFile.php";
    $connect = mysqli_connect('localhost', 'root', '', 'shopmypham') or die('lỗi kết nối');
    mysqli_select_db($connect, "shopmypham");

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
        if (!$username || !$password) {
            echo "<script>alert('Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu');location.href='./../dangnhap.php'</script>";
            exit;
        }
        //Kiểm tra tên đăng nhập có tồn tại không
        $sql1 = "SELECT UserName,Password FROM taikhoan WHERE UserName='$username'";
        $query = mysqli_query($connect, $sql1);
        // $query = $db->query($sql1);
        if (mysqli_num_rows($query) == 0) {
            echo "<script>alert('Tên đăng nhập này không tồn tại ');location.href='./dangnhap.php'</script>";
            exit;
        }

        //Lấy mật khẩu trong database ra
        $row = mysqli_fetch_array($query);
        //So sánh 2 mật khẩu có trùng khớp hay không
        if ($password != $row['Password']) {
            echo "<script>alert('Nhập mật khẩu không đúng vui lòng nhập lại');location.href='./dangnhap.php'</script>";
            exit;
        }

        //Lưu tên đăng nhập
        //Lưu tên đăng nhập
        $_SESSION['username'] = $username;
        $phanquyen = $db->fetchidByUsername('taikhoan', $username);
        if ($phanquyen['MaPQ'] == '1' && $phanquyen['MaPQ']=='2') {
            header('location: ./admin/index.php');
        }
        // else if($phanquyen['MaPQ']=='2'){
        //     header('location')
        // }
        else {
            header('Location: ./index.php');
            die();
        }
    }
