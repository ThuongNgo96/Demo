<?php
require_once __DIR__ . "./../../ImportFile/importFile.php";

$id = intval(getInput('id'));
// $idProduct = postInput('id');
$Editproduct = $db->fetchSP("sanpham", $id);
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($Editproduct)) {

        $_SESSION['error'] = " du lieu khong ton tai";
        redirectAdmin("../../admin/sanpham.php");
    }
}
$sanpham = $db->fetchAll("sanpham");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = postInput('id');
    $data =
        [
            "TenSP" => postInput('TenSP'),
            "GiaGoc" => postInput('price'),
            "GiamGia"=>postInput('pricesell'),
            "SoLuong" => postInput('soluong'),
            "MaDM" => postInput('category_id'),
        ];
    // var_dump($_FILES['thunbar']);
    // die;
    if (isset($_FILES['thunbar'])) {
        // _debug($_FILES['thunbar']);
        $file_name = $_FILES['thunbar']['name'];
        $file_tmp = $_FILES['thunbar']['tmp_name'];
        $file_type = $_FILES['thunbar']['type'];
        $file_error = $_FILES['thunbar']['error'];
        if ($file_error == 0) {
            $part = ROOT;
            $data['HinhAnh'] = $file_name;
        }
    }
    $update = $db->update("sanpham", $data, array("MaSP" => $id));
    if ($update > 0) {
        move_uploaded_file($file_tmp, $file_name);
        $_SESSION['success'] = " update thành công";
        redirectAdmin("sanpham.php");
    } else {
        $_SESSION['success'] = " update thất bại ";
        redirectAdmin("sanpham.php");
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
<?php
include("./../../admin/headAmin.php")
?>
<div class="container-fluid pt-48 pb-5 mt-4 ">

    <div class="row ">
        <?php include("./../../admin/leftAdmin.php") ?>
        <div class="col-md-10 bg-white  ml-sm-auto col-lg-10 px-4 mt-5">
            <h1 class="text-center text-danger"> Sửa sản phẩm:</h1>
            <div class="row">
                <form class="col-8 offset-2" method="post" action="./suasp.php" enctype="multipart/form-data">
                    <div class="form-group">
                    <input type="text" value="<?php echo($Editproduct['MaSP'])?>" hidden name="id">
                        <label for="inputAddress">Tên sản phẩm: </label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="dưỡng da..." name="TenSP" required value="<?php echo $Editproduct['TenSP'] ?>">
                        <?php
                        if (isset($error['TenSP'])) :
                        ?>
                            <p class=" text-danger">
                                <?php echo $error['TenSP']  ?>
                            </p>
                        <?php endif  ?>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Gía gốc</label>
                        <input type="number" class="form-control" value="<?php echo $Editproduct['GiaGoc'] ?>" id="inputAddress2" placeholder="" name="price" required>
                        <?php
                        if (isset($error['price'])) :
                        ?>
                            <p class=" text-danger">
                                <?php echo $error['price']  ?>
                            </p>
                        <?php endif  ?>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Giảm %</label>
                        <input type="number" class="form-control" value="<?php echo $Editproduct['GiamGia'] ?>" id="inputAddress2" placeholder="" name="pricesell" required>
                        <?php
                        if (isset($error['pricesell'])) :
                        ?>
                            <p class=" text-danger">
                                <?php echo $error['pricesell']  ?>
                            </p>
                        <?php endif  ?>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress2">Số lượng</label>
                        <input type="number" class="form-control" value="<?php echo $Editproduct['SoLuong'] ?>" id="inputAddress2" placeholder="" name="soluong" required>
                        <?php
                        if (isset($error['soluong'])) :
                        ?>
                            <p class=" text-danger">
                                <?php echo $error['soluong']  ?>
                            </p>
                        <?php endif  ?>
                    </div>
                    <div class="row d-flex align-items-center   ">
                        <div class="col-4">
                            <img src="../../ANH/<?php echo $Editproduct['HinhAnh'] ?>" with=100% alt="">
                        </div>
                        <div class="form-group col-7">
                            <label for="inputAddress2">Chọn hình ảnh:</label>
                            <div class="custom-file">
                                <input type="file" class="" id="customFile" name="thunbar">
                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control" name="category_id">
                                <option selected>Chọn Danh Mục...</option>
                                <?php
                                $sql = "SELECT * FROM danhmuc  order by MaDM asc";
                                $danhmucSP = $db->fetchsql($sql);
                                foreach ($danhmucSP as $key => $row) {
                                ?>
                                    <option value="<?php echo $row['MaDM'] ?>"><?php echo $row['TenDM'] ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Sửa Sản Phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>