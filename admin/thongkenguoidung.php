<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
?>
<?php
include("headAmin.php");
$Users = $db->fetchAll("taikhoan");

?>
<div class="container-fluid pt-48 pb-5 mt-5 ">
    <div class="row margin-top-50">

        <?php include("leftAdmin.php"); ?>
    
            <div class="col-10">
                <div class="row">
                <h1 class="text-danger">Tổng số khách hàng đã đăng ký tài khoản: <?php echo count($Users)  ?></h1>
                </div>
            
            <!-- <div class="col-10"> -->
                <div class="row">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" scope="col">Id</th>
                            <th class="text-center" scope="col">Họ và tên</th>
                            <th class="text-center" scope="col">Địa chỉ</th>
                            <th class="text-center" scope="col">Số điện thoại</th>
                            <th class="text-center" scope="col">User name</th>
                            <th class="text-center" scope="col">Pass word </th>
                            <!-- <th class="text-center" scope="col"> Thao Tác</th> -->
                        </tr>
                    </thead>


                    <?php
                    $sql = "SELECT * FROM taikhoan  order by ID asc";
                    $bills = $db->fetchsql($sql);
                    foreach ($bills as $row) {
                    ?>
                        <tr class=" border">
                            <th scope="row"><?php echo $row['ID'] ?></th>
                            <td><?php echo $row['HoTen'] ?></td>
                            <td><?php echo $row['DiaChi'] ?></td>
                            <td>0<?php echo $row['SoDienThoai'] ?></td>
                            <td><?php echo $row['UserName'] ?></td>
                            <td><?php echo $row['Password'] ?></td>
                            <!-- <td class="d-flex">
                                <button value="<?php echo $row['ID'] ?>" class="delete m-auto btn btn-warning"> Xóa </button>
                            </td> -->
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

<script>
    $(document).ready(function() {
        $(".delete").click(function() {
            var idTaiKhoan = $(this).val()
            console.log(idTaiKhoan)
            swal({
                    title: "Bạn có chắc chắn",
                    text: "Bạn có muốn tài khoản này ! Bạn sẽ không thể hoàn tác lại ! ",
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
                                console.log(data)
                                if (data == 1) {
                                    console.log(3)
                                    swal("Thành Công! Bạn đã xóa một đơn hàng !", {
                                            icon: "success",
                                        })
                                        .then(function(willDelete) {
                                            location.replace('./nguoidung.php')
                                        })
                                } else {
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