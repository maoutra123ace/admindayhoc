<?php 
    include("connect.php"); 
    $sql="SELECT * FROM tbl_giaovien";
    $result=mysqli_query($con,$sql);
    $cont = mysqli_num_rows($result);
    $sql1="SELECT * FROM tbl_hocsinh";
    $result1=mysqli_query($con,$sql1);
    $cont1 = mysqli_num_rows($result1);
    $sql2="SELECT * FROM tbl_lophoc";
    $result2=mysqli_query($con,$sql2);
    $cont2 = mysqli_num_rows($result2);
?>


<div class="row">
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Số lượng học sinh<i class="mdi mdi-chart-line mdi-24px float-right"></i>
              </h2 class="display-4"><?php echo $cont1; ?> học sinh</h2>
              
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Số lượng giáo viên<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
              </h4>
              </h2 class="display-4"><?php echo $cont; ?> giáo viên</h2>
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Số lượng lớp<i class="mdi mdi-diamond mdi-24px float-right"></i>
              </h4>
              </h2 class="font-weight-normal mb-3"><?php echo $cont2; ?> lớp học</h2>

              </h4>
            </div>
          </div>
        </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div align=center>
                <h3>Thông tin của quản trị viên<h3>
                <?php
                   include("connect.php"); 
                   $sql3="SELECT * FROM tbl_admin";
                   $res3=mysqli_query($con,$sql3);
                   $tt= mysqli_fetch_array($res3);
       ?>  
      <table class="table table-striped" >
         <tr>
            <td align="right">Tên tài khoản: </td>
            <td><?php echo $tt["admin_name"]; ?></td>
         </tr>
         <tr>
            <td align="right">Email: </td>
            <td><?php echo $tt["email"]; ?></td>
         </tr>

            </div>
        </div>
</div>