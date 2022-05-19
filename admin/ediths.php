<?php
  //timhocsinh
    include("connect.php");
    $id = $_REQUEST["edit"];
    $sql = "SELECT * FROM `tbl_hocsinh` WHERE hocsinh_id=$id";
    $res = mysqli_query($con,$sql);
?>
<div class="col-12 grid-margin stretch-card">
                <?php while($row = mysqli_fetch_assoc($res)) {?>
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Sửa thông tin học sinh</h4>
                    <p class="card-description">Bản thông tin </p>
                    <form class="forms-sample" method="GET" action="xuly.php">
                      <input type="hidden" name="editnewhs" value="<?php echo $id; ?>">
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
                        <label for="exampleInputCity1">Lớp</label>
                        <input type="number" class="form-control" id="address" name="class" value="<?php echo $row['class']; ?>"  placeholder="Nhập lớp">
                      </div>
                      
                
                      <button type="submit" class="btn btn-gradient-primary mr-2">Xác nhận sửa thông tin</button>
                      <button class="btn btn-light">Hủy</button>
                    </form>
                  </div>
                </div>
                <?php } ?>
              </div>

<?php
 