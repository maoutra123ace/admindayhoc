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
        <title>Fahasa Admin - Thông tin người dùng</title>
        <meta name="description" content="Users | Nura Admin">
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
        <style>
            .select2-search--dropdown {
                display: none;
            }
        </style>
    </head>
    <?php
    $userSql = "SELECT * FROM user";
    $resultUserSql = $mysqli->query($userSql);

    $permissionSql = "SELECT * FROM permission";
    $permissionResult = $mysqli->query($permissionSql);

    if (isset($_GET["addUser"])) {
        $name = ($_POST["name"]);
        $email = ($_POST["email"]);
        $password = ($_POST["password"]);
        $permission = ($_POST["permission"]);
        $active = ($_POST["active"]);

        if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $name)) {
            $resultAdd = "false";
            exit("Tài khoản không được chứa khoảng trắng và các ký tự đặc biệt, không được dưới 6 ký tự.");
        }

        $passwordMaHoa = md5($password);

        $addSql = "INSERT INTO user (`taikhoan`, `email`, `matkhau`, `permission`, `active`) VALUES ('$name', '$email', '$passwordMaHoa', '$permission','$active')";

        $resultAdd = $mysqli->query($addSql);
    }

    if (isset($_GET["updateUser"])) {
        $name = ($_POST["updateName"]);
        $isContained = $mysqli->query("SELECT * FROM user WHERE taikhoan='$name'");

        if (!($isContained->num_rows)) {
            $resultUpdate = false;
        } else {
            if (($_POST["password"])) {
                $email = ($_POST["email"]);
                $password = ($_POST["password"]);
                $passwordMaHoa = md5($password);
                $permission = ($_POST["permission"]);
                $active = ($_POST["active"]);
                $updateSql = "UPDATE user SET email='$email',matkhau='$passwordMaHoa', permission='$permission', active='$active' WHERE taikhoan='$name'";
                $resultUpdate = $mysqli->query($updateSql);
            } else {
                $email = ($_POST["email"]);
                $permission = ($_POST["permission"]);
                $active = ($_POST["active"]);
                $updateSql = "UPDATE user SET email='$email', permission='$permission', active='$active' WHERE taikhoan='$name'";
                $resultUpdate = $mysqli->query($updateSql);
            }
        }
    }

    if (isset($_GET["deleteUser"])) {
        $name = ($_POST["deleteName"]);
        $isContained = $mysqli->query("SELECT * FROM user WHERE taikhoan='$name'");
        $rowUserDel = $isContained->fetch_assoc();
        // var_dump($rowUserDel);
        if (!($rowUserDel['taikhoan'])) {
            $resultDelete = false;
        } else {
            $deleteSql = "DELETE FROM user WHERE taikhoan='$name'";
            $resultDelete = $mysqli->query($deleteSql);
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
            <?php
            include('assets/RightComponent/usersRight.php')
            ?>
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
                function editUser(index) {
                    let modalInput = document.getElementsByClassName("modalInput");
                    let arrTaiKhoan = document.getElementsByClassName("taiKhoan");
                    let arrEmail = document.getElementsByClassName("email");
                    let arrDiaChi = document.getElementsByClassName("diaChi");
                    let arrSoDienThoai = document.getElementsByClassName("soDienThoai");
                    let arrPermission = document.getElementsByClassName("permission");
                    modalInput[0].value = arrTaiKhoan[index].innerHTML;
                    modalInput[1].value = arrEmail[index].innerHTML;
                    // modalInput[2] = arr[index].innerHTML;
                }

                function deleteUser(index) {
                    let modalInput = document.getElementsByClassName("modalInput");
                    let arrTaiKhoan = document.getElementsByClassName("taiKhoan");
                    // console.log(arrTaiKhoan);
                    modalInput[3].value = arrTaiKhoan[index].innerHTML;
                }
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