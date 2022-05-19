<?php
  //timgiaovien
    include("connect.php");
    $sql = "SELECT * FROM `tbl_giaovien`";
    $res = mysqli_query($con,$sql);
?>

<?php
  //timchuyenmon
    include("connect.php");
    $sql = "SELECT * FROM `tbl_category`";
    $res = mysqli_query($con,$sql);
?>


<script>
    $(document).ready(function(){
    $("#category_id").change(function(){      
        var change = $("#category_id").val();
        $.ajax({
            url: "xuly.php", 
            type: "get",
            data: {
                change:change
            },
            success: function(result){
                $("#giaovien_id").html(result);
        }});
    });
    });
</script>

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Nhập thông tin lớp học</h4>
                    <p class="card-description">Bản thông tin </p>
                    <form class="forms-sample" method="POST" action="xuly.php"  enctype="multipart/form-data">
                      <input type="hidden" name="addnewlop">
                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Chọn chuyên môn</label>
                        <select class="form-control" id="category_id" name="category">
                        <?php while($row = mysqli_fetch_assoc($res)) {
                            echo '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
                         }?>
                        </select>
                      </div>

                      
                
                      <div class="form-group">
                        <label for="exampleSelectGender">Chọn giáo viên</label>
                        <select class="form-control" id="giaovien_id" name="teacher">
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail3">Tên lớp</label>
                        <input type="text" class="form-control" id="tenlophoc" name="name" placeholder="Nhập tên lóp">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Định giá</label>
                        <input type="number" class="form-control" id="lophoc_giaca" name="price" placeholder="Nhập giá">
                        </div>
                    
                      <div class="form-group">
                        <label for="exampleInputPassword4">Hình ảnh đại diện</label>
                        <div class="form-group">
                       
                        <input type="file" id="image" name="image">
                        
                        </div>
                      </div>
                    
                      <button type="submit" class="btn btn-gradient-primary mr-2">Xác nhận thông tin</button>
                      <button class="btn btn-light">Hủy</button>
                    </form>
                  </div>
                </div>
              </div>

<?php
 