<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
$danhmuc = $db->fetchAll("danhmuc");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">
    <title>danhmuc</title>
</head>

<body>
    <?php
    include("headAmin.php")
    ?>





    <div class="container-fluid pb-5 mt-1 h-100vh" style="height: 900px;">
        <div class="row margin-top-50 h-100">
            <?php include("leftAdmin.php") ?>
            <div class="col-10  bg-white  ml-sm-auto col-lg-10 px-4" >
                <div class="d-flex justify-content-between pt-3" style=" height: 50px;">
                    <div class=" col-12 ">
                        <h2>Cập nhật Danh Mục Sản Phẩm </h2>
                        <hr>
                        <div class="clearfix"></div>
                        <?php
                        if (isset($_SESSION['success'])) : ?>
                            <div class=" alert alert-success">
                                <?php echo $_SESSION['success'];
                                unset($_SESSION['success'])
                                ?>
                            </div>

                        <?php endif; ?>


                        <?php
                        if (isset($_SESSION['error'])) : ?>
                            <div class=" alert alert-danger">
                                <?php echo $_SESSION['success'];
                                unset($_SESSION['error'])
                                ?>
                            </div>

                        <?php endif; ?>
                        <div class="col-12 mt-5">
                            <a href="../database/danhmuc/capnhatdanhmuc.php" <button class="btn btn-outline-info" name="btnThem" id="btnThem"> Thêm mới</button></a>
                            <table class="table table-hover table-bordered mt-3">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" scope="col"> STT</th>
                                        <th class="text-center" scope="col">Tên Danh Mục</th>
                                        <th class="text-center" scope="col">Ngày Lập</th>
                                        <!-- <th class=" text-center" scope="col"> Trạng Thái</th> -->
                                        <th class="text-center" scope="col">Thao Tác</th>


                                    </tr>
                                </thead>

                                <?php
                                $sql = "SELECT * FROM danhmuc  order by MaDM asc";
                                $bills = $db->fetchsql($sql);
                                foreach ($bills as $key => $row) {
                                ?>

                                    <tr class=" border">
                                        <th class="text-center" scope="row"><?php echo $row['MaDM'] ?></th>
                                        <td>
                                            <input class="form-control text-center" id="nameDM<?php echo $row['MaDM'] ?>" type="text" name="TenDM" value="<?php echo $row['TenDM'] ?>">
                                        </td>
                                        <td class="text-center"><?php echo $row['NgayTao'] ?></td>
                                        <!-- <td class="text-center">

                                            <a> <button value="<?php echo $row['MaDM'] ?>" class="duyet m-auto btn btn-warning"> ẩn </button></a>
                                        </td> -->

                                        <td class="d-flex text-center">
                                            <button value="<?php echo $row['MaDM'] ?>" class="delete m-auto btn btn-danger">Xóa</button>
                                            <button value="<?php echo $row['MaDM'] ?>" class="edit m-auto btn btn-success">Sửa</a>
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
    <?php
    include("footerAdmin.php")
    ?>
    <script>
        $(document).ready(function() {
            $(".delete").click(function() {
                var idDanhMuc = $(this).val()
                console.log(idDanhMuc)
                swal({
                        title: "Bạn có chắc chắn",
                        text: "Bạn có muốn xóa danh mục này ! Bạn sẽ không thể hoàn tác lại ! ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: './../database/danhmuc/xoadanhmuc.php',
                                type: 'POST',
                                data: {
                                    'idDanhMuc': idDanhMuc,
                                },
                                success: function(data) {
                                    console.log(data)
                                    if (data == 1) {
                                        swal("Thành Công! Bạn đã xóa một danh mục !", {
                                                icon: "success",
                                            })
                                            .then(function(willDelete) {
                                                location.replace('./danhmuc.php')
                                            })
                                    } else {
                                        swal("Bạn phải xóa sản phẩm trước khi xóa danh mục này!",{
                                            icon: "error",
                                        })
                                            .then(function(willDelete) {
                                                location.replace('./danhmuc.php')
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
        $(document).ready(function() {
            $(".edit").click(function() {
                var idDanhMuc = $(this).val()
                var tenDanhMuc = $('#nameDM' + idDanhMuc).val()
                // console.log(tenDanhMuc)
                // console.log(idDanhMuc)
                swal({
                        title: "Bạn có chắc chắn",
                        text: "Bạn có muốn sửa danh mục này ! Bạn sẽ không thể hoàn tác lại thao tác này ! ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: './../database/danhmuc/suadanhmuc.php',
                                type: 'POST',
                                data: {
                                    'idDanhMuc': idDanhMuc,
                                    'tenDanhMuc': tenDanhMuc,
                                },
                                success: function(data) {
                                    console.log(data)
                                    if (data == 1) {
                                        swal("Thành Công! Bạn đã sửa danh mục thành công.", {
                                                icon: "success",
                                            })
                                            .then(function(willDelete) {
                                                location.replace('./danhmuc.php')
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
</body>

</html>