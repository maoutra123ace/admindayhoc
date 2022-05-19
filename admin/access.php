<?php
	session_start();
    include('connect.php'); 
?>

<?php
  if(isset($_POST['dangnhap'])) {
		$taikhoan = $_POST['email'];
		$matkhau = md5($_POST['pwd']);
		if($taikhoan=='' || $matkhau ==''){
			$_SESSION["nhap"]="Xin nhập đủ";
			header("location:login.php");
			
		}else{
			$sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_admin WHERE  `email`='$taikhoan' AND `password`='$matkhau'");
			$count = mysqli_num_rows($sql_select_admin);
			if($count>0){
				$_SESSION['dangnhap'] = $taikhoan;
				$_SESSION["checklogin"]=1;
				header("location:index.php?id=tk");
			}else{
				$_SESSION["nhap1"]="Tài khoản hoặc mật khẩu sai";
				header("location:login.php");
			}
		}
	}
?>