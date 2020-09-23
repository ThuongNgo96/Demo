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
    <title>Duyệt Bình Luận </title>
</head>

<body>
    <?php
    include("headAmin.php")
    ?>

    <div class="container-fluid pt-48 pb-5 mt-4 " style=" margin-bottom: 150px;">
        <div class="row margin-top-50">
            <?php include("leftAdmin.php") ?>
            <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between pt-3" style=" height: 50px;">
                    <div class=" col-12 ">
                        <h2>Duyệt Bình Luận sản phẩm </h2>
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
                        <div class=" ">

                            <table class="table table-hover table-bordered mt-3">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" scope="col"> STT</th>
                                        <th class="text-center" scope="col">Tên Khách hàng </th>
                                        <th class=" text-center">Tên sản phẩm </th>
                                        <th class="text-center" scope="col">Nội dung </th>
                                        <th class="text-center" scope="col">Ngày Bình Luận </th>
                                        <th class="text-center" scope="col">Thao Tác</th>
                                        <th class=" text-center" scope="col" hidden> Trạng Thái</th>


                                    </tr>
                                </thead>

                                <?php
                                $sql = "SELECT * FROM binhluansp  order by id asc";
                                $id = $db->fetchsql($sql);

                                // $tenSP=$db->fetchSP("sanpham",$id);
                                foreach ($id as $key => $row) {
                                    $sanpham=$db->fetchSP("sanpham",$row['MaSP']);
                                    $khachhang=$db->fetchTK("taikhoan",$row['ID'])
                                   // _debug($sanpham);
                                   
                                ?>

                                    <tr class=" border">
                                        <th class="text-center" scope="row"><?php echo $row['id'] ?></th>
                                        <!-- <td>
                                            <input class="form-control text-center" id="MaTK<?php echo $row['MaDM'] ?>" type="text" name="TenDM" value="<?php echo $row['TenDM'] ?>">
                                        </td> -->
                                        <td class="text-center">
                                            <?php echo $khachhang['HoTen'] ?>
                                        </td>
                                        <td class="text-center"><?php echo $sanpham['TenSP'] ?></td>
                                        <td class="text-center"><?php echo $row['BinhLuan'] ?></td>
                                        <td class="text-center"><?php echo $row['NgayBinhLuan'] ?></td>
                                        <td class="text-center">
                                            <?php if ($row['status'] == 0) {
                                            ?>
                                                <a href="./../database/xulyduyetbinhluan.php?id=<?php echo $row["id"] ?>"> <button class="an m-auto btn btn-danger"> ẩn</button></a>
                                            <?php } else { ?>
                                                <a href="./../database/xulyduyetbinhluan.php?id=<?php echo $row["id"] ?>"> <button class="an m-auto btn btn-success">Hiện</button></a>
                                            <?php }
                                            ?>
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
    <!-- <script>
    $(document).ready(function() {
        $(".hien").click(function() {
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
</script> -->