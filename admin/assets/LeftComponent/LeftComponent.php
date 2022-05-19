<?php
if ($_SESSION['username']) {
    $username = ($_SESSION['username']);
}
$query = $mysqli->query("SELECT `taikhoan`,`permission` FROM user WHERE taikhoan='$username'");
$row = mysqli_fetch_array($query);
$permission = $row['permission'];
include('assets/LeftComponent/dashboard.php');
// include('assets/LeftComponent/datatable.php');

switch ($permission) {
    case 1: {
            $sqlRole = "SELECT maChucNang FROM chitietphanquyen WHERE idPermission=1";
            $result = $mysqli->query($sqlRole);
            while ($row = mysqli_fetch_assoc($result)) {
                switch ($row['maChucNang']) {
                    case 1: {
                            include('assets/LeftComponent/user.php');
                            break;
                        }
                    case 2: {
                            include('assets/LeftComponent/bookList.php');
                            break;
                        }
                    case 3: {
                            include('assets/LeftComponent/datatable.php');

                            break;
                        }
                    case 4: {
                            include('assets/LeftComponent/statistic.php');
                            break;
                        }
                }
            }
            break;
        }
    case 2: { {
                $sqlRole = "SELECT maChucNang FROM chitietphanquyen WHERE idPermission=2";
                $result = $mysqli->query($sqlRole);
                while ($row = mysqli_fetch_assoc($result)) {
                    switch ($row['maChucNang']) {
                        case 1: {
                                include('assets/LeftComponent/user.php');
                                break;
                            }
                        case 2: {
                                include('assets/LeftComponent/bookList.php');
                                break;
                            }
                        case 3: {
                                include('assets/LeftComponent/datatable.php');

                                break;
                            }
                        case 4: {
                                include('assets/LeftComponent/statistic.php');
                                break;
                            }
                    }
                }
            }
            break;
        }
    case 3: { {
                $sqlRole = "SELECT maChucNang FROM chitietphanquyen WHERE idPermission=3";
                $result = $mysqli->query($sqlRole);
                while ($row = mysqli_fetch_assoc($result)) {
                    switch ($row['maChucNang']) {
                        case 1: {
                                include('assets/LeftComponent/user.php');
                                break;
                            }
                        case 2: {
                                include('assets/LeftComponent/bookList.php');
                                break;
                            }
                        case 3: {
                                include('assets/LeftComponent/datatable.php');

                                break;
                            }
                        case 4: {
                                include('assets/LeftComponent/statistic.php');
                                break;
                            }
                    }
                }
            }
            break;
        }
}

// include('assets/LeftComponent/dashboard.php');
// include('assets/LeftComponent/user.php');
// include('assets/LeftComponent/bookList.php');
// include('assets/LeftComponent/slider.php');
// include('assets/LeftComponent/statistic.php');
