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
    <div class="row margin-top-50">
        <?php include("leftAdmin.php") ?>
        <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between pt-3" style=" height: 50px;">
                <div class=" ">
                    <h2>Cập nhật tình trạng gửi đơn hàng </h2>
                </div>
            </div>
            <hr>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" scope="col">Mã DH</th>
                        <th class="text-center" scope="col">Người nhận</th>
                        <th class="text-center" scope="col">Địa chỉ </th>
                        <th class="text-center" scope="col">Số điện thoại</th>
                        <th class="text-center" scope="col">Ngày đặt/th>
                        <th class="text-center" scope="col">Tổng tiền  </th>
                        <th class="text-center" scope="col">Nhân viên giao </th>
                        <th class="text-center" scope="col">Cập nhật TT </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($username["MaPQ"]=="1"){
                        $sql = "SELECT * FROM donhang WHERE MaTTDH ='5' or MaTTDH=' 2'  order by MaDH asc";
                    }
                    else{
                    // $sql = "SELECT * FROM donhang WHERE MaNVGiaoHang = $idNV  and '1' <= MaTTDH <= '2' order by MaDH asc";}
                    $sql = "SELECT * FROM donhang WHERE MaNVGiaoHang = $idNV  and  MaTTDH =5  order by MaDH asc";}
                    $bills = $db->fetchsql($sql);
                    foreach ($bills as $row) {
                        if ($row['IDNguoiNhanKhac'] == 0 || $row['IDNguoiNhanKhac'] == null){
                            $TK=$db->fetchTK('taikhoan',$row['ID']);
                        }else{
                            $TK=$db->fetchTKNNK('nguoinhankhac',$row['IDNguoiNhanKhac']);
                        }
                    ?>
                        <tr class=" border">
                            <th class="text-center" scope="row"><?php echo $row['MaDH'] ?></th>
                            <td><?php echo $TK['HoTen'] ?></td>
                            <td><?php echo $TK['DiaChi'] ?></td>
                            <td><?php echo $TK['SoDienThoai'] ?></td>
                            <td><?php echo $row['NgayDat'] ?></td>
                            <td><?php echo number_format($row['TongTien']) . ' đ' ?></td>
                            <td>
                                <?php
                                $NVGH = $db->fetchTKNV('nhanvien', $row['MaNVGiaoHang']);
                                echo $NVGH['HoTen']
                                ?>
                            </td>
                            <td class="d-flex">
                                <?php
                                if ($row['MaTTDH'] == '5') {          
                                ?>
                               <button value="<?php echo $row['MaDH'] ?>" class="guihang m-auto btn btn-warning">  Gửi</button>
                                <?php } else { ?>
                                    <button disabled value="<?php echo $row['MaDH'] ?>" class="m-auto btn btn-success"> đơnĐang vận chuyển  </button>
                                   
                                   
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
        $(".guihang").click(function() {
            var idDonHang = $(this).val()
            // console.log(idDonHang)
            swal({
                    title: "Bạn có chắc chắn",
                    text: "Đơn hàng của bạn sẽ được vận chuyển ! Bạn sẽ không thể hoàn tác lại ! ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: './../database/xulygiaohang.php',
                            type: 'POST',
                            data: {
                                'idDonHang': idDonHang,
                            },
                            success: function(data) {
                                console.log(data)
                                if (data == 1) {
                                    swal("Thành Công! Một đơn hàng của bạn đã được gửi đi!", {
                                            icon: "success",
                                        })
                                        .then(function(willDelete) {
                                            location.replace('./capnhatTTGiaoHang.php')
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