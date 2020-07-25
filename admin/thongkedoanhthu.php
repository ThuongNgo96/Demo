<?php
require_once __DIR__ . "./../ImportFile/importFile.php";

// if ($_SERVER["REQUEST_METHOD"] == "G") {
//     $firstDay = postInput("firstDay");
//     $lastDay = postInput("lastDay");
//     $formatFirstDay = new DateTime($firstDay);
//     $formatLastDay = new DateTime($lastDay);
//     $getFirstDay = $formatFirstDay->format('Y-m-d 00:00:00');
//     $getLastDay = $formatLastDay->format('Y-m-d 23:59:59');
//     _debug($getFirstDay,$getLastDay)  ;
//     $sql = "SELECT *  FROM donhang  WHERE $getFirstDay <= NgayDat <=$getLastDay";
//     $result = $db->fetchsql($sql);
//     _debug($result);
// }


?>
<?php
include("headAmin.php")
?>
<link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">
<title>Duyet don</title>
<div class="container-fluid pt-48 pb-5 mt-4 ">
    <div class="row ">
        <?php include("leftAdmin.php") ?>
        <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-between pt-3" style=" height: 50px;">
                    <div class=" ">
                        <h2>Xem doanh thu cửa hàng</h2>
                    </div>
                    <!-- <div class=" d-flex">
                    <button class="btn btn-success"><i class="fas fa-plus-circle"></i> Create an a Bill</button>
                </div> -->
                </div>
            </div>
            <div class="row">
                <form method="GET" action="./thongkedoanhthu.php" class="col-5 mt-5 d-flex flex-column justify-content-center align-items-center">
                    <div>
                        <p> Chọn thời gian :</p>
                        <div>
                            <p>Từ ngày &nbsp;&nbsp;: <input type="text" name="firstDay" id="datepicker" class="border-calendar"></p>
                        </div>
                        <div>
                            <p>Đến ngày : <input type="text" name="lastDay" id="datepicker1" class="border-calendar"></p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="click btn btn-outline-primary ml-5">xem</button>
                    </div>
                </form>
            </div>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr class=" badge-dark">
                        <th scope="col" class="text-center">STT</th>
                        <th scope="col" class="text-center">Tên Khách Hàng</th>
                        <th scope="col" class="text-center">Tổng tiền </th>
                        <th scope="col" class="text-center">Thời gian </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $bills = $db->fetchAll("donhang");
                    $Total = 0;
                    foreach ($bills as $key => $bill) {
                    ?>
                        <tr>
                            <th class="text-center" scope="row"><?php echo $key + 1 ?></th>
                            <td class="text-center"><?php echo $bill['TenNguoiNhan'] ?></td>
                            <td class="text-center"><?php echo number_format($bill['TongTien']) . 'đ' ?></td>
                            <td class="text-center"><?php echo $bill['NgayDat'] ?></td>
                        </tr>
                    <?php
                        $Total += $bill['TongTien'];
                    } ?>
                    <tr>
                        <th scope="row"> Số lượng đơn hàng:</th>
                        <td>Tổng Doanh Thu</td>
                        <td class="text-center text-danger font-weight: bold;" colspan="2"><?php echo number_format($Total) . 'đ'  ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include("footerAdmin.php    ")
?>

<script>
    $(document).ready(function() {
        $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $("#datepicker1").datepicker({
            dateFormat: 'yy-mm-dd',
            // timeFormat: 'hh:mm:ss'
        });
        $('.click').click(function () {
            let a = $('#datepicker').val();
            let b = $('#datepicker1').val();
            // console.log(a + b);
        })
    });
    // $(document).ready(function() {
    //     // $("#datepicker").datepicker({
    //     //     dateFormat: 'yy-mm-dd'
    //     // });
    //     $("#datepicker1").datepicker({
    //         dateFormat: 'yy-mm-dd',
    //         // timeFormat: 'hh:mm:ss'
    //     });
    // });
</script>