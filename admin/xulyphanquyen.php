<?php
include('../common.php');
include('../connect.php');

$data = $_POST['filterData'];
$maQuyen = $data['maQuyen'];
$maChucNang = $data['maChucNang'];

$sqlCheckFill = "SELECT * FROM chitietphanquyen WHERE idPermission=$maQuyen AND maChucNang=$maChucNang";

// var_dump(($mysqli->query($sqlCheckFill)->num_rows));

if (($mysqli->query($sqlCheckFill)->num_rows)) {
    $sql = "DELETE FROM chitietphanquyen WHERE maChucNang=$maChucNang and idPermission=$maQuyen";
    // echo $sql;
} else {
    $sql = "INSERT INTO chitietphanquyen(`idPermission`,`maChucNang`) VALUES ($maQuyen,$maChucNang)";
    // echo $sql;
}
$result = $mysqli->query($sql);
echo $result;
// $sql = "UPDATE chitietphanquyen ";
// var_dump($data);
