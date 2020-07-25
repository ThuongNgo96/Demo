<?php
require_once __DIR__ . "./ImportFile/importFile.php";
?>

<!doctype html>
<html lang="en">
<link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">
<head>
</head>

<body>
     <?php include('head.php') ?> 
    <h2 class="text-center mt-2">Giỏ Hàng Của Bạn</h2>
    <?php
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
        echo "<script>alert('Bạn không có sản phẩm nào trong giỏ hàng');location.href='./index.php'</script>";
    }
    ?>
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:5%" class="text-danger ">STT</th>
                    <th style="width:45%" class="text-danger ">Tên sản phẩm</th>
                    <th style="width:10% " class="text-danger ">Giá</th>
                    <th style="width:12%"class="text-danger ">Số lượng</th>
                    <th style="width:22%" class="text-center text-danger">Thành tiền</th>
                    <th style="width:10%"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                $sum = 0;
                $stt = 1;
                foreach ($_SESSION['cart'] as $key => $value) {
                ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="./ANH/<?php echo $value['HinhAnh'] ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                                </div>
                                <div class="col-sm-9">
                                    <h4 id="sp<?php echo $key ?>" class="nomargin"><?php echo $value['TenSP'] ?></h4>
                                    <p>Mô tả của sản phẩm 1</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price"><?php echo number_format($value['DonGia']) . ' đ' ?></td>
                        <td data-th="Quantity">
                            <input id="<?php echo $key ?>" class="form-control" min="1" type="number" value="<?php echo $value['SoLuong'] ?>">
                        </td>
                        <td data-th="Subtotal" class="text-center"><?php echo number_format($total = $value['DonGia'] * $value['SoLuong']) . ' đ' ?></td>
                        <td class="actions d-flex " data-th="">
                            <button value="<?php echo $key ?>" class="update m-auto btn btn-info btn-sm"><i class="fa fa-edit">Sửa</i>
                            </button>
                            <button value="<?php echo $key ?>" class="delete m-auto btn btn-danger btn-sm"><i class="fa fa-trash-o">Xóa</i>
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
                    <td colspan="3"><a href="./index.php" class="btn btn-warning"><i class="fa fa-angle-left w-25"></i> Tiếp tục mua hàng</a>
                    </td>
                    <td colspan="3" class="hidden-xs"> </td>
                    <td class="hidden-xs text-center">
                        <strong>
                            <?php
                            $_SESSION['sum'] = $sum;
                            echo number_format($_SESSION['sum']) . ' đ'
                            ?>
                        </strong>
                    </td>
                    <td><a href="./thanhtoan.php" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <footer class=" mt-5">
        <?php
        include("footer.php")
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
                var key = $(this).val()
                var soluong = $('#' + key).val()
                var tensp = $('#sp' + key).text()
                // console.log(soluong, key)
                $.ajax({
                    url: './database/capnhatgiohang.php',
                    type: 'GET',
                    data: {
                        'key': key,
                        'soluong': soluong,
                    },
                    success: function(data) {
                        console.log(data)
                        if (data == 1) {
                            swal({
                                    title: "Thành Công",
                                    text: "Bạn đã sửa sản phẩm " + tensp + " thành " + soluong,
                                    icon: "success",
                                    button: "Đóng!",
                                })
                                .then(function(willDelete) {
                                    location.replace('./giohang.php')
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
                var key = $(this).val()
                var tensp = $('#sp' + key).text()
                // console.log(soluong, key)
                swal({
                        title: "Bạn có chắc chắn",
                        text: "Bạn sẽ xóa hết số lượng mặt hàng ' " + tensp + " 'trong giỏ hàng",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: './database/xoaSPGioHang.php',
                                type: 'GET',
                                data: {
                                    'key': key,
                                },
                                success: function(data) {
                                    console.log(data)
                                    if (data == 1) {
                                        swal("Thành Công! Bạn đã xóa mặt hàng " + tensp + " trong giỏ hàng !", {
                                                icon: "success",
                                            })
                                            .then(function(willDelete) {
                                                location.replace('./giohang.php')
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