<?php
  //timhocsinh
    include("connect.php");
    $id = $_REQUEST["edit"];
    $sql = "SELECT * FROM `tbl_category` WHERE category_id=$id";
    $res = mysqli_query($con,$sql);
?>

<div class="col-12 grid-margin stretch-card">
              <?php while($row = mysqli_fetch_assoc($res)) {?>
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Nhập thông tin chuyên môn</h4>
                    <p class="card-description">Bản thông tin </p>
                    <form class="forms-sample" method="GET" action="xuly.php">
                      <input type="hidden" name="editnewcm" value="<?php echo $id;?>">
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Tên chuyên môn</label>
                        <input type="text" class="form-control" id="category_name"   value="<?php echo $row['category_name']; ?>" name="category_name" placeholder="Nhập chuyên môn">
                      </div>
                     
                        <button type="submit" class="btn btn-gradient-primary mr-2">Xác nhận thông tin</button>
                      <button class="btn btn-light">Hủy</button>
                    </form>
                  </div>
                </div>
                <?php } ?>
</div>

