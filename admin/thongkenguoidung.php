<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
?>
<?php
include("headAmin.php");
 $Users= $db->fetchAll("taikhoan");

?>
<div class="container-fluid pt-48 pb-5 mt-5 ">
<div class="row">
    <?php include("leftAdmin.php"); ?>
    <div class="col-10">
        <h1>Tổng số user: <?php echo count($Users)  ?></h1>
    </div>
</div>
</div>
