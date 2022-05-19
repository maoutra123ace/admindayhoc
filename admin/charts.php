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
        <title>Fahasa Admin - Thống kê</title>
        <meta name="description" content="Charts | Nura Admin">
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

        <!-- END CSS for this page -->

        <style>
            #column-example-14 {
                padding-top: 50px;
                height: 640.6px;
                max-width: 500px;
                margin: 0 auto;
            }

            #column-example-3 {
                height: 700px;
                max-width: 700px;
                margin: 0 auto;
            }

            .headerbar-left a {
                font-size: 2rem !important;
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            }

            .submenu span {
                font-size: 1.5rem !important;
            }

            label {
                margin-left: 20px;
            }

            .table td {
                border: none !important;
            }

            form input:hover {
                cursor: pointer !important;
            }

            #datePre:hover,
            #dateAft:hover {
                cursor: pointer;
            }
        </style>
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
                                    <h1 class="main-title float-left">Thống kê</h1>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item">Trang chủ</li>
                                        <li class="breadcrumb-item active">Thống kê</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card mb-3">
                                    <table id="column-example-3" class="charts-css column show-labels show-primary-axis datasets-spacing-1">
                                        <caption> Column Example #14 </caption>
                                        <h3 class="text-center mt-4">Thống kê số đơn hàng được đặt qua từng tháng(2021)
                                            <?php
                                            $arrdonhangmoithang = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                                            $sqltkdh = "SELECT thoidiemdathang FROM donhang";
                                            $resulttkdh = $mysqli->query($sqltkdh);
                                            // var_dump($resulttkdh);
                                            while ($rowtkdh = $resulttkdh->fetch_assoc()) {
                                                $datetime = new DateTime($rowtkdh['thoidiemdathang']);
                                                // echo "asd";
                                                $month = $datetime->format('m');
                                                settype($month, 'int');
                                                switch ($month) {
                                                    case 1: {
                                                            $arrdonhangmoithang[0]++;
                                                            break;
                                                        }
                                                    case 2: {
                                                            $arrdonhangmoithang[1]++;
                                                            break;
                                                        }
                                                    case 3: {
                                                            $arrdonhangmoithang[2]++;
                                                            break;
                                                        }
                                                    case 4: {
                                                            $arrdonhangmoithang[3]++;
                                                            break;
                                                        }
                                                    case 5: {
                                                            $arrdonhangmoithang[4]++;
                                                            break;
                                                        }
                                                    case 6: {
                                                            $arrdonhangmoithang[5]++;
                                                            break;
                                                        }
                                                    case 7: {
                                                            $arrdonhangmoithang[6]++;
                                                            break;
                                                        }
                                                    case 8: {
                                                            $arrdonhangmoithang[7]++;
                                                            break;
                                                        }
                                                    case 9: {
                                                            $arrdonhangmoithang[8]++;
                                                            break;
                                                        }
                                                    case 10: {
                                                            $arrdonhangmoithang[9]++;
                                                            break;
                                                        }
                                                    case 11: {
                                                            $arrdonhangmoithang[10]++;
                                                            break;
                                                        }
                                                    case 12: {
                                                            $arrdonhangmoithang[11]++;
                                                            break;
                                                        }
                                                }
                                            }
                                            ?>
                                        </h3>
                                        <thead>
                                            <tr>
                                                <th scope="col"> Month </th>
                                                <th scope="col"> Progress </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"> 1 </th>
                                                <td style="--size:<?= $arrdonhangmoithang[0] / 10 ?>;"><?php if ($arrdonhangmoithang[0]) echo $arrdonhangmoithang[0] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> 2 </th>
                                                <td style="--size:<?= $arrdonhangmoithang[1] / 10 ?>;;"><?php if ($arrdonhangmoithang[1]) echo $arrdonhangmoithang[1] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> 3 </th>
                                                <td style="--size:<?= $arrdonhangmoithang[2] / 10 ?>;;"><?php if ($arrdonhangmoithang[2]) echo $arrdonhangmoithang[2] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> 4 </th>
                                                <td style="--size:<?= $arrdonhangmoithang[3] / 10 ?>;;"><?php if ($arrdonhangmoithang[3]) echo $arrdonhangmoithang[3] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> 5 </th>
                                                <td style="--size:<?= $arrdonhangmoithang[4] / 10 ?>;;"><?php if ($arrdonhangmoithang[4]) echo $arrdonhangmoithang[4] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> 6 </th>
                                                <td style="--size:<?= $arrdonhangmoithang[5] / 10 ?>;;"><?php if ($arrdonhangmoithang[5]) echo $arrdonhangmoithang[5] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> 7 </th>
                                                <td style="--size:<?= $arrdonhangmoithang[6] / 10 ?>;;"><?php if ($arrdonhangmoithang[6]) echo $arrdonhangmoithang[6] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> 8 </th>
                                                <td style="--size:<?= $arrdonhangmoithang[7] / 10 ?>;;"><?php if ($arrdonhangmoithang[7]) echo $arrdonhangmoithang[7] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> 9 </th>
                                                <td style="--size:<?= $arrdonhangmoithang[8] / 10 ?>;;"><?php if ($arrdonhangmoithang[8]) echo $arrdonhangmoithang[8] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> 10 </th>
                                                <td style="--size:<?= $arrdonhangmoithang[9] / 10 ?>;;"><?php if ($arrdonhangmoithang[9]) echo $arrdonhangmoithang[9] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> 11 </th>
                                                <td style="--size:<?= $arrdonhangmoithang[10] / 10 ?>;;"><?php if ($arrdonhangmoithang[10]) echo $arrdonhangmoithang[10] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> 12 </th>
                                                <td style="--size:<?= $arrdonhangmoithang[11] / 10 ?>;;"><?php if ($arrdonhangmoithang[11]) echo $arrdonhangmoithang[11] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card mb-3">
                                    <table id="column-example-14" class="charts-css column show-labels show-primary-axis ">
                                        <caption> Column Example #14 </caption>
                                        <h3 class="text-center mt-4">Top sản phẩm được mua nhiều nhất trong khoảng thời gian</h3>
                                        <form action="charts.php?filter" method="POST">
                                            <div class="row">
                                                <div class="col-1"></div>
                                                <div class="col-4">
                                                    <label>Từ ngày: </label>
                                                    <div id="datePre" class="input-group date" data-date-format="dd-mm-yyyy">
                                                        <input id="datePreInput" name="datePreInput" class="form-control" type="text" readonly />
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <label>Đến ngày: </label>
                                                    <div id="dateAft" class="input-group date" data-date-format="dd-mm-yyyy">
                                                        <input id="dateAftInput" name="dateAftInput" class="form-control" type="text" readonly />
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-primary" style="margin-top:24.5px;" type="submit">Chọn</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset($_GET['filter'])) {
                                            $dateLeft = ($_POST['datePreInput']);
                                            $dateRight = ($_POST['dateAftInput']);
                                            $dayLeft = substr($dateLeft, 0, 2);
                                            $monthLeft = substr($dateLeft, 3, 2);
                                            $yearLeft = substr($dateLeft, 6, 4);
                                            $stringDateLeft = $dayLeft . '-' . $monthLeft . '-' . $yearLeft;
                                            $dateLeft = date('Y-m-d', strtotime($stringDateLeft));

                                            $dayRight = substr($dateRight, 0, 2);
                                            $monthRight = substr($dateRight, 3, 2);
                                            $yearRight = substr($dateRight, 6, 4);
                                            $stringDateRight = $dayRight . '-' . $monthRight . '-' . $yearRight;
                                            $dateRight = date('Y-m-d', strtotime($stringDateRight));

                                            // var_dump($dateLeft . ' ' . $dateRight);
                                            if ($dateLeft > $dateRight) {
                                                exit("<h3 class='text-center'>Vui lòng chọn ngày hợp lệ <a href='charts.php'>Chọn lại</a></h3>");
                                            }
                                        }
                                        if (isset($_GET['filter'])) {
                                            $sqlmadh = "SELECT maDonHang,thoidiemdathang FROM donhang";
                                            $resmadh = $mysqli->query($sqlmadh);
                                            $arrMaDH = array();
                                            $index = 0;
                                            $dateLeft = ($_POST['datePreInput']);
                                            $dateRight = ($_POST['dateAftInput']);
                                            $dayLeft = substr($dateLeft, 0, 2);
                                            $monthLeft = substr($dateLeft, 3, 2);
                                            $yearLeft = substr($dateLeft, 6, 4);
                                            $stringDateLeft = $dayLeft . '-' . $monthLeft . '-' . $yearLeft;
                                            $dateLeft = date('Y-m-d', strtotime($stringDateLeft));

                                            $dayRight = substr($dateRight, 0, 2);
                                            $monthRight = substr($dateRight, 3, 2);
                                            $yearRight = substr($dateRight, 6, 4);
                                            $stringDateRight = $dayRight . '-' . $monthRight . '-' . $yearRight;
                                            $dateRight = date('Y-m-d', strtotime($stringDateRight));
                                            while ($row = $resmadh->fetch_assoc()) {
                                                $datetime = new DateTime($row['thoidiemdathang']);
                                                $date = $datetime->format('Y-m-d');
                                                if ($dateLeft <= $date && $date <= $dateRight) {
                                                    $arrMaDH[$index] = (int)($row['maDonHang']);
                                                    $index++;
                                                }
                                            }
                                            if (!$arrMaDH) {
                                                exit("<h3 class='text-center'>Không có sản phẩm trong thời gian đã chọn <a href='charts.php'>Chọn lại</a></h3>");
                                            }

                                            // var_dump($arrMaDH);
                                            $gioHang = array();
                                            $arrCTDH = array();
                                            $indexCTDH = 0;

                                            for ($i = 0; $i < $index; $i++) {
                                                // echo $arrMaDH[$i];
                                                $maDH = $arrMaDH[$i];
                                                $sqlmactdh = "SELECT maCTDH,soluong,IDProduct,nameProduct FROM chitietdonhang WHERE maDonHang='$maDH'";
                                                $resmactdh = $mysqli->query($sqlmactdh);
                                                while ($rowctdh = $resmactdh->fetch_assoc()) {
                                                    $idProduct = $rowctdh['IDProduct'];
                                                    $soLuong = $rowctdh['soluong'];
                                                    $nameProduct = $rowctdh['nameProduct'];
                                                    $isInArr = false;
                                                    for ($k = 0; $k < count($gioHang); $k++) {
                                                        if ($idProduct == $gioHang[$k]['idProduct']) {
                                                            $isInArr = true;
                                                            $gioHang[$k]['soluong'] += $soLuong;
                                                        }
                                                    }
                                                    if (!$isInArr) {
                                                        array_push($gioHang, [
                                                            'idProduct' => $idProduct,
                                                            'soluong' => $soLuong,
                                                            'nameProduct' => $nameProduct,
                                                        ]);
                                                    }
                                                }
                                            }

                                            $first = [
                                                'idProduct' => 0,
                                                'soluong' => 0,
                                                'nameProduct' => '',
                                            ];
                                            $second = [
                                                'idProduct' => 0,
                                                'soluong' => 0,
                                                'nameProduct' => '',

                                            ];
                                            $third = [
                                                'idProduct' => 0,
                                                'soluong' => 0,
                                                'nameProduct' => '',

                                            ];
                                            for ($j = 0; $j < count($gioHang); $j++) {
                                                // print_r($gioHang[$j]);
                                                if ($gioHang[$j]['soluong'] > $first['soluong']) {
                                                    $third = $second;
                                                    $second = $first;
                                                    $first = $gioHang[$j];
                                                } else if ($gioHang[$j]['soluong'] > $second['soluong']) {
                                                    $third = $second;
                                                    $second = $gioHang[$j];
                                                } else if ($gioHang[$j]['soluong'] > $third['soluong']) {
                                                    $third = $gioHang[$j];
                                                }
                                            }
                                            // print_r($first);
                                            // print_r($second);
                                            // print_r($third);

                                        ?>
                                            <thead>
                                                <tr>
                                                    <th scope="col"> Year </th>
                                                    <th scope="col"> Progress </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"> III </th>
                                                    <td style="--size:<?= $third['soluong'] / $first['soluong'] ?>;"><?php echo "<div class='text-center font-weight-bold'>" . $third['nameProduct'] . "</div>" ?> </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> I </th>
                                                    <td style="--size:1;"><?php echo "<div class='text-center font-weight-bold'>" . $first['nameProduct'] . "</div>" ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> II </th>
                                                    <td style="--size:<?= $second['soluong'] / $first['soluong'] ?>;"><?php echo "<div class='text-center font-weight-bold'>" . $second['nameProduct'] . "</div>" ?></td>
                                                </tr>
                                            </tbody>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                                <!-- end card-->
                            </div>

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
        <script src="assets/plugins/chart.js/Chart.min.js"></script>
        <!-- Charts data -->
        <script src="assets/data/data_charts.js"></script>
        <!-- END Java Script for this page -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
        <script>
            $(function() {
                $("#datePre").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
                $("#dateAft").datepicker({
                    autoclose: true,
                    todayHighlight: true
                }).datepicker('update', new Date());
            });
        </script>
    </body>

    </html>

<?php
} else {
    include('LoginForm.php');
}
?>