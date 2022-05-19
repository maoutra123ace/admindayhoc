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
        <title>Fahasa Admin - Thêm sách</title>
        <meta name="description" content="Add blog posts | Nura Admin">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Your website">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn0.fahasa.com/media/favicon/default/favicon4.ico" />


        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- Font Awesome CSS -->
        <link href="assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />

        <!-- Custom CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- BEGIN CSS for this page -->
        <link rel="stylesheet" href="assets/plugins/trumbowyg/ui/trumbowyg.min.css">
        <!-- END CSS for this page -->

    </head>
    <?php
    $cateSql = "SELECT nameCategory FROM category";
    $cateResult = $mysqli->query($cateSql);
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

            <div class="content-page">

                <!-- Start content -->
                <div class="content">

                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Thêm sách</h1>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item">Trang chính</li>
                                        <li class="breadcrumb-item"><a href="blog.php">Sách</a></li>
                                        <li class="breadcrumb-item active">Thêm sách</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                <div class="card mb-3">

                                    <div class="card-body">

                                        <form action="uploadBook.php" method="post" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="form-group col-xl-9 col-md-8 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Tên sách</label>
                                                        <input class="form-control" name="title" type="text" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Mô tả</label>
                                                        <textarea rows="15" class="form-control" name="content"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Hình ảnh</label><br />
                                                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Thêm sách</button>
                                                    </div>
                                                </div>

                                                <div class="form-group col-xl-3 col-md-4 col-sm-12 border-left">
                                                    <div class="form-group">
                                                        <label>Tác giả</label>
                                                        <input type="text" class="form-control" name="tacGia" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Nhà xuất bản</label>
                                                        <input type="text" class="form-control" name="nhaXuatBan" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Giá</label>
                                                        <input type="text" class="form-control" name="price" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Giảm giá (nhập số từ 0-1) </label>
                                                        <input type="text" class="form-control" name="discount" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Số lượng</label>
                                                        <input type="text" class="form-control" name="soLuong" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Thể loại</label>
                                                        <select name="theLoai" class="form-control">
                                                            <option value="" selected disabled hidden> - select -</option>
                                                            <?php while ($row = mysqli_fetch_assoc($cateResult)) { ?>
                                                                <option value=<?= $row['nameCategory'] ?>><?= $row["nameCategory"] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Tình trạng</label>
                                                        <select name="tinhTrang" class="form-control" required>
                                                            <option value="" selected disabled hidden>- select -</option>
                                                            <option value="0">Mới</option>
                                                            <option value="1">Cũ</option>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div><!-- end row -->
                                        </form>

                                    </div>
                                    <!-- end card-body -->

                                </div>
                                <!-- end card -->

                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

                    </div>
                    <!-- END container-fluid -->

                </div>
                <!-- END content -->

            </div>
            <!-- END content-page -->

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

        </div>
        <!-- END main -->

        <!-- BEGIN Java Script for this page -->
        <script src="assets/plugins/trumbowyg/trumbowyg.min.js"></script>
        <script src="assets/plugins/trumbowyg/plugins/upload/trumbowyg.upload.js"></script>
        <script>
            $(document).on('ready', function() {
                'use strict';
                $('.editor').trumbowyg();
            });
        </script>
        <!-- END Java Script for this page -->

    </body>

    </html>
<?php
} else {
    include('LoginForm.php');
}
?>