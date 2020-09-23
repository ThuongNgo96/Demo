<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
?>

<?php
include("headAmin.php")
?>
<html>

<div class="container-fluid  pb-5 mt-4 " style="height:100vh;" >
    <div class="row margin-top-50 h-100vh">
        <?php include("leftAdmin.php") ?>
        <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between pt-3" style=" height: 50px;">
                <div class=" col-12 ">
                    <h2 class=" mt-3">Cập nhật Thông tin Nhân Viên  </h2>
                    <hr>
                    <span> <a href="../database/thanhvien/themnhanvien.php" class="btn btn-outline-primary mb-3" " name="" id="">Thêm mới</a></span>
                    
                    <div class="  ">
                        <table class="table table-hover table-bordered h-100vh">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center" scope="col">Mã NV</th>
                                    <th class="text-center" scope="col">Họ và tên</th>
                                    <th class="text-center" scope="col">Địa chỉ</th>
                                    <th class="text-center" scope="col">Số điện thoại</th>
                                    <th class="text-center" scope="col">User name</th>
                                    <th class="text-center" scope="col">Pass word </th>
                                    <th class="text-center" scope="col"> Thao Tác</th>
                                </tr>
                            </thead>


                            <?php
                            $sql = "SELECT * FROM nhanvien  order by MaNV asc";
                            $bills = $db->fetchsql($sql);
                            foreach ($bills as $row) {
                            ?>
                                <tr class=" border">
                                    <th scope="row"><?php echo $row['MaNV'] ?></th>
                                    <td><?php echo $row['HoTen'] ?></td>
                                    <td><?php echo $row['DiaChi'] ?></td>
                                    <td>0<?php echo $row['SoDienThoai'] ?></td>
                                    <td><?php echo $row['UserName'] ?></td>
                                    <td><?php echo $row['Password'] ?></td>
                                    <td class="d-flex">
                                        <button value="<?php echo $row['MaNV'] ?>" class="delete m-auto btn btn-warning"> Xóa </button>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                            </div>
<?php
include("footerAdmin.php")
?>
</html>

<script>
    $(document).ready(function() {
        $(".delete").click(function() {
            var idTaiKhoan = $(this).val()
            // console.log(idTaiKhoan)
            swal({
                    title: "Bạn có chắc chắn",
                    text: "Bạn có muốn xóa tài khoản này ! Bạn sẽ không thể hoàn tác lại ! ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: './../database/thanhvien/xoathanhvien.php',
                            type: 'POST',
                            data: {
                                'idTaiKhoan': idTaiKhoan,
                            },
                            success: function(data) {
                                if (data == 1) {
                                    swal("Thành Công! Bạn đã xóa một nhân viên !", {
                                            icon: "success",
                                        })
                                        .then(function(willDelete) {
                                            location.replace('./nguoidung.php')
                                        })
                                }
                                else{
                                    swal("Xóa Thất Bại")
                                    .then(function(willDelete) {
                                            location.replace('./nguoidung.php')
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