

<?php
     //themchuyenmon
  if(isset($_REQUEST["addnewcm"])){
    $category_name = $_REQUEST["category_name"];
    include("connect.php");
    $sql ="INSERT INTO `tbl_category` (`category_name`) VALUES ('$category_name')";
    $res = mysqli_query($con,$sql);
    header("location:index.php?id=qlcm");
  }
?>

<?php
     //suachuyenmon
  if(isset($_REQUEST["editnewcm"])){
    $id = $_REQUEST["editnewcm"];
    $category_name = $_REQUEST["category_name"];
    include("connect.php");
    $sql ="UPDATE `tbl_category` SET `category_name`= '$category_name' WHERE `category_id`=$id";
    $res = mysqli_query($con,$sql);
    header("location:index.php?id=qlcm");
  }
?>

<?php
     //themgiaovien
  if(isset($_REQUEST["addnewgv"])){
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $pwd =  md5($_REQUEST["pwd"]);
    $phone = $_REQUEST["phone"];
    $address = $_REQUEST["address"];
    $category = $_REQUEST["category"];
    include("connect.php");
    $sql ="INSERT INTO `tbl_giaovien`(`name`, `phone`, `address`, `category_id`, `email`, `password`) VALUES ('$name','$phone','$address',$category,'$email','$pwd')";
    $res = mysqli_query($con,$sql);
    header("location:index.php?id=qlgv");
  }
?>
<?php
     //suagiaovien
  if(isset($_REQUEST["editnewgv"])){
    $id = $_REQUEST["editnewgv"];
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];
    $address = $_REQUEST["address"];
    $category = $_REQUEST["category"];
    include("connect.php");
    $sql ="UPDATE `tbl_giaovien` SET `name`='$name',`phone`='$phone',`address`='$address',`category_id`=$category,`email`='$email' WHERE  `giaovien_id`='$id'";
    $res = mysqli_query($con,$sql);
    header("location:index.php?id=qlgv");
  }
?>
<?php 
    //themhocsinh
  if(isset($_REQUEST["addnewhs"])){
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $pwd =  md5($_REQUEST["pwd"]);
    $phone = $_REQUEST["phone"];
    $address = $_REQUEST["address"];
    $class = $_REQUEST["class"];
    include("connect.php");
    $sql ="INSERT INTO `tbl_hocsinh`(`name`, `phone`, `address`, `class`, `email`, `password`) VALUES ('$name','$phone','$address',$class,'$email','$pwd')";
    $res = mysqli_query($con,$sql);
    header("location:index.php?id=qlhs");
  }
?>

<?php
     //suahocsinh
  if(isset($_REQUEST["editnewhs"])){
    $id = $_REQUEST["editnewhs"];
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];
    $address = $_REQUEST["address"];
    $class = $_REQUEST["class"];
    include("connect.php");
    $sql= "UPDATE `tbl_hocsinh` SET `name`='$name',`phone`='$phone',`address`='$address',`class`='$class',`email`='$email',`password`='$password' WHERE `hocsinh_id`='$id'";
    $res = mysqli_query($con,$sql);
   header("location:index.php?id=qlhs");
  }
?>
<?php
     //themlop
  if(isset($_REQUEST["addnewlop"])){
    $name = $_REQUEST["name"];
    $price = $_REQUEST["price"];
    $teacher = $_REQUEST["teacher"];
    $category = $_REQUEST["category"];
    $target_dir = "assets/images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $img = $_FILES["image"]["name"];
    include("connect.php");
    $sql ="INSERT INTO `tbl_lophoc`(`category_id`, `giaovien_id`, `tenlophoc`, `lophoc_giaca`, `lophoc_hinhanh`) VALUES ('$category','$teacher','$name','$price','$img')";
    $res = mysqli_query($con,$sql);
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
      echo $_FILES["image"]["tmp_name"];
    }else{
      echo "thatbai";
    }
    header("location:index.php?id=qllop");
  }
?>

<?php
     //sualop
  if(isset($_REQUEST["editnewlop"])){
    $id = $_REQUEST["editnewlop"];
    $name = $_REQUEST["name"];
    $price = $_REQUEST["price"];
    $teacher = $_REQUEST["teacher"];
    $category = $_REQUEST["category"];
    $target_dir = "assets/images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $img = $_FILES["image"]["name"];
    include("connect.php");
    $sql= "UPDATE `tbl_lophoc` SET `category_id`='$category',`giaovien_id`='$teacher',`tenlophoc`='$name',`lophoc_giaca`='$price',`lophoc_hinhanh`='$img' WHERE `lophoc_id`=$id";
    $res = mysqli_query($con,$sql);
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
      echo $_FILES["image"]["tmp_name"];
    }else{
      echo "thatbai";
    }
    header("location:index.php?id=qllop");
  }
?>

<?php
    //locgv
    if(isset($_REQUEST["change"])){
    $change = $_REQUEST["change"];
    include("connect.php");
    $sql ="SELECT * FROM `tbl_giaovien` WHERE `category_id`=$change";
    $res = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($res)){
        echo "<option value='".$row["giaovien_id"]."'>".$row["name"]."</option>";
    }
    }
?>


<?php
    //lochs
    if(isset($_REQUEST["changehd"])){
    $changehd = $_REQUEST["changehd"];
    include("connect.php");
    $sql ="SELECT * FROM `tbl_giaovien` WHERE `giaodich_id`=$change";
    $res = mysqli_query($con,$sql);

    while($row = mysqli_fetch_assoc($res)){
        echo "<option value='".$row["hocsinh_id"]."'>".$row["name"]."</option>";
    }
    }
?>


<?php 
    //themdk
  if(isset($_REQUEST["addnewdk"])){
    $class = $_REQUEST["class"];
    $namegd = $_REQUEST["namegd"];
    $price = $_REQUEST["price"];
    $date = $_REQUEST["date"];
    $name = $_REQUEST["name"];
    $category = $_REQUEST["category"];
    include("connect.php");
    $sql ="INSERT INTO `tbl_giaodich` (`lophoc_id`,`tengiaodich`, `giagiaodich`, `ngaythang`, `hocsinh_id`, `tinhtrangdon`) VALUES ('$class','$namegd','$price','$date',$name,'$category')";
    $res = mysqli_query($con,$sql);
  header("location:index.php?id=qldk");
  }
?>




<?php
     //suadk
     if(isset($_REQUEST["editnewdk"])){
       $id = $_REQUEST["editnewdk"];
       $class = $_REQUEST["class"];
       $namegd = $_REQUEST["namegd"];
       $price = $_REQUEST["price"];
       $date = $_REQUEST["date"];
       $name = $_REQUEST["name"];
       $category = $_REQUEST["category"];
      include("connect.php");
    $sql= "UPDATE `tbl_giaodich` SET `lophoc_id`='$class',`tengiaodich`='$namegd', `giagiaodich`='$price',`ngaythang`='$date',`hocsinh_id`='$name', `tinhtrangdon`='$category' WHERE `giaodich_id`='$id'";
   $res = mysqli_query($con,$sql);
   header("location:index.php?id=qldk");
  }
?>

<?php 
    //themhd
  if(isset($_REQUEST["addnewhd"])){
    $namegd = $_REQUEST["namegd"];
    $credit = $_REQUEST["credit"];
    $date = $_REQUEST["date"];
    $category = $_REQUEST["category"];
    include("connect.php");
    $sql ="INSERT INTO `tbl_donhang`( `giaodich_id`, `ngaythang`, `mahoadon`, `tinhtrangdon`) VALUES ('$namegd','$date','$credit','$category')";
    $res = mysqli_query($con,$sql);
  header("location:index.php?id=qlhd");
  }
?>

<?php
     //suahd
     if(isset($_REQUEST["editnewhd"])){
       $id = $_REQUEST["editnewhd"];
       $namegd = $_REQUEST["namegd"];
      $credit = $_REQUEST["credit"];
      $date = $_REQUEST["date"];
      $category = $_REQUEST["category"];
      include("connect.php");
    $sql= "UPDATE `tbl_donhang` SET `giaodich_id`='$namegd',`ngaythang`='$date',`mahoadon`='$credit',`tinhtrangdon`='$category' WHERE `donhang_id`=$id";
   $res = mysqli_query($con,$sql);
   header("location:index.php?id=qlhd");
  }
?>