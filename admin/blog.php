<?php
session_start();
include('../common.php');
include('../connect.php');
$isValid = false;
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE taikhoan='$username'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    if ($row['permission'] != 4) {
        $isValid = true;
    }
}
if ($isValid) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Fahasa Admin - Sách</title>
        <meta name="description" content="Blog posts | Nura Admin">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Your website">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn0.fahasa.com/media/favicon/default/favicon4.ico" />


        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- Font Awesome CSS -->
        <link href="assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- Custom CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <?php
    $cateSql = "SELECT nameCategory FROM category";
    $cateResult = $mysqli->query($cateSql);
    if (isset($_GET["updateBook"])) {
        // var_dump($_FILES['fileToUpload']);
        if (($_FILES['fileToUpload']['name'])) {
            // var_dump($_FILES['fileToUpload']);
            $target_dir = "./assets/img/bookImgs/";
            $target_dir_admin = "C:/xampp/htdocs/PHP-Fahasa-master/assets/img/bookImgs/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $adminTargetfile = $target_dir_admin . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                exit("File is not an image.");
                $uploadOk = 0;
            }
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
                $active = ($_POST["active"]);
                $discount = ($_POST['discount']);
                $soLuong = $_POST['soLuong'];
                $img = $target_file;

                $addSql = "INSERT INTO product (`IDProduct`, `nameProduct`, `moTa`, `author`, `publisher`,`price`,`discount`, `category`,`amount`,`old`,`active`,`img`) VALUES ('$idProduct', '$name', '$content', '$tacGia','$nhaXuatBan','$price','$discount','$theLoai','$soLuong','$tinhTrang','$active','$img')";
                $resultAdd = $mysqli->query($addSql);

                if ($resultAdd) {
                    exit("<h1 class='mt-4 text-center'>Upload thành công <a href='blog-add.php'>Tải lại trang</a></h1>");
                }
                $uploadOk = 0;
            }
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                exit("Sorry, your file is too large.");
                $uploadOk = 0;
            }

            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                exit("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                exit("Sorry, your file was not uploaded.");
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    copy($target_file, $adminTargetfile);
                }
            }
        }
        $bookName = ($_POST['bookName']);
        $isContained = $mysqli->query("SELECT * FROM product WHERE nameProduct='$bookName'");
        if (!($isContained->num_rows)) {
            $resultUpdate = false;
        } else {
            $bookPrice = $_POST['bookPrice'];
            $bookDiscount = $_POST['bookDiscount'];
            $bookStatus = $_POST['bookStatus'];
            $bookCate = $_POST['bookCate'];
            if ($_FILES['fileToUpload']['name']) {
                $updateSql = "UPDATE product SET price='$bookPrice',discount='$bookDiscount', old='$bookStatus', category='$bookCate',img='$target_file' WHERE nameProduct='$bookName'";
            } else {
                $updateSql = "UPDATE product SET price='$bookPrice',discount='$bookDiscount', old='$bookStatus', category='$bookCate' WHERE nameProduct='$bookName'";
            }
            $resultUpdate = $mysqli->query($updateSql);
        }
    }
    if (isset($_GET["deleteBook"])) {
        $bookName = ($_POST["deleteName"]);
        $isContained = $mysqli->query("SELECT * FROM product WHERE nameProduct='$bookName'");
        if (!($isContained->num_rows)) {
            $resultDelete = false;
        } else {
            $deleteSql = "DELETE FROM product WHERE nameProduct='$bookName'";
            $resultDelete = $mysqli->query($deleteSql);
        }
    }

    if (isset($_GET["importBook"])) {
        $bookName = ($_POST["deleteName"]);
        $soLuong = $_POST['importInput'];
        $moTa = $_POST['importStatus'];

        $selectIdProduct = $mysqli->query("SELECT IDProduct FROM product WHERE nameProduct='$bookName'");
        $product = $selectIdProduct->fetch_assoc();
        $idProduct = $product['IDProduct'];
        settype($idProduct, 'int');
        $importResult = $mysqli->query("UPDATE product SET amount=amount+$soLuong WHERE nameProduct='$bookName'");

        $importDate = date("Y/m/d");

        if ($importResult) {
            $sqlSetHistory = "INSERT INTO lichsunhaphang (taikhoan,idProduct,soLuong,moTa,thoigiannhaphang) VALUES('$username',$idProduct,$soLuong,'$moTa','$importDate')";
            $resultSetHistory = $mysqli->query($sqlSetHistory);
        }
    }

    ?>

    <body class="adminbody">

        <div id="main">

            <!-- top bar navigation -->
            <?php include('assets/TopComponent/header.php') ?>

            <!-- End Navigation -->

            <!-- Left Sidebar -->
            <div class="left main-sidebar">

                <div class="sidebar-inner leftscroll">

                    <div id="sidebar-menu">

                        <ul>
                            <?php
                            include('assets/LeftComponent/LeftComponent.php');
                            ?>

                        </ul>

                        <div class="clearfix"></div>

                    </div>

                    <div class="clearfix"></div>

                </div>

            </div>
            <!-- End Sidebar -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="blog.php?updateBook" method="post" class="form-group" enctype="multipart/form-data">
                            <div class="modal-header ">
                                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <label>Tên sách</label>
                                    <input class="form-control" name="bookName" id="bookName" type="text" value="" readonly="readonly" style="color: #787878;">
                                </div>
                                <div>
                                    <label>Giá sách</label>
                                    <input class="form-control" name="bookPrice" id="bookPrice" type="text" value="">
                                </div>
                                <div>
                                    <label>Giảm giá</label>
                                    <input class="form-control" name="bookDiscount" id="bookDiscount" type="text" value="">
                                </div>
                                <div>
                                    <label>Tình trạng sách</label>
                                    <select class="form-control" name="bookStatus" id="bookStatus" class="form-control">
                                        <option value="" selected disabled hidden> --</option>
                                        <option value="0">Mới</option>
                                        <option value="1">Cũ</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <style>
                                            .select2-search--dropdown {
                                                display: none;
                                            }
                                        </style>
                                        <label>Thể loại</label>
                                        <select class="form-control" name="bookCate" id="bookCate" class="form-control">
                                            <option value="" selected disabled hidden> --</option>
                                            <?php while ($row = mysqli_fetch_assoc($cateResult)) { ?>
                                                <option value=<?= $row['nameCategory'] ?>><?= $row["nameCategory"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="fileToUpload">Hình ảnh</label>
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                    </div>
                                    <!-- <input name="bookCate" id="bookCate" type="text" value=""> -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_delete_book" aria-hidden="true" id="modal_delete_book">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="blog.php?deleteBook" method="post" enctype="multipart/form-data">

                            <div class="modal-header">
                                <h5 class="modal-title">Xóa sách</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Tên sách</label>
                                            <input class="form-control modalInput" name="deleteName" type="text" required readonly="readonly" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Bạn có chắc muốn xóa sách này</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_import_book" aria-hidden="true" id="modal_import_book">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="blog.php?importBook" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title">Nhập thêm sách</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Tên sách</label>
                                            <input class="form-control modalInputImport" name="deleteName" type="text" required readonly="readonly" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nhập thêm</label>
                                            <input class="form-control" type="number" name="importInput" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <input class="form-control" type="text" name="importStatus" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-page">

                <!-- Start content -->
                <div class="content">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Danh sách sách</h1>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item">Home</li>
                                        <li class="breadcrumb-item active">Danh sách sách</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                <div class="card mb-3">

                                    <div class="card-header">
                                        <span class="pull-right"><a href="blog-add.php" class="btn btn-primary btn-sm"><i class="fas fa-plus" aria-hidden="true"></i> Thêm sách</a></span>
                                        <h3><i class="far fa-file-alt"></i> Danh sách sách</h3>
                                    </div>
                                    <!-- end card-header -->
                                    <?php
                                    if (isset($_GET['updateBook'])) {
                                        if ($resultUpdate) {
                                            echo "<h1 class='mt-4 text-center'>Cập nhật thành công <a href='blog.php'>Tải lại trang</a></h1>";
                                        } else {
                                            echo "<h1 class='mt-4 text-center text-danger'>Cập nhật thất bại <a href='blog.php'>Tải lại trang</a></h1>";
                                        }
                                    }
                                    ?>
                                    <?php
                                    if (isset($_GET["deleteBook"])) {
                                        if ($resultDelete) {
                                            echo "<h1 class='mt-4 text-center'>Xóa thành công <a href='blog.php'>Tải lại trang</a></h1>  ";
                                            // var_dump($isContained);
                                        } else {
                                            echo "<h1 class='mt-4 text-center text-danger'>Xóa thất bại <a href='blog.php'>Tải lại trang</a></h1> ";
                                            // var_dump($isContained);
                                        }
                                    }
                                    ?>
                                    <?php
                                    if (isset($_GET["importBook"])) {
                                        if ($importResult) {
                                            echo "<h1 class='mt-4 text-center'>Nhập hàng thành công <a href='blog.php'>Tải lại trang</a></h1>  ";
                                            // var_dump($isContained);
                                        } else {
                                            echo "<h1 class='mt-4 text-center text-danger'>Nhập hàng thất bại <a href='blog.php'>Tải lại trang</a></h1> ";
                                            // var_dump($isContained);
                                        }
                                    }
                                    ?>
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="min-width: 300px">Thông tin cơ bản</th>
                                                        <th style="width:110px">Số lượng</th>
                                                        <th style="min-width:110px">Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM product";
                                                    $result = $mysqli->query($sql);
                                                    ?>
                                                    <?php
                                                    $count = 0;
                                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>
                                                            <form action="blog.php" action="post">
                                                                <td>
                                                                    <div class="blog_list">
                                                                        <img class="img-fluid d-none d-lg-block" style="cursor:pointer" alt="image" src="<?= $row['img'] ?>" />
                                                                    </div>
                                                                    <h4 class="bookName"><?= $row['nameProduct'] ?></h4>
                                                                    <!-- <p>Được thêm bởi <b><?php echo ($_SESSION['username']) ?></b> <?php echo date("i:h:sa") . " " . date("Y/m/d") ?></p> -->
                                                                    <div class="mt-1">
                                                                        Giá gốc: <span class="bookPrice"><?= $row['price'] ?></span>
                                                                    </div>
                                                                    <div class="mt-1">
                                                                        Giảm giá: <span class="bookDiscount"><?= $row['discount'] ?></span>
                                                                    </div>
                                                                    <div class="mt-1">
                                                                        Thể loại: <span class="bookCate"><?= $row['category'] ?></span>
                                                                    </div>
                                                                    <div class="mt-1">
                                                                        Tình trạng: <span class="bookStatus"><?= $row['old'] ?></div>
                                                                </td>
                                                                <td>
                                                                    <div>Tổng số: <?= $row['amount'] ?></div>
                                                                    <div>Đã bán: <?= $row['amountSell'] ?></div>
                                                                    <div class="border-top mt-5 pt-1">Còn lại: <?= $row['amount'] - $row['amountSell'] ?></div>
                                                                </td>

                                                                <td>
                                                                    <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal" onclick="editBook(<?= $count ?>)"><i class="far fa-edit"></i> Chỉnh sửa</button>
                                                                    <button type="button" class="btn btn-danger btn-sm  btn-block" data-toggle="modal" data-target="#modal_delete_book" onclick="deleteBook(<?= $count ?>)">
                                                                        <i class="fas fa-trash"></i> Xóa</button>
                                                                    <button type="button" class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#modal_import_book" onclick="importBook(<?= $count ?>)"> <i class="fas fa-trash"></i>Nhập hàng</button>
                                                                </td>
                                                            </form>
                                                        </tr>
                                                    <?php
                                                        $count++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <span class="text-right">
                    Copyright <a target="_blank" href="#">Your Company</a>
                </span>
                <span class="float-right">
                    <!-- Copyright footer link MUST remain intact if you download free version. -->
                    <!-- You can delete the links only if you purchased the pro or extended version. -->
                    <!-- Purchase the pro or extended version with PHP version of this template: https://bootstrap24.com/template/nura-admin-4-free-bootstrap-admin-template -->
                    Powered by <a target="_blank" href="https://bootstrap24.com" title="Download free Bootstrap templates"><b>Bootstrap24.com</b></a>
                </span>
            </footer>

            <script src="assets/js/modernizr.min.js"></script>
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/moment.min.js"></script>

            <script src="assets/js/popper.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>

            <script src="assets/js/detect.js"></script>
            <script src="assets/js/fastclick.js"></script>
            <script src="assets/js/jquery.blockUI.js"></script>
            <script src="assets/js/jquery.nicescroll.js"></script>

            <!-- App js -->
            <script src="assets/js/admin.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $('select').select2({
                    createTag: function(params) {
                        // Don't offset to create a tag if there is no @ symbol
                        if (params.term.indexOf('@') === -1) {
                            // Return null to disable tag creation
                            return null;
                        }

                        return {
                            id: params.term,
                            text: params.term
                        }
                    }
                });
            </script>
            <script>
                function editBook(index) {
                    // event.target.classList.add("d-none");
                    let bookName = document.getElementsByClassName("bookName");
                    let bookPrice = document.getElementsByClassName("bookPrice");
                    let bookDiscount = document.getElementsByClassName("bookDiscount");
                    let bookStatus = document.getElementsByClassName("bookStatus");
                    let bookCate = document.getElementsByClassName("bookCate");
                    let submitBtn = document.getElementsByClassName("submitBtn");
                    let modal = document.getElementById("exampleModal");

                    document.getElementById("bookName").value = bookName[index].innerText;
                    document.getElementById("bookPrice").value = bookPrice[index].innerText;
                    document.getElementById("bookDiscount").value = bookDiscount[index].innerText;
                    document.getElementById("bookStatus").value = bookStatus[index].innerText;
                    document.getElementById("bookCate").value = bookCate[index].innerText;

                    submitBtn[index].classList.remove("d-none");
                    submitBtn[index].classList.add("d-block");

                }

                function deleteBook(index) {
                    let modalInput = document.getElementsByClassName("modalInput");
                    let arrBookName = document.getElementsByClassName("bookName");
                    // console.log(arrTaiKhoan);
                    modalInput[0].value = arrBookName[index].innerText;
                }

                function importBook(index) {
                    let modalInput = document.getElementsByClassName("modalInputImport");
                    let arrBookName = document.getElementsByClassName("bookName");
                    // console.log(arrTaiKhoan);
                    modalInput[0].value = arrBookName[index].innerText;
                }
            </script>

        </div>
        <!-- END main -->

    </body>

    </html>

<?php
} else {
    include('LoginForm.php');
}
?>