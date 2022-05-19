
<?php
  //timgiaovien
    include("connect.php");
    $id = $_REQUEST["edit"];
    $sql = "SELECT * FROM `tbl_giaovien` WHERE `giaovien_id`=$id";
    $res = mysqli_query($con,$sql);
    $sql2 = "SELECT * from `tbl_category`";
    $res2 = mysqli_query($con,$sql2);
?>
<div class="col-12 grid-margin stretch-card">
                <?php while($row = mysqli_fetch_assoc($res)) {?>
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Sửa thông tin giáo viên</h4>
                    <p class="card-description">Bản thông tin </p>
                    <form class="forms-sample" method="GET" action="xuly.php">
                      <input type="hidden" name="editnewgv" value="<?php echo $id; ?>">
                      <div class="form-group">
                        <label for="exampleInputName1">Họ và tên</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" placeholder="Nhập họ và tên">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Nhập Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Số điện thoại</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" placeholder="Nhập số điện thoại">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>"  placeholder="Nhập địa chỉ">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Chọn chuyên môn</label>
                        <select class="form-control" id="category_id" name="category">
                        <?php while($row1 = mysqli_fetch_assoc($res2)) {
                          if($row["category_id"]==$row1["category_id"]){
                            echo '<option selected value="'.$row1["category_id"].'">'.$row1["category_name"].'</option>';
                          }else{
                            echo '<option value="'.$row1["category_id"].'">'.$row1["category_name"].'</option>';
                          }
                           
                         }?>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Xác nhận sửa thông tin</button>
                      <button class="btn btn-light">Hủy</button>
                    </form>
                  </div>
                </div>
                <?php } ?>
              </div>

<?php
 