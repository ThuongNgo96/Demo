<?php
require_once __DIR__ . "./../ImportFile/importFile.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $firstDay = getInput("firstDay");
    $lastDay = getInput("lastDay");
    $formatFirstDay = new DateTime($firstDay);
    $formatLastDay = new DateTime($lastDay);
    $getFirstDay = $formatFirstDay->format('Y-m-d 00:00:00');
    $getLastDay = $formatLastDay->format('Y-m-d 23:59:59');
    // var_dump($firstDay,$lastDay)  ;
    echo $getFirstDay;
    echo $getLastDay;

    $sql = "SELECT * FROM donhang WHERE '$getFirstDay' < NgayDat and NgayDat < '$getLastDay' and MaTTDH = 3 ";
    $result = $db->fetchsql($sql);
    // echo($getFirstDay);
    var_dump($result);
}