<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
$_SESSION['useradmin'];
$nhanvien = $db->fetchTKNVbyUsername("nhanvien", $_SESSION['useradmin']);
?>
<div class="col-md-2 d-none d-md-block bg-light border-right border-secondary sidebar ">
    <ul class=" nav flex-column">
        <li class=" nav-item mt-5">
            <a class=" nav-link text-decoration-none " href="./index.php"><i class="fas fa-home text-primary  "></i>
                <small class="font-weight-bold text-primary">Home</small></a>
        </li>
        <?php if ($nhanvien['MaPQ'] == 1) { ?>
        <li class=" nav-item">
            <style>
                a:hover {
                    background-color: blue;
                }
            </style>
            <a class=" nav-link text-decoration-none text-secondary" href="http://localhost:8080/DoAnTong/admin/danhmuc.php"><i class="far fa-sticky-note"></i> <small class="font-weight-bold text-dark">Danh mục</small></a>
        </li>
        <li class=" nav-item">
            <a class=" nav-link text-decoration-none text-secondary" href="http://localhost:8080/DoAnTong/admin/sanpham.php"><i class="fas fa-shopping-cart"></i> <small class="font-weight-bold text-dark">Sản phẩm</small></a>
        </li>
        <li class=" nav-item">
            <a class=" nav-link text-decoration-none text-secondary" href="http://localhost:8080/DoAnTong/admin/nguoidung.php"><i class="fas fa-user-friends"></i> <small class="font-weight-bold text-dark">Tài Khoản</small></a>
        </li>
        <li class=" nav-item">
            <a class=" nav-link text-decoration-none text-secondary" href="http://localhost:8080/DoAnTong/admin/DuyetDonHang.php"><i class="fas fa-chart-bar"></i> <small class="font-weight-bold text-dark"> Xử lý đơn đặt hàng </small></a>
        </li>
        <?php } ?>
        <li class=" nav-item">
            <a class=" nav-link text-decoration-none text-secondary" href="http://localhost:8080/DoAnTong/admin/capnhatTTGiaoHang.php"><i class="fas fa-shipping-fast"></i>
                <small class="font-weight-bold text-dark"> Cập nhật tình trạng giao hàng </small></a>
        </li>
        <li class=" nav-item">
            <a class=" nav-link text-decoration-none text-secondary" href="http://localhost:8080/DoAnTong/admin/XuLyDonTraVe.php"><i class="fab fa-codepen"></i>
                <small class="font-weight-bold text-dark"> Xử lý đơn sau gửi </small></a>
        </li>
        <li class=" nav-item">
            <a class=" nav-link text-decoration-none text-secondary" href="http://localhost:8080/DoAnTong/admin/DonHoanThanh.php"><i class="fas fa-chart-bar"></i> <small class="font-weight-bold text-dark">Danh sách đơn đã hoàn thành</small></a>
        </li>
    </ul>
    <?php if ($nhanvien['MaPQ'] == 1) { ?>
        <div class=" p-3">
            <small class=" font-weight-bold text-muted">BÁO CÁO- THỐNG KÊ</small>
            <i class=" pt-1 float-right far fa-plus-square"></i>
        </div>
        <ul class=" nav flex-column">
            <li class=" nav-item">
                <a class=" nav-link text-decoration-none text-secondary" href="http://localhost:8080/DoAnTong/admin/thongkedoanhthu.php"><i class="far fa-newspaper"></i> <small class="font-weight-bold text-dark">
                        Doanh thu </small></a>
            </li>
            <li class=" nav-item">
                <a class=" nav-link text-decoration-none text-secondary" href="http://localhost:8080/DoAnTong/admin/thongkesanpham.php"><i class="far fa-newspaper"></i> <small class="font-weight-bold text-dark">
                        Sản phẩm đã bán </small></a>
            </li>
            <li class=" nav-item">
                <a class=" nav-link text-decoration-none text-secondary" href="http://localhost:8080/DoAnTong/admin/thongkenguoidung.php"><i class="far fa-newspaper"></i> <small class="font-weight-bold text-dark">
                        Người dùng </small></a>
            </li>
            <!-- <li class=" nav-item">
            <a class=" nav-link text-decoration-none text-secondary" href="#"><i class="far fa-newspaper"></i> <small class="font-weight-bold text-dark">
                    Tổng Kết Kho</small></a>
        </li> -->
        </ul>
    <?php } ?>
</div>