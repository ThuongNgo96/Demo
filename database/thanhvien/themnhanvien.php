<?php
$open = "danhmuc";
require_once __DIR__ . "/./../../ImportFile/importFile.php";
$danhmuc = $db->fetchAll("danhmuc");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $data =
    //     [
    //         "TenSP" => postInput('TenSP'),
    //         "price"=> postInput('price'),
    //         "soluong"=>postInput('soluong'),
    //         "category_id"=> postInput('category_id'),
            

    //     ];
    $error = [];
}
if(empty($error))
{
    if( isset($_FILES['thunbar']))
    {
        $file_name = $_FILES['thunbar']['name'];
        $file_tmp= $_FILES['thunbar']['tmp_name'];
        $file_type= $_FILES['thunbar']['type'];
        $file_erro= $_FILES['thunbar']['error'];
        if($file_erro==0)
        {
            $part= ROOT."product/";
            $data['thunbar']=$file_name;
        }
    }
  
//     $id_insert= $db->insert("sanpham",$data);
//     if($id_insert)
//     {
//         $_SESSION['success']=" thêm mới thành công";
//         redirectAdmin("sanpham");
//     }
//     else
//     {
//         $_SESSION['error']=" thêm mới thất bại ";
//     }
// }
}
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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>thêm Nhân viên</title>
</head>

<body>
    <?php
    include("./../../admin/headAmin.php")
    ?>
    <div class="container-fluid pt-48 pb-5 mt-4 ">

        <div class="row ">
            <?php include("./../../admin/leftAdmin.php") ?>
            <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4 mt-5">
            <h1 class=" text-danger text-center">Thêm nhân viên:</h1>
                <div class="row">
                    <form class="col-8 offset-2" method="post" action="./../../database/thanhvien/xulythemNV.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputAddress">Họ và Tên: </label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="..." name="HoTen" required>
                            <?php
                            if (isset($error['HoTen'])) :
                            ?>
                                <p class=" text-danger">
                                    <?php echo $error['HoTen']  ?>
                                </p>
                            <?php endif  ?>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Địa chỉ</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="" name="DiaChi" required>
                            <?php
                            if (isset($error['DiaChi'])) :
                            ?>
                                <p class=" text-danger">
                                    <?php echo $error['DiaChi']  ?>
                                </p>
                            <?php endif  ?>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Số Điện thoại </label>
                            <input type="number" class="form-control" id="inputAddress2" placeholder="" name="SoDienThoai" required>
                            <?php
                            if (isset($error['SoDienThoai'])) :
                            ?>
                                <p class=" text-danger">
                                    <?php echo $error['SoDienThoai']  ?>
                                </p>
                            <?php endif  ?>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress2">User name</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="" name="UserName" required>
                            <?php
                            if (isset($error['UserName'])) :
                            ?>
                                <p class=" text-danger">
                                    <?php echo $error['UseNname']  ?>
                                </p>
                            <?php endif  ?>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Password</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="" name="Password" required>
                            <?php
                            if (isset($error['Password'])) :
                            ?>
                                <p class=" text-danger">
                                    <?php echo $error['Password']  ?>
                                </p>
                            <?php endif  ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputState">Mã Phân Quyền</label>
                                <select id="inputState" class="form-control" name="PQ_id">
                                    <option selected>Chọn mã Phân quyền ...</option>
                                    <?php
                                    $sql = "SELECT * FROM phanquyen  order by MaPQ asc";
                                    $MaPQ = $db->fetchsql($sql);
                                    foreach ($MaPQ as $key => $row) {
                                    ?>
                                        <option value="<?php echo $row['MaPQ'] ?>"><?php echo $row['Quyen'] ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Thêm Nhân Viên</button>
                        </div>
                    </form>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
        </div>
    </div>
    </div>
</body>

</html>