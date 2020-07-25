<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
$idDonHang = getInput('id');
$DonHang = $db->fetchIDdonhang('DonHang',$idDonHang);

?>
<?php
include("headAmin.php");
?>
<link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">
<title>Duyet don</title>
<div class="container-fluid pt-48 pb-5 mt-4 ">
    <div class="row ">
        <?php include("leftAdmin.php") ?>
        <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between pt-3" style=" height: 50px;">
                <div class=" ">
                    <h2>Chi Tiết Đơn Hàng </h2>
                </div>
            </div>
            <div class="mt-5">
                <p> Họ tên người nhận : <?php echo $DonHang['TenNguoiNhan'] ?>  </p>
                <p> Địa chỉ &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:  <?php echo $DonHang['DiaChi'] ?></p>
                <p> Số điện thoại &emsp;&emsp;&nbsp;&nbsp;: 0   <?php echo $DonHang['SoDienThoai'] ?> </p>
                <hr>
            </div>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <!-- <th class="text-center" scope="col">Id</th> -->
                        <th class="text-center" scope="col">Tên Sản Phẩm</th>
                        <th class="text-center" scope="col">Số Lượng Mua</th>
                        <th class="text-center" scope="col">Đơn Gía</th>
                        <th class="text-center" scope="col">Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM chitietdonhang WHERE MaDH = $idDonHang order by id asc";
                    $bills = $db->fetchsql($sql);
                    $tong = 0;
                    foreach ($bills as $row) {
                        $masp =  $row['MaSP'];
                        $findProduct = "SELECT * FROM sanpham WHERE MaSP = $masp";
                        $product = $db->fetchsql($findProduct);
                    ?>
                        <tr class=" border">
                            <td><?php echo $product[0]['TenSP'] ?></td>
                            <td><?php echo $row['SoLuongMua'] ?></td>
                            <td><?php echo number_format($row['Dongia']) . ' đ' ?></td>
                            <td><?php echo number_format($thanhtien = $row['Dongia'] * $row['SoLuongMua']) . ' đ' ?></td>
                        </tr>
                    <?php
                        $tong += $thanhtien;
                    }
                    ?>
                    <tr>
                        <td class="text-center" colspan="2">Tổng tiền</td>
                        <td class="text-center" colspan="3"><?php echo number_format($tong) . ' đ' ?></td>
                    </tr>
            </table>
            <div class="d-flex justify-content-end">
                <button class="btn btn-secondary" onclick="window.print()">In đơn hàng </button>
            </div>
        </div>
    </div>
</div>
<?php
include("footerAdmin.php")
?>
<script>
    $(document).ready(function() {
        $(".duyet").click(function() {
            var id = $(this).val()
            console.log(id)
            $.ajax({
                url: './../database/xulyduyetdon.php',
                type: 'POST',
                data: {
                    'id': id,
                },
                success: function(data) {
                    console.log(data)
                    if (data == 1) {
                        swal({
                                title: "Thành Công",
                                text: "Bạn đã duyệt 1 đơn hàng",
                                icon: "success",
                                button: "Đóng!",
                            })
                            .then(function(willDelete) {
                                location.replace('./DuyetDonHang.php')
                            })
                    }

                }
            })
        })

    })
</script>