<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
?>
<?php
include("headAmin.php");
?>
<link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">
<title>Duyet don</title>
<div class="container-fluid pt-48 pb-5 mt-4 ">
    <div class="row margin-top-50">
        <?php include("leftAdmin.php") ?>
        <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between pt-3" style=" height: 50px;">
                <div class=" ">
                    <h2> Cập Nhật Tình Trạng Đóng Gói Đơn hàng</h2>
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
                    $sql = "SELECT * FROM donhang WHERE MaTTDH = '1' or MaTTDH='5'   order by MaDH asc";
                    $bills = $db->fetchsql($sql);
                    foreach ($bills as $row) {
                        if ($row['IDNguoiNhanKhac'] == 0 || $row['IDNguoiNhanKhac'] == null){
                            $TK=$db->fetchTK('taikhoan',$row['ID']);
                        }else{
                            $TK=$db->fetchTKNNK('nguoinhankhac',$row['IDNguoiNhanKhac']);
                        }
                        // if ($row['MaNVGiaoHang'] != NULL) {
                        //     var_dump($row['MaNHGiaoHang']);
                        //     die;
                        // $tenNV=$db->fetchTKNV("nhanvien", (int)$row['MaNHGiaoHang']);

                        // }
                    ?>
                        <tr class=" border">
                            <th scope="row"><?php echo $row['MaDH'] ?></th>
                            <td><?php echo $TK['HoTen'] ?></td>
                            <td><?php echo  $TK['DiaChi'] ?></td>
                            <td><?php echo "0" . $TK['SoDienThoai'] ?></td>
                            <td><?php echo $row['NgayDat'] ?></td>
                            <td><?php echo number_format($row['TongTien']) . ' đ' ?></td>
                            <td>
                                <?php
                                if (is_null($row['MaNVGiaoHang'])) {
                                ?>
                                    <select id="<?php echo $row['MaDH'] ?>inputState" class="form-control" name="TenNV">
                                        <option>Chọn nhân viên...</option>
                                        <?php
                                        $sql = "SELECT * FROM nhanvien where MaPQ='2'  order by MaNV asc "; // sắp xếp tăng dần 
                                        $NhanVien = $db->fetchsql($sql);
                                        
                                        foreach ($NhanVien as $key => $row1) {
                                        ?>
                                            <option value="<?php echo $row1['MaNV'] ?>"><?php echo $row1['HoTen'] ?></option>
                                        <?php  } ?>
                                    </select>
                                <?php } else {
                                    // var_dump($row['MaNVGiaoHang']);
                                    $NVGH = $db->fetchTKNV('nhanvien', $row['MaNVGiaoHang']);
                                    echo $NVGH['HoTen']
                                ?>
                                <?php } ?>
                            </td>

                            <td class="d-flex">
                                
                                <?php if ($row['MaTTDH'] == 1) { ?>
                                    <button value="<?php echo $row['MaDH'] ?>" class="duyet m-auto btn btn-warning">  xong</button>
                                    <div> <a href="./ChiTietHoaDon.php?id=<?php echo $row['MaDH'] ?>" class="show m-auto btn btn-success">Xem đơn </a></div>
                                <?php } else { ?>
                                    <button disabled value="<?php echo $row['MaDH'] ?>" class="m-auto btn btn-success"> Đóng gói xong  </button>
                                   
                                   
                                <?php } ?> 
                            </td>


                          

                        </tr>
                    <?php }
                    ?>

            </table>

        </div>
    </div>
</div>
<?php
include("footerAdmin.php")
?>

<script>
    $(document).ready(function() {
        $(".duyet").click(function() {
            var idDonHang = $(this).val()
            // console.log(idDonHang)
            swal({
                   text: " Đơn hàng đã đóng gói xong:",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: './../database/xulyDongGoi.php',
                            type: 'POST',
                            data: {
                                'idDonHang': idDonHang,
                            },
                            success: function(data) {
                                console.log(data)
                                if (data == 1) {
                                    swal("đã cập nhật thành công! !", {
                                            icon: "success",
                                        })
                                        .then(function(willDelete) {
                                            location.replace('./TTDongGoiDH.php')
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
</script>