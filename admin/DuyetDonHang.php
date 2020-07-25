<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
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
                    <h2>Duyệt Hóa Đơn</h2>
                </div>
                <!-- <div class=" d-flex">
                    <button class="btn btn-success"><i class="fas fa-plus-circle"></i> Create an a Bill</button>
                </div> -->
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
                        <th class="text-center" scope="col">Phân nhân viên giao hàng

                        </th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM donhang WHERE MaTTDH = '10' or MaTTDH ='1'  order by MaDH asc";
                    $bills = $db->fetchsql($sql);
                    foreach ($bills as $row) {
                        // if ($row['MaNVGiaoHang'] != NULL) {
                        //     var_dump($row['MaNHGiaoHang']);
                        //     die;
                        // $tenNV=$db->fetchTKNV("nhanvien", (int)$row['MaNHGiaoHang']);
                        
                        // }
                    ?>
                        <tr class=" border">
                            <th scope="row"><?php echo $row['MaDH'] ?></th>
                            <td><?php echo $row['TenNguoiNhan'] ?></td>
                            <td><?php echo  $row['DiaChi'] ?></td>
                            <td><?php echo "0" .$row['SoDienThoai'] ?></td>
                            <td><?php echo $row['NgayDat'] ?></td>
                            <td><?php echo number_format($row['TongTien']) . ' đ' ?></td>
                            <td>
                                <?php
                                if ( is_null($row['MaNVGiaoHang'])) {
                                ?>
                                <select id="<?php echo $row['MaDH'] ?>inputState" class="form-control" name="TenNV">
                                    <option>Chọn nhân viên...</option>
                                    <?php
                                    $sql = "SELECT * FROM nhanvien  order by MaNV asc"; // sắp xếp tăng dần 
                                    $NhanVien = $db->fetchsql($sql);
                                    foreach ($NhanVien as $key => $row1) {
                                    ?>
                                        <option value="<?php echo $row1['MaNV'] ?>"><?php echo $row1['HoTen'] ?></option>
                                    <?php  } ?>
                                </select>
                                    <?php }else{
                                        // var_dump($row['MaNVGiaoHang']);
                                        $NVGH=$db->fetchTKNV('nhanvien',$row['MaNVGiaoHang']);
                                        echo $NVGH['HoTen']
                                    ?>
                                    <?php }?>
                            </td>
                            <td class="d-flex">
                                <?php if ($row['MaTTDH'] == 10) { ?>
                                    <button value="<?php echo $row['MaDH'] ?>" class="duyet m-auto btn btn-warning"> Xử lý </button>
                                <?php } else { ?>
                                    <button disabled value="<?php echo $row['MaDH'] ?>" class="m-auto btn btn-success"> Đã duyệt </button>
                                    <a href="./ChiTietHoaDon.php?id=<?php echo $row['MaDH'] ?>" class="show m-auto btn btn-primary">Xem hóa đơn </a>
                                <?php } ?>
                            </td>

                        </tr>
                    <?php }
                    ?>

            </table>
            <!-- <div class="d-flex justify-content-between pt-3" style=" height: 50px;">
                <div class=" ">
                    <h2>Đơn Đã Hoàn Thành</h2>
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
                    $sql = "SELECT * FROM donhang WHERE MaTTDH = '3'   order by MaDH asc";
                    $bills = $db->fetchsql($sql);
                    foreach ($bills as $row) {
                    ?>
                        <tr class=" border">
                            <th scope="row"><?php echo $row['MaDH'] ?></th>
                            <td><?php echo $row['TenNguoiNhan'] ?></td>
                            <td><?php echo $row['DiaChi'] ?></td>
                            <td><?php echo "0" .$row['SoDienThoai'] ?></td>
                            <td><?php echo $row['NgayDat'] ?></td>
                            <td><?php echo number_format($row['TongTien']) . ' đ' ?></td>
                            <td class="d-flex">
                                <?php if ($row['MaTTDH'] == 10) { ?>    
                                    <button value="<?php echo $row['MaDH'] ?>" class="duyet m-auto btn btn-warning">Duyệt </button>
                                <?php } else { ?>
                                    <button disabled value="<?php echo $row['MaDH'] ?>" class="m-auto btn btn-success"> Đã Hoàn Thành </button>
                                    <a href="./ChiTietHoaDon.php?id=<?php echo $row['MaDH'] ?>" class="show m-auto btn btn-primary">Xem hóa đơn </a>
                                <?php } ?>
                            </td>

                        </tr>
                    <?php }
                    ?>

            </table>--->
        </div>
    </div>
</div>
<?php
include("footerAdmin.php")
?>
<!-- <div class="modal fade" id="chiTietHoaDon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết Hóa Đơn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row">
                    <div class="form-group col-8">
                        <label for="recipient-name" class="col-form-label">Tên sản phẩm:</label>
                        <input  type="text" class="form-control" id="TenSP">
                    </div>
                    <div class="form-group col-4">
                        <label for="recipient-name"  class="col-form-label">Số Lượng:</label>
                        <input disabled type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group col-4">
                        <label class=" text-center" for="recipient-name"  class="col-form-label">Tổng tiền:</label>
                    </div>
                    <div class="form-group col-8">
                        <input disabled type="text" class="form-control" id="recipient-name">
                    </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div> -->
<script>
    $(document).ready(function() {
        $(".duyet").click(function() {
            var id = $(this).val()
            var idNV = $('#' + id + 'inputState').find(":selected").val()
            console.log(idNV)
            $.ajax({
                url: './../database/xulyduyetdon.php',
                type: 'POST',
                data: {
                    'id': id,
                    'idNV': idNV,
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
                    } else {
                        swal({
                                title: "Thất Bại",
                                text: "Duyệt đơn hàng thất bại!",
                                icon: "error",
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
    // $(document).on("click", ".show", function () {
    //     var id = $(this).val()
    //     var modal = $('#chiTietHoaDon')
    //     modal.find('.modal-body #TenSP').val(id)
    //     modal.find('.modal-body #TenSP').text(id)
    // });
</script>