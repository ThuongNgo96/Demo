<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
$idDonHang = getInput('id');
$DonHang = $db->fetchIDdonhang('DonHang', $idDonHang);

?>
<?php
include("headAmin.php");
?>
<link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">
<title>Duyet don</title>
<div class="container-fluid pt-48 pb-5 mt-4 ">
    <div class="row margin-top-50">
        <?php include("leftAdmin.php") ?>
        <div id="idPrint" class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
            <div class="row px-3">
                <div class="col-12 pt-3" style=" height: 50px;">
                    <h1 class="font-family-sakura text-center col-12">Shop Mỹ Phẩm SaKuRa </h1>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <div class="col-5 mt-4  card  ">
                            <h3 class="text-center pb-4">Địa chỉ người gửi: </h3>
                            <p class="mb-0"> Người gửi &emsp;&emsp;&emsp;&emsp;: Shop mỹ phẩm SaKuRa 
                            <hr>
                            <p class="mb-0"> Địa chỉ &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;: 44- Lê Lợi-Hải Châu- Đà Nẵng</p>
                            <hr>
                            <p class="mb-0"> Số điện thoại &emsp;&emsp;&nbsp;&nbsp;: 0353-898-109 </p>
                            <hr>
                    </div>
                    <div class="col-5 ml-4 mt-4 card  ">
                            <h3 class="text-center pb-4">Địa chỉ người nhận: </h3>
                            <p class="mb-0"> Họ tên người nhận : <?php echo $DonHang['TenNguoiNhan'] ?> </p>
                            <hr>
                            <p class="mb-0"> Địa chỉ &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;: <?php echo $DonHang['DiaChi'] ?></p>
                            <hr>
                            <p class="mb-0"> Số điện thoại &emsp;&emsp;&nbsp;&nbsp;: 0<?php echo $DonHang['SoDienThoai'] ?> </p>
                            <hr>
                        </div>
                </div>
                <div class="col-12 mt-5">
                    <h4 class="text-center">Chi tiết đơn hàng</h4>
                </div>
                <table class="col-12 mt-3 table table-hover table-bordered">
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
                                <td><?php echo number_format($row['Gia']) . ' đ' ?></td>
                                <td><?php echo number_format($thanhtien = $row['Gia'] * $row['SoLuongMua']) . ' đ' ?></td>
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
                <p class="text-danger">Cảm ơn Quý khách đã tin dùng sản phẩm của chúng tôi !!!</p>
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-secondary" onclick="printContent('idPrint')">In đơn hàng </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("footerAdmin.php")
?>
<script>
    function printContent(el) {
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        console.log(el);
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
    }
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