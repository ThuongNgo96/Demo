<?php
require_once __DIR__ . "./ImportFile/importFile.php";
$taikhoan = $db->fetchidByUsername('taikhoan', $_SESSION['username']);

?>

<!doctype html>
<html lang="en">
<link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">

<head>
</head>

<body>
    <?php include('head.php') ?>
    <h2 class="text-center mt-2">Đổi mật khẩu</h2>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="./database/xulydoimatkhau.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên đăng nhập</label>
                        
                        <input value="<?php echo $taikhoan['ID'] ?>" hidden class="form-control" name="idusername" id="idusername" required>
                        <input value="<?php echo $taikhoan['UserName'] ?>" disabled class="form-control" name="username" id="username" required>
                        <small id="emailHelp" class="form-text text-muted">Tên đăng nhập của bạn</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mật khẩu cũ</label>
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Password" required>
                        <?php if (isset($_SESSION['error']['oldPassword'])) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                Mật khẩu cũ không chính xác
                            </div>
                        <?php
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Password" required>
                        <?php if (isset($_SESSION['error']['confirmPass'])) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                Nhập lại mật khẩu không chính xác
                            </div>
                        <?php
                        } ?>
                    </div>
                    <button type="submit" class="change btn btn-primary">Đổi mật khẩu</button>
                </form>
            </div>
        </div>
    </div>

    <footer class=" mt-5">
        <?php
        include("footer.php")
        ?>
    </footer>
    <script type="text/javascript">
        $(document).ready(function() {
            // $(".change").click(function(e) {
            //     var username = $('#username').val()
            //     var oldPassword = $('#oldPassword').val()
            //     var newPassword = $('#newPassword').val()
            //     var confirmPass = $('#confirmPass').val()
            //     console.log(confirmPass)
            //     $.ajax({
            //         url: './database/xulydoimatkhau.php',
            //         type: 'POST',
            //         data: {
            //             'username': username,
            //             'oldPassword': oldPassword,
            //             'newPassword': newPassword,
            //             'confirmPass': confirmPass,
            //         },
            //         success: function(data) {
            //             // console.log(data)
            //             if (data == 1) {
            //                 swal({
            //                         title: "Thành Công",
            //                         text: "Đổi mật khẩu thành công!",
            //                         icon: "success",
            //                         button: "Đóng!",
            //                     })
            //                     // .then(function(willDelete) {
            //                         // location.replace('./index.php')
            //                     // })
            //             } else if(data =2) {
            //                 swal({
            //                     title: "Thất bại!",
            //                     text: "Nhập lại mật khẩu không trùng với mật khác mới",
            //                     icon: "error",
            //                     button: "Đóng !",
            //                 });
            //             } else if (data = 3) {
            //                 swal({
            //                     title: "Thất bại!",
            //                     text: "Mật khẩu cũ không đúng",
            //                     icon: "error",
            //                     button: "Đóng !",
            //                 });
            //             }else{
            //                 swal({
            //                     title: "Thất bại!",
            //                     text: "Đổi mật khẩu thất bại!",
            //                     icon: "error",
            //                     button: "Đóng !",
            //                 });
            //             }
            //         }
            //     })
            // })

        })
    </script>
</body>

</html>