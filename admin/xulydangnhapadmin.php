<?php
session_start();
include('../common.php');
include('../connect.php');
$data = ($_POST['data']);
$username = $data['username'];
$password = $data['password'];
$passwordMaHoa = md5($password);
if (!$username || !$password) {
    echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
    exit;
}

$query = $mysqli->query("SELECT `taikhoan`, `matkhau`,`active`,`permission` FROM user WHERE taikhoan='$username'");
if (mysqli_num_rows($query) == 0) {
    echo "Tên đăng nhập này khong tồn tại. Vui lòng kiểm tra lại.";
    exit;
}

$row = mysqli_fetch_array($query);

if ($passwordMaHoa != $row['matkhau']) {
    echo "Mật khẩu không đúng. Vui lòng nhập lại. ";
    exit;
}

if (!$row['active']) {
    echo "Opps. Tài khoản này bị khóa mất rồi...";
    exit;
}

if ($row['permission'] == 4) {
    echo "Tài khoản không đủ quyền để truy cập vào hệ thống.";
    exit;
}

// $_SESSION['valid'] = true;
// $_SESSION['timeout'] = time();

$_SESSION['username'] = $username;
// var_dump($_SESSION['username']);
// require('common.php');
echo 1;
