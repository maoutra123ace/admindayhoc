<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Users</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Users</li>
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
                            <span class="pull-right">
                            </span>
                            <h3>
                                <i class="far fa-user"></i> Phân quyền theo chức năng
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="min-width:300px">Tên quyền</th>
                                            <th style="width:1200px">Chức năng</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $arrChucNang = [];
                                        while ($rowEmpower = mysqli_fetch_assoc($empowerResult)) {
                                            array_push($arrChucNang, $rowEmpower);
                                        }
                                        $count = 0;
                                        while ($row = mysqli_fetch_assoc($permissionResult)) { ?>
                                            <tr>
                                                <td>
                                                    <h3><span class=""><?= $row['namePermission'] ?></span></h3>
                                                </td>
                                                <td class="empower">
                                                    <?php
                                                    foreach ($arrChucNang as $chucNang) {
                                                        $maQuyen = $row['idPermission'];
                                                        $maChucNang = $chucNang['maChucNang'];
                                                        $sqlCheckFill = "SELECT * FROM chitietphanquyen WHERE idPermission=$maQuyen AND maChucNang=$maChucNang";
                                                        if (($mysqli->query($sqlCheckFill)->num_rows)) {
                                                            echo '
                                                        <span>
                                                        <input type="checkbox" value="" checked onchange="reloadResult(' . $row['idPermission'] . ',' . $chucNang['maChucNang'] . ')">
                                                        <label  class="mr-5">' . $chucNang['tenChucNang'] . '</label>
                                                        </span>
                                                        ';
                                                        } else {
                                                            echo '
                                                            <span>
                                                            <input type="checkbox" value=""  onchange="reloadResult(' . $row['idPermission'] . ',' . $chucNang['maChucNang'] . ')">
                                                            <label  class="mr-5">' . $chucNang['tenChucNang'] . '</label>
                                                            </span>
                                                            ';
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $count++;
                                        } ?>
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