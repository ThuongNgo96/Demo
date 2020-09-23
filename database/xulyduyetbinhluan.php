<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id=getInput("id");
    //echo $id;
$STTDetail=$db->fetchCommentById("binhluansp","$id");
if ($STTDetail['status']==1) {
$sttupdate=$db->update("binhluansp",['status'=>'0'],["id"=>$id]);
header('location: ./../admin/DuyetBinhLuan.php');
}
else{
    $sttupdate=$db->update("binhluansp",['status'=>'1'],["id"=>$id]);
    header('location: ./../admin/DuyetBinhLuan.php');
}
   // $id=$db->fetchCommentByIdSP("binhluanSP","$row["id"])
// $xulybinhluan=


}