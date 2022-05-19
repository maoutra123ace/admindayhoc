<?php
$target_dir = "./assets/img/bookImgs/";
$target_dir_admin = "C:/xampp/htdocs/PHP-Fahasa-master/assets/img/bookImgs/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$adminTargetfile = $target_dir_admin . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  // echo "Sorry, file already exists.";

  include("../connect.php");
  $idProduct = getIdProduct();

  $name = ($_POST["title"]);
  $content = ($_POST["content"]);
  $tacGia = ($_POST["tacGia"]);
  $nhaXuatBan = ($_POST["nhaXuatBan"]);
  $price = ($_POST["price"]);
  $theLoai = ($_POST["theLoai"]);
  $tinhTrang = ($_POST["tinhTrang"]);
  $discount = ($_POST['discount']);
  $soLuong = $_POST['soLuong'];
  $img = $target_file;

  settype($price, "int");
  settype($tinhTrang, "int");
  settype($discount, "double");
  settype($soLuong, "int");

  if (!$price || !$discount || !$soLuong) {
    exit("<h1>Upload thất bại, các giá trị giá, giảm giá, số lượng phải là số</h1>");
  }

  if ($discount < 0 || $discount > 1) {
    exit("<h1>Discount phải nằm trong khoảng 0-1</h1>");
  }

  $addSql = "INSERT INTO product (`IDProduct`, `nameProduct`, `moTa`, `author`, `publisher`,`price`,`discount`, `category`,`amount`,`old`,`img`) VALUES ('$idProduct', '$name', '$content', '$tacGia','$nhaXuatBan','$price','$discount','$theLoai','$soLuong','$tinhTrang','$img')";
  $resultAdd = $mysqli->query($addSql);

  if ($resultAdd) {
    exit("<h1 class='mt-4 text-center'>Upload thành công <a href='blog-add.php'>Tải lại trang</a></h1>");
  }
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Không thể upload do file có kích thước quá lớn.";
  $uploadOk = 0;
}

// Allow certain file formats
if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif"
) {
  echo "Chỉ được upload file dạng JPG, JPEG, PNG & GIF.";
  $uploadOk = 0;
}
// $adminTargetfile = '.' . $target_file;
// echo $target_file;
// echo $adminTargetfile;
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Có lỗi trong quá trình upload.";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    copy($target_file, $adminTargetfile);

    include("../connect.php");
    $idProduct = getIdProduct();

    $name = ($_POST["title"]);
    $content = ($_POST["content"]);
    $tacGia = ($_POST["tacGia"]);
    $nhaXuatBan = ($_POST["nhaXuatBan"]);
    $price = ($_POST["price"]);
    $theLoai = ($_POST["theLoai"]);
    $tinhTrang = ($_POST["tinhTrang"]);
    $discount = ($_POST['discount']);
    $soLuong = $_POST['soLuong'];

    settype($price, "int");
    settype($tinhTrang, "int");
    settype($discount, "double");
    settype($soLuong, "int");

    if (!$price || !$discount || !$soLuong) {
      exit("<h1>Upload thất bại, các giá trị giá, giảm giá, số lượng phải là số</h1>");
    }

    if ($discount < 0 || $discount > 1) {
      exit("<h1>Discount phải nằm trong khoảng 0-1</h1>");
    }

    $img = $target_file;

    $addSql = "INSERT INTO product (`IDProduct`, `nameProduct`, `moTa`, `author`, `publisher`,`price`,`discount`, `category`,`amount`,`old`,`img`) VALUES ('$idProduct', '$name', '$content', '$tacGia','$nhaXuatBan','$price','$discount','$theLoai','$soLuong','$tinhTrang','$img')";
    $resultAdd = $mysqli->query($addSql);

    if ($resultAdd) {
      echo "<h1 class='mt-4 text-center'>Upload thành công <a href='blog-add.php'>Tải lại trang</a></h1>";
    }
  } else {
    echo "Upload thất bại.";
  }
}

function getIdProduct()
{
  include("../connect.php");
  $sql = "SELECT IDProduct FROM product";
  $result = $mysqli->query($sql);
  // $index = 0;
  $preIndex = 0;
  $index = 1;
  $isInside = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    $index = $row['IDProduct'];
    if ($index - $preIndex > 1) {
      $isInside = 1;
      return $index - 1;
    } else {
      $preIndex++;
    }
  }
  if (!$isInside) {
    return ++$preIndex;
  }
}
