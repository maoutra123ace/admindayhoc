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

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box noradius noborder bg-warning pb-5">
                        <i class="fas fa-shopping-cart float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Đơn hàng</h6>
                        <h1 class="m-b-20 text-white counter"><?= $counterDH ?></h1>
                        <!-- <span class="text-white">25 Today</span> -->
                    </div>
                </div>


                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <a href="index.php?do=dhchuaxl">
                        <div class="card-box noradius noborder bg-danger pb-5">
                            <i class="fas fa-shopping-cart float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Đơn hàng chưa xử lý</h6>
                            <h1 class="m-b-20 text-white counter">...</h1>
                            <!-- <span class="text-white">25 Today</span> -->
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <a href="index.php?do=dhdaxl">
                        <div class="card-box noradius noborder bg-success pb-5">
                            <i class="fas fa-shopping-cart float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Đơn hàng đã xử lý</h6>
                            <h1 class="m-b-20 text-white counter">...</h1>
                            <!-- <span class="text-white">25 Today</span> -->
                        </div>
                    </a>
                </div>
            </div>
            <!-- end row -->

            <?php
            if ($_GET['do'] == 'dhchuaxl') {
                if ($_GET['filter']) {
                    include('assets/RightComponent/dhchuaxl.php');
                } else {
                    include('assets/RightComponent/dhchuaxl.php');
                }
            } elseif ($_GET['do'] == 'dhdaxl') {
                if ($_GET['filter']) {
                    include('assets/RightComponent/dhdaxl.php');
                } else {
                    include('assets/RightComponent/dhdaxl.php');
                }
            }
            ?>

            <!-- end row -->

            <!-- end row-->

        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>