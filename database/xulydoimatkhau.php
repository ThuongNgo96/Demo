<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idname = postInput('idusername');
    $oldPassword = postInput('oldPassword');
    $newPassword = postInput('newPassword');
    $confirmPass = postInput('confirmPass');
    $taikhoan = $db->fetchTK('taikhoan', $idname);
    // var_dump($oldPassword);
    // die;
    unset($_SESSION['error']['oldPassword']);
    unset($_SESSION['error']['confirmPass']);
    unset($_SESSION['succes']);
    $data =
        [
            "Password" => $newPassword,
        ];
    if ($oldPassword != $taikhoan['Password']) {
        echo $_SESSION['error']['oldPassword'] = 'Mật khẩu cũ không chính xác!';
        header('Location: ./../doimatkhau.php');
        die;
    }
    if ($newPassword != $confirmPass) {
        echo $_SESSION['error']['confirmPass'] = 'Nhập lại mật khẩu không chính xác!';
        header('Location: ./../doimatkhau.php');
        die;
    }
    $update = $db->update("taikhoan", $data, array("ID" => $taikhoan['ID']));
    if ($update) {
        unset($_SESSION['username']);
        echo "<script>alert('Bạn đã đổi mật khẩu thành công. Mời bạn đăng nhập lại');location.href='./../dangnhap.php'</script>";
        // echo $_SESSION['succes'] = 'Đổi mật khẩu thành công!';
        // header('Location: ./../doimatkhau.php');
        // die;
    }
}
