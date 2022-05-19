<?php
  //timgiaovien
    include("connect.php");
    $sql = "SELECT * FROM `tbl_category`";
    $res = mysqli_query($con,$sql);
?>

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Nhập thông tin giáo viên</h4>
                    <p class="card-description">Bản thông tin </p>
                    <form class="forms-sample" method="GET" action="xuly.php">
                      <input type="hidden" name="addnewgv">
                      <div class="form-group">
                        <label for="exampleInputName1">Họ và tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="pwd" placeholder="Nhập mật khẩu mới">
                        </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="password2" name="pwd2" placeholder="Nhập lại mật khẩu">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Số điện thoại</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address"  placeholder="Nhập địa chỉ">
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">Chọn chuyên môn</label>
                        <select class="form-control" id="category_id" name="category">
                        <?php while($row = mysqli_fetch_assoc($res)) {
                            echo '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
                         }?>
                        </select>
                      </div>

                      <button type="submit" class="btn btn-gradient-primary mr-2">Xác nhận thông tin</button>
                      <button class="btn btn-light">Hủy</button>
                    </form>
                  </div>
                </div>
              </div>

<?php
 