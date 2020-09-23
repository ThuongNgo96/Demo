<?php
require_once __DIR__ . "./ImportFile/importFile.php";
$idDH = getInput('id');
$chitietDH = $db->fetchAllCTHDbyMaHD('chitietdonhang', $idDH);
?>

<!doctype html>
<html lang="en">
<link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">
<link rel="stylesheet" href="./css/style1.css">
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/bootstrap.css">

<head>
</head>

<body>
    <?php include('./head.php') ?>
    <h2 class="text-center mt-2">Thay đổi đơn hàng</h2>
    <!-- <?php
            // if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
            //  echo "<script>alert('Bạn không có sản phẩm nào trong giỏ hàng');location.href='./index.php'</script>";
            // }
            ?> -->
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:5%" class="text-danger ">STT</th>
                    <!-- <th style="width:10%" class="text-danger ">Hình Ảnh </th> -->
                    <th style="width:45%" class="text-danger ">Tên sản phẩm</th>
                    <th style="width:10% " class="text-danger ">Giá</th>
                    <th style="width:10%" class="text-danger ">Số lượng</th>
                    <th style="width:10%" class="text-center text-danger">Thành tiền</th>
                    <th style="width:20% " class="text-danger ">Thao Tác</th>



                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                $sum = 0;
                $stt = 1;

                foreach ($chitietDH as $key => $value) {
                    $sanpham = $db->fetchSP('sanpham', $value['MaSP']);
                    // $_SESSION['update'][$value['MaSP']]['TenSP'] = $sanpham['TenSP'];
                    // $_SESSION['update'][$value['MaSP']]['Gia'] = $sanpham['Gia'];
                    // $_SESSION['update'][$value['MaSP']]['HinhAnh'] = $sanpham['HinhAnh'];
                    // $_SESSION['update'][$value['MaSP']]['SoLuongMua'] = $value['SoLuongMua'];
                    // isset($_SESSION['update']) ? $_SESSION['update'] : '';
                    // var_dump($_SESSION['update'][$value['MaSP']]['SoLuong']);
                    // var_dump( $sanpham['TenSP']);
                    //    die;
                ?>
                    <tr>
                        <div id="MaDH" hidden><?php echo $value['MaDH'] ?></div>
                        <td><?php echo $stt; ?></td>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="./ANH/<?php echo $sanpham['HinhAnh'] ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                                </div>
                                <div class="col-sm-9 ml-3">
                                    <h4 id="sp<?php echo $value['id'] ?>" class="nomargin"><?php echo $sanpham['TenSP'] ?></h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price"><?php echo number_format($sanpham['Gia']) . ' đ' ?></td>
                        <td data-th="Quantity">
                            <input id="<?php echo $value['id'] ?>" class="form-control" min="1" type="number" value="<?php echo $value['SoLuongMua'] ?>">
                        </td>
                        <td data-th="Subtotal" class="text-center"><?php echo number_format($total = $sanpham['Gia'] *  $value['SoLuongMua']) . ' đ' ?></td>
                        <td class="actions d-flex " data-th="">
                            <button value="<?php echo $value['id'] ?>" class="update m-auto btn btn-info btn-sm"><i class="fa fa-edit">Sửa</i>
                            </button>
                            <button value="<?php echo $value['id'] ?>" class="delete m-auto btn btn-danger btn-sm"><i class="fa fa-trash-o">Xóa</i>
                            </button>
                        </td>
                    </tr>
                <?php
                    $sum += $total;
                    $stt++;
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"><a href="./index.php" class="btn btn-warning" style=" width:250px"><i class="fa fa-angle-left w-25"></i> Tiếp tục mua hàng</a>
                    </td>
                    <!-- <td colspan="3" class="hidden-xs"> </td> -->
                    <td class="hidden-xs text-center">
                        <strong>
                            <?php
                            $_SESSION['tongtiensausua'] = $sum;
                            echo "Tổng tiền : "  . number_format($_SESSION['tongtiensausua']) . ' đ'
                            ?>
                        </strong>
                    </td>
                    <td class="col-3"><a href="./donchoxuly.php" class="btn btn-success btn-block" style=" width:200px">cập nhật đơn xong <i class="fa fa-angle-right"></i></a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <footer class=" mt-5">
        <?php
        include("./footer.php")
        ?>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".update").click(function(e) {
                var MaCTDH = $(this).val()
                var soluong = $('#' + MaCTDH).val()
                var tensp = $('#sp' + MaCTDH).text()
                $.ajax({
                    url: './database/khachhangcapnhat.php',
                    type: 'GET',
                    data: {
                        // 'MaSP': MaSP,MaCTDH
                        'soluong': soluong,
                        'MaCTDH': MaCTDH,
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == 1) {
                            swal({
                                    title: "Thành Công",
                                    text: "Bạn đã sửa sản phẩm " + tensp + " thành " + soluong,
                                    icon: "success",
                                    button: "Đóng!",
                                })
                                .then(function(willDelete) {
                                    location.reload()
                                })
                        } else {
                            swal({
                                title: "Thất bại!",
                                text: "Sản phẩm " + tensp + " không đủ số lượng",
                                icon: "error",
                                button: "Đóng !",
                            });
                        }
                    }
                })
            })

        })
        $(document).ready(function() {
            $(".delete").click(function(e) {
                var MaDH = $('#MaDH').text();
                var MaCTDH = $(this).val()
                var tensp = $('#sp' + MaCTDH).text()
                console.log(MaDH)
                swal({
                        title: "Bạn có chắc chắn",
                        text: "Bạn sẽ xóa hết số lượng mặt hàng ' " + tensp + " 'trong đơn hàng ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: './database/KhachXoaSPDH.php',
                                type: 'GET',
                                data: {
                                    'MaCTDH': MaCTDH,
                                },
                                success: function(data) {
                                    console.log(data)
                                    if (data == 2) {
                                        swal("Đơn hàng trống", {
                                                icon: "success",
                                            })
                                            .then(function(willDelete) {
                                                location.replace('./donchoxuly.php')
                                            })
                                    } else if (data == 1) {
                                        swal("Thành Công! Bạn đã xóa mặt hàng " + tensp + " trong đơn hàng !", {
                                                icon: "success",
                                            })
                                            .then(function(willDelete) {
                                                location.replace('./khachcapnhatdonhang.php?id=' + MaDH)
                                            })
                                    } else {
                                        swal({
                                                title: "Thất Bại",
                                                text: "Xóa mặt hàng thất bại!",
                                                icon: "error",
                                                button: "Đóng!",
                                            })
                                            .then(function(willDelete) {
                                                location.reload()
                                            })
                                    }
                                }
                            })
                        } else {
                            swal("Xóa thất bại!");
                        }
                    });
            })

        })
    </script>
</body>

</html>