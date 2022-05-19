<?php
    session_start();
    include("connect.php");
    $id = $_GET["id"];
    $check = "Select * from tbl_lophoc where giaovien_id=$id";
    $ress =mysqli_query($con,$check);
    if($num = mysqli_num_rows($ress) > 0){
        $_SESSION["del_false"] = 1;
    }else{
    $sql="Delete From tbl_giaovien where giaovien_id=$id";
    $res = mysqli_query($con,$sql);
    }
    header("location:index.php?id=qlgv");
?>