<?php
include('../common.php');
include('../connect.php');

$maDH = ($_GET['id']);
$sqlDH = "SELECT * FROM donhang WHERE maDonHang=$maDH";
$resmadh = $mysqli->query($sqlDH);
$donHang = $resmadh->fetch_assoc();


?>
<?php
session_start();
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
        <title>Fahasa Admin - Chi tiết đơn hàng</title>
        <meta name="description" content="Dashboard | Nura Admin">
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
        <link rel="stylesheet" type="text/css" href="assets/plugins/chart.js/Chart.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/plugins/datatables/datatables.min.css" />
        <!-- END CSS for this page -->

    </head>

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
                                    <h1 class="main-title float-left">Tình hình chung</h1>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item">Trang chủ</li>
                                        <li class="breadcrumb-item active">Tình hình chung</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                        <!-- end row -->

                        <?php
                        $sqlCountAcc = "SELECT * FROM user";
                        $resultCountAcc = $mysqli->query($sqlCountAcc);
                        $counterAccount = 0;
                        while ($row = $resultCountAcc->fetch_assoc()) {
                            $counterAccount++;
                        }

                        $sqlCountDH = "SELECT * FROM donhang";
                        $resultCountDH = $mysqli->query($sqlCountDH);
                        $counterDH = 0;
                        while ($row = $resultCountDH->fetch_assoc()) {
                            $counterDH++;
                        }
                        ?>

                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-danger pb-5">
                                    <i class="far fa-user float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Tài khoản</h6>
                                    <h1 class="m-b-20 text-white counter"><?= $counterAccount ?></h1>
                                    <!-- <span class="text-white">12 Today</span> -->
                                </div>
                            </div>

                            <!-- <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-purple">
                                    <i class="fas fa-download float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Downloads</h6>
                                    <h1 class="m-b-20 text-white counter">290</h1>
                                    <span class="text-white">12 Today</span>
                                </div>
                            </div> -->

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-warning pb-5">
                                    <i class="fas fa-shopping-cart float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Đơn hàng</h6>
                                    <h1 class="m-b-20 text-white counter"><?= $counterDH ?></h1>
                                    <!-- <span class="text-white">25 Today</span> -->
                                </div>
                            </div>


                        </div>
                        <!-- end row -->

                        <?php
                        // var_dump($index);
                        $arrCTDH = array();
                        $indexCTDH = 0;
                        ?>
                        <style>
                            .table td {
                                border: none;

                            }
                        </style>
                        <div class="row">
                            <div class="col-1"></div>
                            <table class="table col-10">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Tên SP</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Thời điểm đặt hàng</th>
                                        <th scope="col">Tài khoản đặt mua</th>
                                        <th scope="col">Tên người mua</th>
                                        <th scope="col">Thông tin liên hệ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sqlmactdh = "SELECT maCTDH,gia,img,nameProduct,soluong FROM chitietdonhang WHERE maDonHang='$maDH'";
                                    $resmactdh = $mysqli->query($sqlmactdh);

                                    $sqltongtien = "SELECT thanhtien,thoidiemdathang,ten,email,taikhoan,sodienthoai,diachi FROM donhang WHERE maDonHang='$maDH'";
                                    $restongtien = $mysqli->query($sqltongtien);
                                    $rowTongTien = $restongtien->fetch_assoc();

                                    ?>
                                    <?php
                                    $isRender = false;
                                    $i = 0;
                                    while ($row = $resmactdh->fetch_assoc()) {
                                        // echo ($row['maDonHang']);
                                        // array_push($arrMaDH, $row['maDonHang']);
                                        // $arrCTDH[$index] = (int)($row['maDonHang']);
                                        // $index++;
                                        $arrCTDH[$indexCTDH] = $row['maCTDH'];
                                        $indexCTDH++;
                                    ?>
                                        <a href="#">
                                            <tr>
                                                <td><?php if (!$isRender) {
                                                        echo $i + 1;
                                                        $isRender = "true";
                                                    } ?></td>
                                                <td>
                                                    <img src=<?= $row['img'] ?> style="max-width:100px" alt="">
                                                </td>
                                                <td>
                                                    <?= $row['nameProduct'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['soluong'] ?>
                                                </td>
                                                <td>
                                                    <?= $rowTongTien['thoidiemdathang'] ?>
                                                </td>
                                                <td>
                                                    <?= $rowTongTien['taikhoan'] ?>
                                                </td>
                                                <td>
                                                    <?= $rowTongTien['ten'] ?>
                                                </td>
                                                <td>
                                                    <label>Số điện thoại: </label><?= $rowTongTien['sodienthoai'] ?><br>
                                                    <label>Địa chỉ: </label><?= $rowTongTien['diachi'] ?><br>
                                                    <label>Email: </label><?= $rowTongTien['email'] ?>
                                                </td>
                                            </tr>
                                        </a>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td>
                                        </td>
                                        <td class="text-right pt-0 pb-3" style="font-weight:bold">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td class="text-right pt-0 pb-3" style="font-weight:bold">
                                            Tổng tiền:
                                        </td>
                                        <td class="pt-0 pb-3" style="font-weight:bold">
                                            <?= number_format($rowTongTien['thanhtien'], 0, ',', '.') ?> đ
                                        </td>
                                    </tr>
                                    <?php
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        ?>
                        <!-- end row-->

                    </div>
                    <!-- END container-fluid -->

                </div>
                <!-- END content -->

            </div>
            <!-- END content-page -->

            <footer class="footer">
                <span class="text-right">
                    Copyright <a target="_blank" href="#">Company</a>
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


    </body>

    </html>
<?php
} else {
    include('LoginForm.php');
}
?>