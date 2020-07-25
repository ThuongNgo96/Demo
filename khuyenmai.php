<?php
require_once __DIR__ . "./ImportFile/importFile.php";

?>
               <?php
include('head.php');
include('homedanhmuc.php')
               ?>
               <html>
                   <link rel="stylesheet" href="./css/main.css">
                   <link rel="shortcut icon" type="image/png" href="..ANH/icon.jpg">
                    <ul class="row- col-9 mt-4 mx-5 ">
                    <h3>
                       Danh sách Sản Phẩm Khuyến Mãi
                   </h3>
                            <div class="MultiCarousel1 ml-4 " data-items="1,3,5,6" data-slide="1" id="MultiCarousel1" data-interval="1000">
                                <div class="MultiCarousel1-inner">
                                    <?php
                                    $sql = "SELECT * FROM sanpham  order by MaSP desc";
                                    $product = $db->fetchsql($sql);

                                    foreach ($product as $row) {
                                    ?>
                                        <div class="item1 badge-light mt-4">
                                            <div class="pad156">
                                                <img class="img-fluid mx-4" style="width: 170px;" src="ANH/<?php echo $row['HinhAnh'] ?>" alt="">
                                                <div class=" d-flex justify-content-between" style="height:25px">
                                                    <p class="text-danger"><?php echo number_format($row['DonGia']) . ' đ' ?></p>
                                                   
                                                </div>

                                                <p class=" text-center text-truncate">
                                                    <?php echo $row['TenSP'] ?>
                                                </p>
                                                <div class="d-flex justify-content-between mb-1  ">
                                                    <a class=" text-white btn btn-primary"><i class="far fa-eye"></i>Xem</a>
                                                    <button value="<?php echo $row['MaSP'] ?>" class="buy mr-1 text-white btn btn-success"><i class=" fas fa-cart-plus"></i> Mua</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <hr class="line1">
                                </div>

<?php
 include('footer.php')
?>
                    </div>
                    </html>