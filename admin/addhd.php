
<?php
  //timlophoc
    include("connect.php");
    $sql = "SELECT * FROM `tbl_giaodich`";
    $res = mysqli_query($con,$sql);
?>


<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Nhập thông tin hóa đơn</h4>
                    <p class="card-description">Bản thông tin</p>
                    <form class="forms-sample" method="GET" action="xuly.php">
                      <input type="hidden" name="addnewhd">
                    
                    <div class="form-group">
                        <label for="exampleSelectGender">Chọn giao dịch</label>
                        <select class="form-control" id="giaodich_id" name="namegd">
                        <?php while($row = mysqli_fetch_assoc($res)) {
                            echo '<option value="'.$row["giaodich_id"].'">'.$row["tengiaodich"].'</option>';
                         }?>
                        </select>
                      </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword4">Ngày đăng kí</label>
                        <input type="date" class="form-control" id="ngaythang" name="date" placeholder="Nhập ngày đăng kí">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Mã hóa đơn</label>
                        <input type="text" class="form-control" id="mahang" name="credit" placeholder="Nhập mã hóa đơn">
                      </div> 

                      <div class="form-group">
                        <label for="exampleSelectGender">Tình trạng đơn</label>
                        <select class="form-control" id="tinhtrangdon" name="category">
                        <option value="Chưa thanh toán">Chưa xử lý</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Xác nhận thông tin</button>
                      <button class="btn btn-light">Hủy</button>
                    </form>
                  </div>
                </div>
              </div>

<?php