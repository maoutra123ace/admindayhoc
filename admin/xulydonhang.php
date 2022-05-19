<?php
include('../connect.php');
$idDH = $_POST['idDH'];
// var_dump($idDH);
$sql = "UPDATE donhang SET trangthai=1 WHERE maDonHang=$idDH";
$result = $mysqli->query($sql);
