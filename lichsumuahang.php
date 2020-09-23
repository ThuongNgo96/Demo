<?php

require_once __DIR__ . "./ImportFile/importFile.php";
$id = $db->fetchidByUsername('taikhoan', $_SESSION['username']);
$idtk = $id['ID'];
$bill = $db->fetchBillByUsername('donhang', $id['ID']);
$ngay = postInput('firtsdate');
$ngay1 = postInput('lastdate')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>lịch sử mua hàng</title>
</head>

<body>
    <?php

    include("./head.php");


    ?>
    <h1 class=" d-flex justify-content-center text-danger mt-3"> Lịch sử mua hàng của bạn<?php  ?>:</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center" scope="col">Mã đơn hàng </th>
                <th class="text-center" scope="col">Tổng tiền</th>
                <th class="text-center" scope="col">Ngày mua</th>
                <th class="text-center" scope="col">Trạng thái </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM DonHang WHERE ID = $idtk and (MaTTDH = 2 or MaTTDH = 11 or MaTTDH =12 or MaTTDH = 10)";
            $historyBills = $db->fetchsql($sql);
            foreach ($historyBills as $lichsumua) {
                switch ($lichsumua['MaTTDH']) {
                    case '2':
                        $tinhtrang = "Đang giao hàng";
                        break;
                    case '11':
                        $tinhtrang = "Đã Nhận hàng ";
                        break;
                    case '12':
                        $tinhtrang = "Trả lại đơn hàng";
                        break;
                    case '10':
                        $tinhtrang = "Đang chờ xử lý";
                        break;
                }
            ?>
                <tr>
                    <th class="text-center" scope="row"><?php echo 'DH' . $lichsumua['MaDH']  ?></th>
                    <td class="text-center" colspan=""><?php echo number_format ($lichsumua['TongTien'])." đ" ?></td>
                    <td class="text-center"><?php echo $lichsumua['NgayDat']  ?></td>
                    <td class="text-center"><?php echo $tinhtrang ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>
    <?php
    include"./footer.php"

    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>