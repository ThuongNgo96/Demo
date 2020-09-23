<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
$username = $db->fetchTKNVbyUsername('nhanvien',$_SESSION['useradmin']);
$idNV = $username["MaNV"];
$maTT=0;
?>
<?php
include("headAmin.php");
?>
<link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">
<div class="container-fluid pt-48 pb-5 mt-4">
    <div class="row margin-top-50  ">
        <?php include("leftAdmin.php") ?>
        <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between pt-3" style=" height: 50px;">
                <div class=" ">
                    <h2> Xác Nhận Đã Thu Tiền Hàng/ Hoàn kho SP </h2>
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
                        <th class="text-center" scope="col">Trạng thái </th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($username['MaPQ']=="4") {
                        $sql = "SELECT * FROM donhang WHERE MaTTDH = '3' or MaTTDH='4'  or MaTTDH='12' order by MaDH asc";
                    }
                    else{
                    // 
                    // $sql = "SELECT * FROM donhang WHERE MaTTDH = '3' and MaTTDH='4' order by MaDH asc";
                    }
                    $bills = $db->fetchsql($sql);
                    foreach ($bills as $row) {
                        $TK=$db->fetchTK('taikhoan',$row['ID']);
                    ?>
                        <tr class=" border">
                            <th scope="row"><?php echo $row['MaDH'] ?></th>
                            <td><?php echo $TK['HoTen'] ?></td>
                            <td><?php echo $TK['DiaChi'] ?></td>
                            <td><?php echo "0" . $TK['SoDienThoai'] ?></td>
                            <td><?php echo $row['NgayDat'] ?></td>
                            <td><?php echo number_format($row['TongTien']) . ' đ' ?></td>

                            <td> 
                        <?php if( $row['MaTTDH']=='3') {echo" Đã Nhận tiền";}
                        else{
                            echo" Đã trả lại hàng về kho";
                        }
                        ?>
 <td class="d-flex">
                                
                                <?php if ($row['MaTTDH'] =='3' or $row['MaTTDH']=='4'  ) { ?>
                                    <button value="<?php echo $row['MaDH'] ?>" class="duyet m-auto btn btn-warning"> Xác nhận  </button>
                                <?php } else  { ?>
                                    <!-- <button disabled value="<?php echo $row['MaDH'] ?>" class="m-auto btn btn-success"> Đã xác nhận </button> -->
                                   <div class =" text-center"><p> Đã xác nhận </p><div>
                                    <div> <a href="./ChiTietHoaDon.php?id=<?php echo $row['MaDH'] ?>" class="show m-auto btn btn-success">Xem đơn </a></div>
                                <?php } ?> 

                             
                                 


                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--    đơn hoàn thành  -->
<div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
           
  
            <div class="d-flex justify-content-between pt-3" style=" height: 50px;">
                <div class=" ">
                    <h2>Những Đơn Đã Nhận Tiền </h2>
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
                    $sql = "SELECT * FROM donhang WHERE MaTTDH = '11'   order by MaDH asc";
                    $bills = $db->fetchsql($sql);
                    foreach ($bills as $row) {
                        if ($row['IDNguoiNhanKhac'] == 0 || $row['IDNguoiNhanKhac'] == null){
                            $TK=$db->fetchTK('taikhoan',$row['ID']);
                        }else{
                            $TK=$db->fetchTKNNK('nguoinhankhac',$row['IDNguoiNhanKhac']);
                        }
                    ?>
                        <tr class=" border">
                            <th scope="row"><?php echo $row['MaDH'] ?></th>
                            <td><?php echo $TK['HoTen'] ?></td>
                            <td><?php echo $TK['DiaChi'] ?></td>
                            <td><?php echo "0".$TK['SoDienThoai'] ?></td>
                            <td><?php echo $row['NgayDat'] ?></td>
                            <td><?php echo number_format($row['TongTien']) . ' đ' ?></td>
                            <td class="d-flex">
                                    <a href="./ChiTietHoaDon.php?id=<?php echo $row['MaDH'] ?>" class="show m-auto btn btn-primary">Xem hóa đơn </a>
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
            var id = $(this).val()
            console.log(id)
            $.ajax({
                url: './../database/xulyCapNhatCuoi.php',
                type: 'POST',
                data: {
                    'id': id,
                    // 'MaTTDH': MaTTDH,
                },
                success: function(data) {
                    console.log(data)
                    if (data == 1) {
                        swal({
                                title: "Thành Công",
                                
                                icon: "success",
                                button: "Đóng!",
                            })
                            .then(function(willDelete) {
                                location.replace('./capnhatCuoi.php')
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
