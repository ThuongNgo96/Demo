<?php

require_once __DIR__ . "./ImportFile/importFile.php";
$id = $db->fetchidByUsername('taikhoan', $_SESSION['username']);
$idTK = $id['ID'];
$bill = $db->fetchBillByUsername('donhang', $id['ID']);
$ngay = postInput('firtsdate');
$ngay1 = postInput('lastdate')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style1.css"> -->
    <title>chờ xử lý</title>
</head>

<body>
    <?php

    include("./head.php");


    ?>
    <h1 class=" d-flex justify-content-center text-danger mt-3"> Đơn hàng đang chờ xử lý<?php  ?>:</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center" scope="col">Mã đơn hàng </th>
                <th class="text-center" scope="col">Tổng tiền</th>
                <th class="text-center" scope="col">Thời gian đặt hàng</th>
                <th class="text-center" scope="col">Thao Tác </th>
            </tr>
        </thead>
        <tbody>
            <?php


            $sql = "SELECT * FROM DonHang WHERE ID = $idTK and MaTTDH = 10";
            $DHcho = $db->fetchsql($sql);
            foreach ($DHcho as $row) {
            ?>
                <tr>
                <!-- <div id="MaDH" hidden><?php echo $row['MaDH'] ?></div> -->
                    <th class="text-center" scope="row"><?php echo 'DH' . $row['MaDH']  ?></th>
                    <td class="text-center" colspan=""><?php echo number_format($row['TongTien']) . " đ" ?></td>
                    <td class="text-center"><?php echo $row['NgayDat']  ?></td>
                    <!-- <td class="text-center"><button> Xóa</button><button>Sửa đơn hàng</button> -->
                    <td> <a class="btn btn-info" href="./khachcapnhatdonhang.php?id=<?php echo $row['MaDH'] ?>" <button value="<?php echo $row['MaDH'] ?>" class="edit m-auto btn btn-warning"> Sửa đơn hàng </button></a>
                        <button value="<?php echo  $row['MaDH']?>" class="delete m-auto btn btn-warning"> Hủy đơn </button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>
    <?php
    include("./footer.php")

    ?>



    <script>
        $(document).ready(function() {
            $(".delete").click(function() {
                var idDH = $(this).val()

                swal({
                        title: "Bạn có chắc chắn",
                        text: "Bạn có muốn xóa đơn hàng này  ! Bạn sẽ không thể hoàn tác lại ! ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({    
                                url: './database/donhang/xoadonhang.php',
                                type: 'POST',
                                data: {
                                    'idDH': idDH,
                                },
                                success: function(data) {
                                    console.log(777)
                                    console.log(data)
                                    if (data == 1) {
                                        swal("bạn đã xóa thành công một sản phẩm", {
                                                icon: "success",
                                            })
                                            .then(function(willDelete) {
                                                location.replace('./donchoxuly.php')
                                            })
                                    }
                                    else{
                                        swal("Danh mục không tồn tại")
                                        .then(function(willDelete) {
                                                location.replace('./donchoxuly.php')
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