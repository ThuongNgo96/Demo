<?php
require_once __DIR__ . "./../ImportFile/importFile.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $firstDay = getInput("firstDay");
    $lastDay = getInput("lastDay");
    $formatFirstDay = new DateTime($firstDay);
    $formatLastDay = new DateTime($lastDay);
    $getFirstDay = $formatFirstDay->format('yy-m-d');
    $getLastDay = $formatLastDay->format('yy-m-d');
    // 
    
    $result = "";
    // $aaa = "";
    $sql = "SELECT * FROM donhang WHERE '$getFirstDay' <= NgayDat and NgayDat <= '$getLastDay' and MaTTDH = 11 ";
    $result = $db->fetchsql($sql);
    if (empty($result)) {
        // _debug('ádsad');
        //echo "tongt tien:";  

    }
}


?>
<?php
include("headAmin.php")
?>

<link rel="shortcut icon" type="image/png" href="../ANH/icon.jpg">
<title>Duyet don</title>
<div class="container-fluid pt-48 pb-5 mt-4 ">
    <div class="row margin-top-50">
        <?php include("leftAdmin.php") ?>
        <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-between pt-3" style=" height: 50px;">
                    <div class=" ">
                        <h2 class="mt-3">Xem doanh thu cửa hàng</h2>
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
                            <p>Từ ngày &nbsp;&nbsp;: <input autocomplete="off" type="text" name="firstDay" id="datepicker" class="border-calendar" value="<?php echo $getFirstDay;  ?>"></p>
                        </div>
                        <div>
                            <p>Đến ngày : <input autocomplete="off" type="text" name="lastDay" id="datepicker1" class="border-calendar" value="<?php echo $getLastDay;  ?>"></p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="click btn btn-outline-primary ml-5">xem</button>
                    </div>
                </form>
            </div>
            <hr>
            <table class="table table-bordered" style="margin-bottom: 1px;">
                <thead>
                    <tr class=" badge-dark">
                        <th scope="col" class="text-center">STT</th>
                        <th scope="col" class="text-center">Tên Khách Hàng</th>
                        <th scope="col" class="text-center">Tổng tiền </th>
                        <th scope="col" class="text-center">Thời gian </th>
                    </tr>
                </thead>
                <?php if (!empty($aaa)) {
                ?> 
                <tbody>
                    <?php
                    $sql = "SELECT * FROM donhang WHERE MaTTDH = 3 ";
                    $bills = $db->fetchsql($sql);
                    $Total = 0;
                    // _debug($bills);

                    foreach ($bills  as $key => $bill) {
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
                <?php }else {
                    //  _debug('âsdsadsa');
                ?>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM donhang WHERE MaTTDH = 3 ";
                    // $bills = $db->fetchsql($sql);
                    // _debug($bills);
                    $Total = 0;
                    foreach ($result as $key => $bill) {
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
                <?php }?>
            </table>
        </div>
    </div>
</div>
<?php
include("footerAdmin.php")
?>
<script>
    $(document).ready(function() {
        $( "#datepicker" ).datepicker({
            // dateFormat: 'dd-mm-yy',
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: false,
               showWeek:true,
               yearSuffix:"-CE",
               showAnim: "slide",
               changeMonth:true,
            });
            $( "#datepicker1" ).datepicker({
                // dateFormat: 'dd-mm-yy',
               prevText:"click for previous months",
               nextText:"click for next months",
               showOtherMonths:true,
               selectOtherMonths: true,
               showWeek:true,
               yearSuffix:"-CE",
               showAnim: "slide",
               changeMonth: true,
            });
    });
</script>