<?php
require_once __DIR__ . "./ImportFile/importFile.php";
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
    <link rel="shortcut icon" type="image/png" href="ANH/icon.jpg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="./css/main.css"> -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <title>Sakura</title>
</head>

<body style=" overflow-x:hidden">
    <?php
    include("head.php")
    ?>
    <div class=" container-fluid">
        <!--  -->
        <section class=" container-fluid mt-3 ">
            <div class="row">
                <div class="content_left col-2 bg-light rounded ">
                    <nav class="navbar navbar-expand-lg navbar-light mt-5 px-0">
                        <div class="collapse navbar-collapse " id="navbarNavDropdown">
                            <ul class=" flex-column navbar-nav w-100">
                                <li class="nav-item dropdown">
                                    <h6 class="mb-2"> DANH MỤC SẢN PHẨM</h6>



                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#e83e8c ;" class="pt-4">
                                        <div class=" d-flex justify-content-between">
                                <li class=" ">
                                    <?php
                                    $sql = "SELECT * FROM danhmuc  order by MaDM asc";
                                    $danhmucSP = $db->fetchsql($sql);
                                    foreach ($danhmucSP as $key => $row) {

                                    ?>
                                        <option class=" mt-2" value="<?php echo $row['MaDM'] ?>"><?php echo $row['TenDM'] ?></option>
                                        <!-- <span><i class="fas fa-chevron-right"></i></span> -->
                                    <?php  } ?>




                                </li>
                        </div>
                        </a>
                        <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item " href="./mayberline.php">Kem dưỡng da Maberline</a>
                                    <a class="dropdown-item" href="#">Kem dưỡng da Vichy</a>
                                    <a class="dropdown-item" href="#">Kem dưỡng da Hazzenin</a>
                                    <a class="dropdown-item" href="#">Kem dưỡng da Shensado</a>
                                    <a class="dropdown-item" href="#">Kem dưỡng da Linh Hương</a>
                                </div>
                            </li>
                            <li class="nav-item dropright">
                                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #e83e8c;">
                                    <div class=" d-flex justify-content-between">
                                        MỸ PHẨM TRANG ĐIỂM
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item " href="#">Mỹ phẩm trang điểm Mayberline</a>
                                    <a class="dropdown-item" href="#">Mỹ phẩm trang điểm Oxy </a>
                                    <a class="dropdown-item" href="#">Mỹ phẩm trang điểm Vichy</a>
                                </div>
                            </li>
                            <li class="nav-item dropright">
                                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #e83e8c;">
                                    <div class=" d-flex justify-content-between">
                                        CHĂM SÓC BODY
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item " href="#">Dưỡng da toàn thân</a>
                                    <a class="dropdown-item" href="#">Giữ ẩm</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item dropright">
                                <a class="nav-link " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #e83e8c;">
                                    <div class=" d-flex justify-content-between">
                                        CHĂM SÓC TÓC
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item " href="#">Chăm sóc tóc hư tổn</a>
                                    <a class="dropdown-item" href="#">Chăm sóc tóc óng ả mượt mà</a>
                                    <a class="dropdown-item" href="#">Chăm sóc tóc gãy rụng</a>
                                </div>
                            </li>
                            <li class="nav-item dropright">
                                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #e83e8c;">
                                    <div class=" d-flex justify-content-between">
                                        CHĂM SÓC TOÀN THÂN
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item " href="#">Chăm sóc toàn thân Mayberlin</a>
                                    <a class="dropdown-item" href="#">Chăm sóc toàn thân Diana</a>
                                    <a class="dropdown-item" href="#">Chăm sóc toàn thân Wahti </a>
                                </div>
                            </li>
                            <li class="nav-item dropright">
                                <a class="nav-link " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #e83e8c;">
                                    <div class=" d-flex justify-content-between">
                                        THỰC PHẨM CHỨC NĂNG
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item " href="#">Thực phẩm giảm béo</a>
                                    <a class="dropdown-item" href="#">Thực phẩm tăng cân</a>
                                    <a class="dropdown-item" href="#">Thực phẩm tăng chiều cao cho trẻ</a>
                                </div>
                            </li>
                            <li class="nav-item dropright">
                                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #e83e8c;">
                                    <div class=" d-flex justify-content-between">
                                        MỸ PHẨM THIÊN NHIÊN
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item " href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div> -->
                        </li>
                        </ul>
                        <!-- </div> -->
                    </nav>
                </div>
                <!-- --- end menu -->

                <div class="col-6 pr-0">
                    <img name="myimage" class="w-100 h-100" src="./ANH/nen1.jpg" />
                    <script type="text/javascript">
                        window.onload = function() {
                            setTimeout("switchImage()", 2000);
                        }
                        var current = 1;
                        var numIMG = 4;

                        function switchImage() {
                            current++;
                            // Thay thế hình
                            document.images['myimage'].src = './ANH/nen' + current + '.jpg';
                            // Gọi lại hàm nếu thõa đk
                            if (current == numIMG) {
                                current = 0;
                            }
                            setTimeout("switchImage()", 2000)
                            // Nếu muốn ảnh thay liên tục ko dừng thì thay đoạn if(current<numIMG) bằng đoạn code sau:
                            /* if(current == numIMG){current =0;}
						 setTimeout("switchImage()", 1000);*/
                        }
                    </script>
                </div>
                <!-- end baner -->
                <div class="col-4">
                    <img class="w-100 h-100" src="./ANH/bang3.png">
                </div>
            </div>
            <!-- end ship  -->
    </div>
    </section>
    <hr class="line1">
    <!-- --show host rpoduct  -->
    <section class=" mt-3">
        <div class="container-fluid">
            <div class="host_product">
                <div class=" ">
                    <div class="row px-0 ">
                        <div class=" col-5">
                            <h4 class=" text-success"><i class="fab fa-hotjar"></i> Sản phẩm bán chạy</h4>
                        </div>
                        <div class=" col-7">
                            <ul class="nav float-right ">
                                <li class="nav-item p-1 ">
                                    <a href="" class="btn btn-outline-danger text-secondary " style="background-color: lightpink;">Son môi</a>
                                </li>
                                <li class="nav-item p-1 ">
                                    <a href="" class=" btn btn-outline-danger text-secondary " style="background-color: lightpink;">Kem dưỡng da</a>
                                </li>
                                <li class="nav-item p-1 ">
                                    <a href="" class="btn btn-outline-danger text-secondary " style="background-color: lightpink;">Nước hoa</a>
                                </li>
                                <li class="nav-item p-1 ">
                                    <a href="" class="btn btn-outline-danger text-secondary " style="background-color: lightpink;">Xem Thêm</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- show product -->
        <div class="row h-100 w-100 container-fluid detail">
            <div class=" col-12 my-3 pt-4">

                <!-- dươi đây là slide ảnh các sản phẩm bán chạy  -->
                <div id="SPBanChay" class="mx-0 row owl-carousel owl-theme ">
                    <?php
                    $sql = "SELECT * FROM sanpham order by MaSP asc";
                    $product = $db->fetchsql($sql);

                    foreach ($product as $row) {
                    ?>
                        <div class="product ">
                            <div class="position-relative">
                            <img class="img-fluid mx-auto " width="100%" src="./ANH/<?php echo $row['HinhAnh'] ?>" alt="">
                            <div class="d-flex justify-content-between mb-1 position-absolute product-detail-position w-100">
                                <a href="./chitietsp.php?id=<?php echo $row['MaSP']?>" class="ml-1 text-white btn btn-primary"><i class="far fa-eye"></i>Xem</a>
                                <button value="<?php echo $row['MaSP'] ?>" class="buy mr-1 text-white btn btn-success"><i class=" fas fa-cart-plus"></i> Mua</button>
                            </div>
                            </div>
                            <div class="px-2 d-flex justify-content-between" style="height:25px">
                                <p class=" text-danger"><?php echo number_format($row['DonGia']) . ' đ' ?></p>
                                <strike class=" text-dark">
                                    <?php echo number_format($row['GiaGoc']) . ' đ' ?></strike>
                            </div>
                            <div class="product-detail-qtt rounded position-absolute text-center ">
                                <p class="text-white mb-0">Số lượng: <small class=" font-weight-bold text-white"><?php echo $row['SoLuong'] ?></small></p>
                            </div>
                            <p class=" text-center text-truncate">
                                <?php echo $row['TenSP'] ?>
                            </p>
                        </div>
                    <?php }
                    ?>
                </div>
                <!-- end sp ban chay -->
            </div>
    </section>
    <hr class="line1">
    <!--  show thương hiệu  -->
    <section>
        <div class="container-fluid trademark">

            <div class="row mt-3">

                <h4 class="text-danger col-5"><i class="far fa-registered"></i> Thương hiệu nổi bật</h4>
                <div class=" col-7">
                    <ul class="nav float-right ">
                        <li class="nav-item p-1 ">
                            <a href="" class="btn btn-outline-danger text-secondary " style="background-color: lightpink;">Xem thêm</a>
                        </li>
                    </ul>
                </div>
                <div class="col-2 container trademark ">
                    <div class="">
                        <a href=""><img class="card-img-top" src="./ANH/thh1.jpg" alt="Card image">
                            <div class="card-img-overlay">

                                <button class="btn btn-success"> CLINIQUE</button>
                            </div>
                    </div>
                </div></a>

                <div class="col-2 container trademark ">
                    <div class="">
                        <a href=""><img class="card-img-top" src="./ANH/byme.JPG" alt="Card image">
                            <div class="card-img-overlay">

                                <button class="btn btn-primary "> SOME BY ME</button>
                            </div>
                    </div>
                </div></a>

                <div class="col-2 container trademark ">
                    <div class="">
                        <a href=""><img class="card-img-top" src="./ANH/senka.jpg" alt="Card image">
                            <div class="card-img-overlay">

                                <button class="btn btn-primary "> MAYBELLINE</button>
                            </div>
                    </div>
                </div></a>

                <div class="col-2 container trademark ">
                    <div class="">
                        <a href=""><img class="card-img-top" src="./ANH/thuonghieu3.jpg" alt="Card image">
                            <div class="card-img-overlay">

                                <button class="btn btn-primary "> ROHTO</button>
                            </div>
                    </div>
                </div></a>

                <div class="col-2 container trademark ">
                    <div class="">
                        <a href=""><img class="card-img-top" src="./ANH/thuonghieu4.jpg" alt="Card image">
                            <div class="card-img-overlay">

                                <button class="btn btn-primary "> MAC</button>
                            </div>
                    </div>
                </div></a>

                <div class="col-2 container trademark ">
                    <div class="">
                        <a href=""><img class="card-img-top" src="./ANH/vichy.jpg" alt="Card image">
                            <div class="card-img-overlay">

                                <button class="btn btn-primary ">VICHY</button>
                            </div>
                    </div>
                </div></a>

            </div>
            <hr>
        </div>
    </section>
    <hr class=" line1">
    <!--  SHOW UU ĐÃI  -->
    <section>
        <div class="uudai container-fluid">

            <div class="row mt-3 border-danger">
                <div class="col-5">
                    <h4 class="text-danger col-5"><i class="fas fa-apple-alt"></i> Ưu đãi thường kỳ</h4>
                </div>
                <div class=" col-7">
                    <ul class="nav float-right ">
                        <li class="nav-item p-1 ">
                            <a href="" class="btn btn-outline-danger text-secondary mb-3 " style="background-color: lightpink;">Xem thêm</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class=" row">
                        <div class="col-2   ">
                            <img src="./ANH/uudai1.jpg">
                            <a href="" class="btn btn-outline-danger text-secondary " style="background-color: lightpink;">Dưỡng da</a>
                            <a href="" class="btn btn-outline-danger text-secondary mt-1 " style="background-color: lightpink;">Trị Thâm</a>
                            <a href="" class="btn btn-outline-danger text-secondary mt-1 " style="background-color: lightpink;">Mặt nạ</a>
                            <a href="" class="btn btn-outline-danger text-secondary mt-1 " style="background-color: lightpink;">Nươc hoa hồng</a>

                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-4"><img src="./ANH/uudai1.1.jpg"></div>
                                <div class="col-4"><img src="./ANH/uudai1.2.jpg"></div>
                                <div class="col-4"><img src="./ANH/uudai1.2.jpg"></div>
                            </div>
                            <!--  showw sp -->
                            <ul class="row mt-3 pl-0 pr-3">
                                <div id="SPUuDai" class="mx-0 row owl-carousel owl-theme ">
                                    <?php
                                    $sql = "SELECT * FROM sanpham order by MaSP asc";
                                    $product = $db->fetchsql($sql);

                                    foreach ($product as $row) {
                                    ?>
                                        <div class="product">
                                            <div class=" position-relative">
                                            <img class="img-fluid mx-auto position-relative" width="25%" src="./ANH/<?php echo $row['HinhAnh'] ?>" alt="">
                                            <div class="d-flex justify-content-between mb-1 position-absolute product-detail-position w-100">
                                                <a href="./chitietsp.php?id=<?php echo $row['MaSP']?>" class="ml-1 text-white btn btn-primary"><i class="far fa-eye"></i>Xem</a>
                                                <button value="<?php echo $row['MaSP'] ?>" class="buy mr-1 text-white btn btn-success"><i class=" fas fa-cart-plus"></i> Mua</button>
                                            
                                            
                                            
                                            </div>
                                            </div>
                                            <div class="px-2 d-flex justify-content-between mt-1" style="height:25px">
                                                <p class=" text-danger"><?php echo number_format($row['DonGia']) . ' đ' ?></p>
                                                <strike class=" text-dark">
                                                    <?php echo number_format($row['GiaGoc']) . ' đ' ?></strike>
                                            </div>
                                            <div class="product-detail-qtt rounded position-absolute text-center ">
                                                <p class="text-white mb-0">Số lượng: <small class=" font-weight-bold text-white"><?php echo $row['SoLuong'] ?></small></p>
                                            </div>
                                            <p class=" text-center text-truncate">
                                                <?php echo $row['TenSP'] ?>
                                            </p>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                        </div>
                        <hr class="line1">


                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class=" container-fluid">
        <div class="news row">
            <div class=" col-6">
                <a href="" class="text-decoration-none"> <img class="img2 my-5 ml-4" src="./ANH/duongda.jpg"></a>
            </div>
            <div class=" col-6">
                <a href="">
                    <h2 class=" font-italic pt-5 animate__animated animate__bounce animate__delay-2s  text-muted"> Muốn dưỡng da trắng?</h2><br>
                    <h3 class="animate__animated animate__bounce "> Nhất định bạn phải biết những điều này!</h3>
                    <p class=" lead pt-3 mr-4">Sở hữu làn da trắng sáng luôn là mong muốn của hầu hết các chị em, đặc biệt là phụ nữ Á Đông.
                        Tuy nhiên, bất kỳ liệu trình làm đẹp nào cũng cần có đủ thời gian để phát huy tối đa công dụng.
                        Việc quá nôn nóng bằng cách sử dụng các sản phẩm không an toàn, công nghệ cao xâm lấn có thể dẫn đến tình trạng viêm da,
                        ăn mòn, ung thư.
                        Bài viết dưới đây sẽ cung cấp những thông tin, kiến thức về sức khỏe làn da mà bất cứ tín đồ làm đẹp nào cũng cần biết để
                        dưỡng trắng da hoàn hảo.</p>
                </a>
            </div>
    </section>
    <!-- cách chăm da -->
    <section class=" mt-2 container-fluid ">
        <div class=" row">
            <div class=" col-3 pl-5 ">
                <div class="card" style="width:280px ;height:400px">
                    <img class="card-img-top" src="./ANH/chamsoc1.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Rửa mặt hiệu quả</h4>
                        <p class="card-text">Các bước rửa mặt đúng cách...</p>
                        <a href="#" class="btn btn-primary">Tìm hiểu</a>
                    </div>
                </div>

            </div>
            <div class=" col-3 ">
                <div class="card" style="width:270px; height:400px">
                    <img class="card-img-top" src="./ANH/chamsoc2.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title"> Đắp mặt dưỡng da</h4>
                        <p class="card-text">Một chế độ chăm sóc da kĩ lưỡng và đều đặn sẽ giúp da bạn đẹp ...</p>
                        <a href="#" class="btn btn-primary">Tìm hiểu</a>
                    </div>
                </div>
            </div>
            <div class="col-3 ">

                <div class="card" style="width:270px;height:400px">
                    <img class="card-img-top" src="./ANH/chamda5.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Chăm sóc da mụn</h4>
                        <p class="card-text">Bạn có một là da dầu mụn, gây mất tự tin...</p>
                        <a href="#" class="btn btn-primary">Tìm hiểu</a>
                    </div>

                </div>
            </div>

            <div class="col-3 pl-4">

                <div class="card" style="width:280px;height:400px">
                    <img class="card-img-top" src="./ANH/chamda.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Tránh nắng cho da</h4>
                        <p class="card-text"> Hè làm da bạn trở lên đen xạm...</p>
                        <a href="#" class="btn btn-primary">Tìm hiểu</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end host product  -->
    <footer class=" mt-5">
        <?php
        include("footer.php")
        ?>
    </footer>
    <!--  -->


    <script>
        /// show product
        $(document).ready(function() {
            var owl = $('#SPBanChay');
            owl.owlCarousel({
                nav: true,
                items: 6,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1500,
                autoplayHoverPause: true
            });
            $('#SPUuDai').owlCarousel({
                nav: true,
                items: 5,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true
            });
            
            // $('.customNextBtn').click(function() {
            // owl.trigger('next.owl.carousel');
            // })
            // // Go to the previous item
            // $('.customPrevBtn').click(function() {
            // // With optional speed parameter
            // // Parameters has to be in square bracket '[]'
            // owl.trigger('prev.owl.carousel', [300]);
            // })

        });

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

        })
    </script>
    </div>
</body>

</html>