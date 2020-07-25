<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
include("headAmin.php");
?>
<link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">
<title>sản phẩm đã bán </title>
<div class="container-fluid pt-48 pb-5 mt-4 ">
    <div class="row ">
        <?php include("leftAdmin.php") ?>
        <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-between pt-3" style=" height: 50px;">
                    <div class=" ">
                        <h2>Thống kê số lượng sản phẩm đã bán được:</h2>
                    </div>


                    <!-- <div class=" d-flex">
                    <button class="btn btn-success"><i class="fas fa-plus-circle"></i> Create an a Bill</button>
                </div> -->
                </div>
            </div>
           
            <hr>
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">số lượng đã bán </th>
                                <!-- <th scope="col">Thời gian </th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryBillsdetail = "SELECT * FROM chitietdonhang";
                            $queryProducts = "SELECT * FROM sanpham";
                            $soluongSP = "SELECT sanpham.TenSP ,sum(chitietdonhang.SoLuongMua) as SoLuongSP FROM chitietdonhang INNER JOIN sanpham on chitietdonhang.MaSP = sanpham.MaSP GROUP BY sanpham.MaSP;";
                            $billsDetail = $db->fetchsql($queryBillsdetail);
                            $products = $db->fetchsql($soluongSP);
                            // var_dump($products);
                            // die;
                            foreach ($products as $key => $row) {
                                // $arr[$key]= [];
                                // var_dump($arr[$key]  , $key);
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $key + 1 ?></th>
                                    <td><?php echo $row['TenSP'] ?></td>
                                    <td><?php echo $row['SoLuongSP'] ?></td>

                                    <!-- <td>@mdo</td> -->
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
include("footerAdmin.php    ")
?>

<script>
    $(document).ready(function() {
        $("#datepicker").datepicker();
        $("#datepicker1").datepicker();
    });
</script>