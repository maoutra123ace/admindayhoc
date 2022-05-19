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
        <title>Fahasa Admin - Bảng dữ liệu</title>
        <!-- <meta name="description" content="Slider config | Nura Admin"> -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Your website">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn0.fahasa.com/media/favicon/default/favicon4.ico" />


        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- Font Awesome CSS -->
        <link href="assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <!-- Custom CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <style>
            #employee_data_info {
                margin-top: 3px;
            }

            li.paginate_button {
                padding: 10px;
                background-color: #fff;
            }

            li.paginate_button.active a {
                color: black;
            }

            li.paginate_button.disabled a {
                color: #f0f0f0;
            }

            .input-sm {
                margin: 0 10px 0 10px !important;
            }

            .sorting_desc:after {
                content: "" !important;
            }

            .sorting_asc:after {
                content: "" !important;
            }

            .sorting:after {
                content: "" !important;

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
                                    <h1 class="main-title float-left">Bảng dữ liệu</h1>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item">Home</li>
                                        <li class="breadcrumb-item active">Bảng dữ liệu</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="container">
                            <h3 align="center">Bảng dữ liệu</h3>
                            <br />
                            <div class="table-responsive">
                                <table id="employee_data" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td class="text-center">ID</td>
                                            <td class="text-center">Hình ảnh</td>
                                            <td class="text-center">Tên</td>
                                            <td class="text-center">Giá</td>
                                            <td class="text-center">Giảm giá</td>
                                            <td class="text-center">Mô tả</td>
                                        </tr>
                                    </thead>
                                    <?php
                                    $query = "SELECT * FROM product ORDER BY IDProduct DESC";
                                    $result = $mysqli->query($query);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '  
                                            <tr>  
                                            <td class="text-center" style="min-width:100px">' . $row["IDProduct"] . '</td>  
                                                <td class="text-center">
                                                <img src= ' . $row["img"] . ' style="width:100px" />
                                                </td>  
                                                <td class="text-center" style="min-width:200px">' . $row["nameProduct"] . '</td>  
                                                <td class="text-center" style="min-width:100px">' . $row["price"] . '</td>  
                                                <td class="text-center" style="min-width:100px">' . $row["discount"] . '</td>  
                                                <td class="text-center" style="min-width:300px">' . $row["moTa"] . '</td>  
                                            </tr>  
                                        ';
                                    }
                                    ?>
                                </table>
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#employee_data').DataTable();
                });
            </script>
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