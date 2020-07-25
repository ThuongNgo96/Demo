<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
$username = $db->fetchTKNVbyUsername('nhanvien',$_SESSION['useradmin']);
$idNV = $username["MaNV"];
?>
<?php
include("headAmin.php");
?>
<link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">
<div class="container-fluid pt-48 pb-5 mt-4">
    <div class="row ">
        <?php include("leftAdmin.php") ?>
        <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between pt-3" style=" height: 50px;">
                <div class=" ">
                    <h2>Xử Lý Hóa Đơn</h2>
                </div>
            </div>
            <hr>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" scope="col">Id</th>
                        <th class="text-center" scope="col">Tên người nhận</th>
                        <th class="text-center" scope="col">Địa chỉ</th>
                        <th class="text-center" scope="col">Số điện thoại</th>
                        <th class="text-center" scope="col">Ngày đặt</th>
                        <th class="text-center" scope="col">Tổng tiền</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($username['MaPQ']=="1") {
                        $sql = "SELECT * FROM donhang WHERE MaTTDH = '2' order by MaDH asc";
                    }
                    else{
                    $sql = "SELECT * FROM donhang WHERE MaTTDH = '2' and MaNVGiaoHang = $idNV order by MaDH asc";
                    }
                    $bills = $db->fetchsql($sql);
                    foreach ($bills as $row) {
                    ?>
                        <tr class=" border">
                            <th scope="row"><?php echo $row['MaDH'] ?></th>
                            <td><?php echo $row['TenNguoiNhan'] ?></td>
                            <td><?php echo $row['DiaChi'] ?></td>
                            <td><?php echo "0" . $row['SoDienThoai'] ?></td>
                            <td><?php echo $row['NgayDat'] ?></td>
                            <td><?php echo number_format($row['TongTien']) . ' đ' ?></td>
                            <td class="d-flex">
                                <button value="<?php echo $row['MaDH'] ?>" class="trave m-auto btn btn-danger">Hoàn trả</button>
                                <button value="<?php echo $row['MaDH'] ?>" class="xongdon m-auto btn btn-success">Đã Xong</button>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include("footerAdmin.php")
?>
<script>
    $(document).ready(function() {
        $(".xongdon").click(function() {
            var idDonHang = $(this).val()
            console.log(idDonHang)
            swal({
                    title: "Bạn có chắc chắn",
                    text: "Đơn hàng của bạn đã được giao và nhận đủ số tiền ! Bạn sẽ không thể hoàn tác lại ! ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: './../database/xulydonhoanthanh.php',
                            type: 'POST',
                            data: {
                                'idDonHang': idDonHang,
                            },
                            success: function(data) {
                                console.log(data)
                                if (data == 1) {
                                    swal("Thành Công! Một đơn hàng của bạn đã hoàn thành !", {
                                            icon: "success",
                                        })
                                        .then(function(willDelete) {
                                            location.replace('./XuLyDonTraVe.php')
                                        })
                                } else {
                                    swal("Xử lý thất bại!");
                                }
                            }
                        })
                    } else {
                        swal("Xử lý thất bại!");
                    }
                });
        })

    })
    $(document).ready(function() {
        $(".trave").click(function() {
            var idDonHang = $(this).val()
            console.log(idDonHang)
            swal({
                    title: "Bạn có chắc chắn",
                    text: "Đơn hàng của bạn đã bị hoàn trả ! Bạn sẽ không thể hoàn tác lại thao tác này ! ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: './../database/xulydontrave.php',
                            type: 'POST',
                            data: {
                                'idDonHang': idDonHang,
                            },
                            success: function(data) {
                                console.log(data)
                                if (data == 1) {
                                    swal("Thành Công! Một đơn hàng của bạn đã trả về, số lượng sản phẩm trong cửa hàng đã tăng lên.", {
                                            icon: "success",
                                        })
                                        .then(function(willDelete) {
                                            location.replace('./xulydontrave.php')
                                        })
                                }
                            }
                        })
                    } else {
                        swal("Xử lý thất bại!");
                    }
                });
        })

    })
</script>