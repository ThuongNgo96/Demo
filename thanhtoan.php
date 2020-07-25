<?php
require_once __DIR__ . "./ImportFile/importFile.php";
if (!$_SESSION['username']) {
    echo "<script>alert('Bạn cần phải đăng nhập để thanh toán');location.href='./index.php'</script>";
};
// _debug($_SESSION['username'])
$user = $db->fetchUser('taikhoan', $_SESSION['username']);
?>
<!doctype html>
<html lang="en">
<link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">

<head>
    <title>Title</title>
</head>

<body>
    <?php
    include('head.php');
    ?>
    <div class="container my-3 ">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class=" col-6 offset-3 border-pay bg-success" style=" border-radius: 9px">
                        <h1 class=" text-center">Thanh Toán Hóa Đơn</h1>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <form class=" d-flex flex-column w-75" method="POST" action="./database/xulythanhtoan.php">
                        <input class="form-control" value="<?php echo $user['ID'] ?>" type="text" hidden name="id">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tên người nhận:</label>
                            <input class="form-control" value="<?php echo $user['HoTen'] ?>" type="text" name="tennguoinhan">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Địa chỉ người nhận:</label>
                            <input class="form-control" type="text" value="<?php echo $user['DiaChi'] ?>" name="diachi">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Số điện thoại:</label>
                            <input class="form-control" value="<?php echo $user['SoDienThoai'] ?>" type="text" name="sdt">
                        </div>
                        <input class="form-control" value="10" type="text" hidden name="status">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tổng tiền:</label>
                            <input class="form-control" value="<?php echo number_format($_SESSION['sum']) . ' đ'  ?>" type="text" disabled name="tongtien">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Phương thức thanh toán:</label>
                            <select class="custom-select w-50 mb-3 " name="mapt">
                                <option>Phương Thức Thanh Toán</option>
                                <?php
                                $sql = "SELECT * FROM phuongthucthanhtoan";
                                $pay = $db->fetchsql($sql);
                                foreach ($pay as $value) {
                                ?>
                                    <option value="<?php echo $value['MaPT'] ?>"><?php echo $value['TenPhuongThuc'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class=" m-auto  w-25 btn btn-danger ">Thanh toán</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('footer.php');
    ?>
</body>

</html>