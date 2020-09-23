<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
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
    <title>sanpham</title>
</head>

<body>
    <?php
    include("headAmin.php")
    ?>






    <div class="container-fluid pt-48 pb-5 mt-4 h-100 ">
        <div class="row margin-top-50">
            <?php include("leftAdmin.php") ?>
            <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
                <div class="row">
                    <div class="col-12 mb-5">
                        <div class=" pt-3">
                                <h2 class=" mt-3">Cập nhật thông tin sản phẩm </h2>
                                <hr>
                                <div> <a href="../database/sanpham/themsp.php" class="btn btn-outline-primary mb-3" " name="" id="">Thêm mới</a></div>
                                <?php if (isset($_SESSION['success'])) : ?>
                                <div class=" alert alert-success" role="alert">
                                        <?php echo $_SESSION['success'] ?>
                        <?php endif ?>
                        </div>
                        
                    </div>
                    <div class="col-12 mt-5">
                        <div class="">
                            <table class=" table table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" scope="col">Id</th>
                                        <th class="text-center" scope="col">Tên sản phẩm</th>
                                        <th class="text-center" scope="col">Đơn giá đã giảm</th>
                                        <th class="text-center" scope="col">Giá Gốc</th>
                                        <th class="text-center" scope="col">Số lượng</th>
                                        <th class="text-center" scope="col">Mã Danh mục </th>
                                        <th class="text-center" scope="col">Hình ảnh </th>
                                        <!-- <th class="text-center" scope="col"> Chi tiết SP</th> -->
                                        <th class="text-center" scope="col"> Thao Tác</th>




                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM sanpham  order by MaSP asc";
                                    $bills = $db->fetchsql($sql);
                                    foreach ($bills as $row) {
                                    ?>
                                        <tr class=" border">
                                            <th class="text-center" scope="row"><?php echo $row['MaSP'] ?></th>
                                            <td class="text-center"><?php echo $row['TenSP'] ?></td>

                                            <td class="text-center"><?php echo $row['Gia'] ?></td>
                                            <td class="text-center"><?php echo $row['GiaGoc'] ?></td>
                                            <td class="text-center"><?php echo $row['SoLuong'] ?></td>

                                            <td class="text-center"><?php echo $row['MaDM'] ?></td>

                                            <td class="text-center"><img src="../ANH/<?php echo $row['HinhAnh'] ?>" height="80px" width="80px" alt=""></td>
                                            <!-- <td><?php echo $row['ChiTietSP'] ?></td> -->

                                            <td class="d-flex">
                                                <a class="btn btn-info" href="../database/sanpham/suasp.php?id=<?php echo $row['MaSP'] ?>" <button value="<?php echo $row['MaSP'] ?>" class="edit m-auto btn btn-warning"> Sửa </button></a>
                                                <button value="<?php echo $row['MaSP'] ?>" class="delete m-auto btn btn-warning"> Xóa </button>
                                            </td>
                                            <!-- <td><?php echo $row['ChiTietSP'] ?></td> -->
                                        </tr>
                                    <?php }
                                    ?>

                                </tbody>
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
                var idSanPham = $(this).val()
                console.log(idSanPham)
                swal({
                        title: "Bạn có chắc chắn",
                        text: "Bạn có muốn xóa sản phẩm này ! Bạn sẽ không thể hoàn tác lại ! ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: './../database/sanpham/xoasp.php',
                                type: 'POST',
                                data: {
                                    'idSanPham': idSanPham,
                                },
                                success: function(data) {
                                    console.log(data)
                                    if (data == 1) {
                                        swal("Thành Công! Bạn đã xóa một sản phẩm !", {
                                                icon: "success",
                                            })
                                            .then(function(willDelete) {
                                                location.replace('./sanpham.php')
                                            })
                                            
                                    }
                                    // else{
                                    //     swal("Danh mục không tồn tại")
                                    //     .then(function(willDelete) {
                                    //             location.replace('./danhmuc.php')
                                    //         })
                                    // }
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
                                        swal("Thành Công! Bạn đã sửa sản phẩm  thành công.", {
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