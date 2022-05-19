
<?php
  //timlophoc
    include("connect.php");
    $sql = "SELECT * FROM `tbl_lophoc`";
    $res = mysqli_query($con,$sql);
?>

<?php
  //timhocsinh
    include("connect.php");
    $sql2 = "SELECT * FROM `tbl_hocsinh`";
    $res2 = mysqli_query($con,$sql2);
?>




<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Nhập thông tin giao dịch</h4>
                    <p class="card-description">Bản thông tin</p>
                    <form class="forms-sample" action="xuly.php" method="GET" >
                    <input type="hidden" name="addnewdk">
                    <div class="form-group">
                        <label for="exampleSelectGender">Chọn lớp học</label>
                        <select class="form-control" id="lophoc_id" name="class">
                        <?php while($row = mysqli_fetch_assoc($res)) {
                            echo '<option value="'.$row["lophoc_id"].'">'.$row["tenlophoc"].'</option>';
                         }?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">Tên giao dịch</label>
                        <input type="text" class="form-control" id="tengiaodich" name="namegd" placeholder="Nhập tên giao dịch">
                      </div>


                      <div class="form-group">
                        <label for="exampleInputPassword4">Định giá</label>
                        <input type="number" class="form-control" id="giagiaodich" name="price" placeholder="Nhập giá">
                      </div>

                      
                   
                    <div class="form-group">
                        <label for="exampleInputPassword4">Ngày đăng kí</label>
                        <input type="date" class="form-control" id="ngaythang" name="date" placeholder="Nhập ngày đăng kí">
                      </div>

                        <div class="form-group">
                        <label for="exampleSelectGender">Chọn học sinh</label>
                        <select class="form-control" id="hocsinh_id" name="name">
                        <?php while($row = mysqli_fetch_assoc($res2)) {
                            echo '<option value="'.$row["hocsinh_id"].'">'.$row["name"].'</option>';
                         }?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">Tình trạng đơn</label>
                        <select class="form-control" id="tinhtrangdon" name="category">
                        <option value="Chưa đăng kí">Chưa đăng kí</option>
                        </select>
                      </div>

                      <button type="submit" class="btn btn-gradient-primary mr-2">Xác nhận thông tin</button>
                      <button class="btn btn-light">Hủy</button>
                    </form>
                  </div>
                </div>
              </div>

<?php