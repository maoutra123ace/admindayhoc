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
        <title>Fahasa Admin - Trình chiếu</title>
        <meta name="description" content="Slider config | Nura Admin">
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
                                    <h1 class="main-title float-left">Slider config</h1>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item">Home</li>
                                        <li class="breadcrumb-item active">Slider config</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="text-center mb-4">
                            <h3>Cách phân chia slider</h3>
                            <img src="./assets/images/Demo-Slider.png" alt="demo-slider">
                        </div>

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                <div class="card mb-3">

                                    <div class="card-header">

                                        <!-- <span class="pull-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_slide"><i class="fas fa-plus" aria-hidden="true"></i> Add new slide</button></span> -->
                                        <h3><i class="fas fa-photo-video"></i> Slider</h3>

                                        <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_add_slide" aria-hidden="true" id="modal_add_slide">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <form action="#" method="post" enctype="multipart/form-data">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Add new slider image</h5>
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Title</label>
                                                                        <input class="form-control" name="title" type="text" />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea class="form-control" name="content" rows="4"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>URL</label>
                                                                        <input class="form-control" name="url" type="text" />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Position</label>
                                                                        <input class="form-control" name="position" type="text" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Active</label>
                                                                        <select name="active" class="form-control">
                                                                            <option value="1">YES</option>
                                                                            <option value="0">NO</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="form-group">
                                                                <label>Slide image (required):</label> <br />
                                                                <input type="file" name="image" required>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary">Add slider image</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end card-header -->

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width:200px">Image</th>
                                                        <th style="min-width:250px">Slide details</th>
                                                        <th style="min-width:140px">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>

                                                        <td>
                                                            <img alt="image" class="img-fluid img_slider" src="https://via.placeholder.com/180x120g" />
                                                        </td>

                                                        <td>
                                                            <h5>Slide 1 Title</h5>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lacus ullamcorper, consectetur mi quis, cursus nulla. Nunc placerat lacus sed pharetra hendrerit.</p>
                                                            <p>URL: <a target="_blank" href="https://www.google.com">https://www.google.com</a></p>
                                                        </td>

                                                        <td>
                                                            <a href="#" class="btn btn-primary btn-sm btn-block"><i class="fas fa-search"></i> Edit slide</a>
                                                            <a href="#" class="btn btn-danger btn-sm btn-block mt-2"><i class="fas fa-trash"></i> Delete slide</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img alt="image" class="img-fluid img_slider" src="https://via.placeholder.com/180x120" />
                                                        </td>

                                                        <td>
                                                            <h5>Slide 2 title</h5>
                                                            <p>Nulla lacinia volutpat massa, vitae mattis neque sodales vel. Nam venenatis arcu risus, sit amet scelerisque leo aliquet sit amet. Nunc convallis, nisl a sollicitudin volutpat</p>
                                                            <p> URl: <a target="_blank" href="https://www.yahoo.com">https://www.yahoo.com</a></p>
                                                        </td>

                                                        <td>
                                                            <a href="#" class="btn btn-primary btn-sm btn-block"><i class="fas fa-search"></i> Edit slide</a>
                                                            <a href="#" class="btn btn-danger btn-sm btn-block mt-2"><i class="fas fa-trash"></i> Delete slide</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img alt="image" class="img-fluid img_slider" src="https://via.placeholder.com/180x120" />
                                                        </td>

                                                        <td>
                                                            <h5>Slide 3 Title</h5>
                                                            <p>Duis vehicula, dolor pretium finibus interdum, sem mi suscipit enim, in tristique magna diam eget purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                                            <p>URl: <a target="_blank" href="https://www.youtube.com">https://www.youtube.com</a></p>
                                                        </td>

                                                        <td>
                                                            <a href="#" class="btn btn-primary btn-sm btn-block"><i class="fas fa-search"></i> Edit slide</a>
                                                            <a href="#" class="btn btn-danger btn-sm btn-block mt-2"><i class="fas fa-trash"></i> Delete slide</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


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

    </body>

    </html>

<?php
} else {
    include('LoginForm.php');
}
?>