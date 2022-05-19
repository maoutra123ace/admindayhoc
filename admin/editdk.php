
<?php
  //timgiaovien
    include("connect.php");
    $id = $_REQUEST["edit"];
    $sql = "SELECT * FROM `tbl_giaodich` WHERE `giaodich_id`=$id";
    $res = mysqli_query($con,$sql);
    $sql2 = "SELECT * from `tbl_lophoc`";
    $res2 = mysqli_query($con,$sql2);
    $sql3 = "SELECT * from `tbl_hocsinh`";
    $res3 = mysqli_query($con,$sql3);
    $sql4 = "SELECT * FROM `tbl_giaodich`";
    $res4 = mysqli_query($con,$sql4);
?>


<div class="col-12 grid-margin stretch-card">
                <?php while($row = mysqli_fetch_assoc($res)) {?>
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Sửa thông tin giao dịch</h4>
                    <p class="card-description">Bản thông tin </p>
                    <form class="forms-sample" method="GET" action="xuly.php">
                      <input type="hidden" name="editnewdk" value="<?php echo $id; ?>">

                      <div class="form-group">
                        <label for="exampleSelectGender">Chọn lớp học</label>
                        <select class="form-control" id="lophoc_id" name="class">
                        <?php while($row1 = mysqli_fetch_assoc($res2)) {
                          if($row["lophoc_id"]==$row1["lophoc_id"]){
                            echo '<option selected value="'.$row1["lophoc_id"].'">'.$row1["tenlophoc"].'</option>';
                          }else{
                            echo '<option value="'.$row1["lophoc_id"].'">'.$row1["tenlophoc"].'</option>';
                          }
                        }?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail3">Tên giao dịch</label>
                        <input type="text" class="form-control" id="tengiaodich" name="namegd" value="<?php echo $row['tengiaodich']?>" placeholder="Nhập tên giao dịch">
                      </div>
      

                      <div class="form-group">
                        <label for="exampleInputEmail3">Định giá</label>
                        <input type="number" class="form-control" id="giagiaodich" name="price" value="<?php echo $row['giagiaodich']?>" placeholder="Nhập số tiền">
                      </div>
      
                   
                    <div class="form-group">
                        <label for="exampleInputPassword4">Ngày đăng kí</label>
                        <input type="date" class="form-control" id="ngaythang" name="date" value="<?php echo $row['ngaythang']?>" placeholder="Nhập ngày đăng kí">
                      </div>
                  
                      
                        <div class="form-group">
                        <label for="exampleSelectGender">Chọn học sinh</label>
                        <select class="form-control" id="hocsinh_id" name="name">
                        <?php while($row1 = mysqli_fetch_assoc($res3)) {
                          if($row["hocsinh_id"]==$row1["hocsinh_id"]){
                            echo '<option selected value="'.$row1["hocsinh_id"].'">'.$row1["name"].'</option>';
                          }else{
                            echo '<option value="'.$row1["hocsinh_id"].'">'.$row1["name"].'</option>';
                          }
                        }?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">Tình trạng đơn</label>
                        <select class="form-control" id="tinhtrangdon" name="category">
                        <?php
                        
                          if ($row["tinhtrangdon"] == "Chưa đăng kí"){
                            echo '<option selected value="">'.$row["tinhtrangdon"].'</option>';
                            echo '<option value="Chấp nhận đăng kí">Chấp nhận đăng kí</option>';
                            echo  '<option value="Từ chối đăng kí">Từ chối đăng kí</option> ';
                          }else{
                            if ($row["tinhtrangdon"] == "Chấp nhận đăng kí"){
                              echo '<option selected value="'.$row["tinhtrangdon"].'">'.$row["tinhtrangdon"].'</option>';
                              echo '<option value="Chưa đăng kí">Chưa đăng kí</option>';
                              echo  '<option value="Từ chối đăng kí">Từ chối đăng kí</option> ';
                            }else{
                              echo '<option selected value="'.$row["tinhtrangdon"].'">'.$row["tinhtrangdon"].'</option>';
                              echo '<option value="Chấp nhận đăng kí">Chấp nhận đăng kí</option>';
                              echo  '<option value="Chưa đăng kí">Chưa đăng kí</option> ';
                            }
                          }

                       
                        ?>
                      </select>
                      </div>

                      <button type="submit" class="btn btn-gradient-primary mr-2">Xác nhận sửa thông tin</button>
                      <button class="btn btn-light">Hủy</button>
                    </form>
                  </div>
                </div>
                <?php } ?>
              </div>
