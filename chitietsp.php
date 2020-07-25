<?php
require_once __DIR__ . "./ImportFile/importFile.php";
$idproduct = getInput('id');
$product = $db->fetchSP('sanpham', $idproduct);
?>


<?php

include("head.php")

?>
<?php
include("homedanhmuc.php")
?>

<div class="col-10">
    <div class="row">
        <div class=" col-4 float-left">
            <img src="./ANH/<?php echo $product['HinhAnh'] ?>" style="width: 100%;">
        </div>
        <div class=" col-6 ml-4 float-left mt-4">
            <h4><?php echo $product['TenSP'] ?></h4>
            <!-- <h6> Baby Skin Pore Earser </h6> -->
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <p class="text-danger"> <?php echo $product['ChiTietSP'] ?></p>
            <h6 class=" text-danger"> <?php echo number_format($product['DonGia']) ?> đ <span class=" text-dank"> (Đã bao gờm VAT)</span></h6>
            <p> Giá gốc: <?php echo number_format($product['GiaGoc']) ?> đ </p>
            <button value="<?php echo $product['MaSP'] ?>" class="buy mr-1 text-white btn btn-success"><i class=" fas fa-cart-plus"></i> Mua hàng</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Đánh Gía
                </div>
                <div class="card-body">
                    <div class="card-header">
                        <p> Nhận xét của bạn</p>
                        <input id="idSP" type="text" hidden value="<?php echo $product['MaSP'] ?>">
                        <input id="username" type="text" hidden value="<?php echo $_SESSION['username'] ?>">
                        <textarea name="comment" id="" class="w-100 height-comment-product" placeholder="Nhập nhận xét của bạn"></textarea>
                        <div class="d-flex justify-content-end">
                            <button class="comment btn btn-primary">Bình luận</button>
                        </div>
                    </div>
                    <div class="card-header">
                        <p> Các bình luận cho sản phẩm này</p>
                        <?php
                        $comments = $db->fetchCommentByIdSP('binhluansp', $product['MaSP']);
                        foreach ($comments as $key => $comment) {
                            $usercomment = $db->fetchTK('taikhoan', $comment['MaTK']);
                            // _debug(($usercomment));
                        ?>
                            <div class="d-flex flex-column border-comment">
                                <div class="">
                                    <b class="float-left"> <?php echo $usercomment['UserName'] ?></b>
                                    <p class="float-right"> <?php echo $comment['NgayBinhLuan'] ?></p>
                                </div>
                                <p> <?php echo $comment['BinhLuan'] ?></p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
</section>
<?php
include("footer.php")
?>
<script>
    $(document).ready(function() {
        $(".buy").click(function() {
            var id = $(this).val()
            console.log(id)
            $.ajax({
                url: './database/themgiohang.php',
                type: 'GET',
                data: {
                    'id': id,
                },
                success: function(data) {
                    console.log(data)
                    if (data == 0) {
                        swal({
                            title: "Thất bại!",
                            text: "Bạn cần đăng nhập để đặt hàng",
                            icon: "error",
                            button: "Đóng !",
                        });
                    } else if (data == 101010) {
                        swal({
                            title: "Thất bại!",
                            text: "Mặt hàng này đã hết hoăc trong giỏ hàng của bạn đã đặt hết số lượng hiện có",
                            icon: "error",
                            button: "Đóng !",
                        });
                    } else {
                        $('.qty').text('GIỎ HÀNG' + ' (' + data + ' )')
                        swal({
                            title: "Thành Công",
                            text: "Bạn đã đặt 1 sản phẩm vào giỏ hàng",
                            icon: "success",
                            button: "Đóng!",
                        })
                    }
                }
            })
        })
        $(".comment").click(function() {
            var idSP = $('#idSP').val()
            var username = $('#username').val()
            var comment = $('.height-comment-product').val()
            // console.log(idSP,username, comment)
            $.ajax({
                url: './database/xulybinhluan.php',
                type: 'POST',
                data: {
                    'idSP': idSP,
                    'username': username,
                    'comment': comment,
                },
                success: function(data) {
                    if (data == 2) {
                        swal({
                            title: "Thất bại!",
                            text: "Bạn cần nhập bình luận vào ô trên",
                            icon: "error",
                            button: "Đóng !",
                        });
                    } else if (data == 0) {
                        swal({
                                title: "Thất bại!",
                                text: "Bình luận thất bại",
                                icon: "error",
                                button: "Đóng !",
                            })
                            .then(function(willDelete) {
                                location.replace('./chitietsp.php?id=' + idSP)
                            })
                    } else {
                        swal({
                                title: "Thành Công",
                                text: "Cảm ơn bạn đã bình luận về sản phẩm này!",
                                icon: "success",
                                button: "Đóng!",
                            })
                            .then(function(willDelete) {
                                location.replace('./chitietsp.php?id=' + idSP)
                            })
                    }
                }
            })
        })

    })
</script>