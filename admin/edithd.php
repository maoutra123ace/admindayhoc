
<?php
  //timgiaodich
    include("connect.php");
    $id = $_REQUEST["edit"];
    $sql = "SELECT * FROM `tbl_donhang` WHERE `donhang_id`=$id";
    $res = mysqli_query($con,$sql);
    $sql2 = "SELECT * from `tbl_giaodich`";
    $res2 = mysqli_query($con,$sql2);
   
?>
<div class="col-12 grid-margin stretch-card">
                <?php while($row = mysqli_fetch_assoc($res)) {?>
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Sửa thông tin giao dịch</h4>
                    <p class="card-description">Bản thông tin </p>
                    <form class="forms-sample" method="GET" action="xuly.php">
                      <input type="hidden" name="editnewhd" value="<?php echo $id; ?>">

                      <div class="form-group">
                        <label for="exampleSelectGender">Chọn giao dịch của học sinh</label>
                        <select class="form-control" id="giaodich_id" name="namegd">
                        <?php while($row1 = mysqli_fetch_assoc($res2)) {
                          if($row["giaodich_id"]==$row1["giaodich_id"]){
                            echo '<option selected value="'.$row1["giaodich_id"].'">'.$row1["tengiaodich"].'</option>';
                          }else{
                            echo '<option value="'.$row1["giaodich_id"].'">'.$row1["tengiaodich"].'</option>';
                          }
                        }?>
                        </select>
                      </div>

                    <div class="form-group">
                        <label for="exampleInputPassword4">Ngày đăng kí</label>
                        <input type="date" class="form-control" id="ngaythang" name="date" value="<?php echo $row['ngaythang']?>" placeholder="Nhập ngày đăng kí">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">Mã hóa đơn</label>
                        <input type="date" class="form-control" id="mahoadon" name="credit" value="<?php echo $row['mahoadon']?>" placeholder="Nhập ngày đăng kí">
                      </div>
                  
                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Tình trạng đơn</label>
                        <select class="form-control" id="tinhtrangdon" name="category">
                        <?php
                        
                          if ($row["tinhtrangdon"] == "Chưa thanh toán"){
                            echo '<option selected value="">'.$row["tinhtrangdon"].'</option>';
                            echo '<option value="Đã thanh toán">Thanh toán thành công</option>';
                            echo  '<option value="Đã hủy thanh toán">Từ chối thanh toán</option> ';
                          }else{
                            if ($row["tinhtrangdon"] == "Đã thanh toán"){
                              echo '<option selected value="'.$row["tinhtrangdon"].'">'.$row["tinhtrangdon"].'</option>';
                              echo '<option value="Chưa thanh toán">Chưa thanh toán</option>';
                              echo  '<option value="Đã hủy thanh toán">Từ chối thanh toán</option> ';
                            }else{
                              echo '<option selected value="'.$row["tinhtrangdon"].'">'.$row["tinhtrangdon"].'</option>';
                              echo '<option value="Đã thanh toán">Thanh toán thành công</option>';
                              echo  '<option value="Chưa thanh toán">Chưa thanh toán</option> ';
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
