<?php
require_once __DIR__ . "./ImportFile/importFile.php";


$qtyProduct = 0;
if (!isset($_SESSION['cart'])) {
    $qtyProduct;
} else {
    $qtyProduct = count($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style1.css">
    <link rel="stylesheet" href="./css/slider.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <title>SAKURA</title>
</head>

<body>
    <div class=" container-fluid">
        <div class="phone row " style="height:20%">

            <div class="space col-lg-12 col-sm-12">
                <p class="animate__animated animate__bounce justify-content-center" style="color: #dc3545;"> Cửa hàng mỹ phẩm Sakura<span style="color:#28a745;"> Địa chỉ: Số 44-Lê Lợi- Đà Nẵng </span>
                    Hotline: <span style="color: #28a745;;"> 0353.898.109</span></p>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="container-fluid Header ">
        <div class="row">
            <div class="col-lg-2 d-sm-none d-md-block d-flex  justify-content-center">
                <img style="float: left; width:60%" src="./ANH/logo_sakura.jpg">
            </div>
            <div class="col-lg-5 col-sm-9 d-flex flex-column justify-content-center">
                <form class="d-flex justify-content-center" method="" action="">
                    <input class="form-control btn-outline-success" type="text" placeholder="Tìm kiếm..." name=" NhapTen">
                    <button class="btn btn-success ml-4">Search</button>
                </form>
            </div>
            <div class="col-lg-5 col-sm-12 d-flex ">
                <div class=" m-auto d-flex flex-column justify-content-center">
                    <!-- --- -->

                    <div>
                        <a class="qty text-nowrap btn btn-outline-success" href="./giohang.php">GIỎ HÀNG ( <?php echo $qtyProduct ?> )</a>
                        <a href=""><img style=" width: 30px; height: 30px; " src="./ANH//giohang.png"></a>
                    </div>
                </div>
                <!-- <div class=" mt-4">
                <a href=" ./dangnhap.php "><button class="qty text-nowrap btn btn-outline-success">Đăng nhập</button></a>
                <a href="./dangky.php"> <button class=" qty text-nowrap btn btn-outline-success ml-1">Đăng ký</button> </a>
                </div> -->

                <div class=" m-auto d-flex flex-column justify-content-center">
                    <ul class="d-flex nav">
                        <?php if (isset($_SESSION['username'])) { ?>
                            <!-- <div class="dropdown">
                                <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>
                                    <?php echo ' Xin chào ' . $_SESSION['username']; ?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#"><i class="fas fa-user"></i>Trang cá nhân</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-key"></i>Đổi mật khẩu</a>
                                    <a class="dropdown-item" href="./database/xulydangxuat.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                                </div>
                            </div> -->
                            <dl class="dropdown-custom mt-4">
                                <dt class="text-success"><a><span><i class="fas fa-user"></i><?php echo ' Xin chào ' . $_SESSION['username']; ?></span></a></dt>
                                <dd>
                                    <ul class="pl-0">
                                        <li class="text-success pl-3 py-2" class="default pl-2 pt-2"><i class="fas fa-user"></i><?php echo ' Xin chào ' . $_SESSION['username']; ?></li>
                                        <li><a class="text-dark" href="./lichsumuahang.php"><i class="fas fa-user"></i>Lịch Sử mua hàng </a></li>
                                        <li><a class="text-dark" href="./donchoxuly.php"><i class="fas fa-arrow-circle-down"></i>Đơn hàng đang chờ xử lý </a></li>
                                        <li><a href="./doimatkhau.php" class="text-dark"><i class="fas fa-key"></i> Đổi mật khẩu</a></li>
                                        <li><a class="text-dark" href="./xulydangxuat.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                                    </ul>
                                </dd>
                            </dl>
                        <?php } else { ?>
                            <li><a class="text-nowrap btn btn-outline-success" href="./dangnhap.php">ĐĂNG NHẬP</a></li>
                            <li><a class="text-nowrap btn btn-outline-success" href="./dangky.php">ĐĂNG KÝ</a></li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
   
    <nav class=" navbar navbar-dark col-12 d-md-none d-sm-block">
                        <button class="navbar-toggler collapsed float-sm-right" type="button" data-toggle="collapse"
                            data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                            aria-expanded="true" aria-label="Toggle navigation" >
                            <span class="navbar-toggler-icon bg-success"></span>
                        </button>
                </nav>

               

    <div class=" container-fluid px-5 bg-light rounder-21px  mt-2">
        <div class=" row ">
            <div class="col-lg-12  justify-content-center border-success rounded">
                <nav class="navbar navbar-expand navbar-light" id="nav_menu1">
            
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav w-100 d-flex flex-sm-column flex-lg-row">
                            
                            <li class="nav-item m-auto">
                                <a class="nav-link" href="./index.php">TRANG CHỦ <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown m-auto">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    THƯƠNG HIỆU
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item " href="./mayberline.php">MayberLine</a>
                                    <a class="dropdown-item" href="#">Senka</a>
                                    <a class="dropdown-item" href="#">Essance</a>

                                </div>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" href="./khuyenmai.php">KHUYẾN MÃI</a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" href="./banchay.php">BÁN CHẠY </a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" href="thongtin.php">THÔNG TIN </a>
                            </li>
                            <li class="nav-item m-auto">
                                <a class="nav-link" href="./huongdanmuahang.php">HƯỚNG DẪN MUA HÀNG</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                        </nav>
            </div>
        </div>
    </div>
    <script></script>


<!-- <div class="">
  <div class="p-2">Flex item 1</div>
  <div class="p-2">Flex item 2</div>
  <div class="p-2">Flex item 3</div>
</div> -->

                        
</body>

</html>