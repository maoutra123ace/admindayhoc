<?php 
    include("connect.php"); 
    $sql="SELECT * FROM tbl_giaovien";
    $result =mysqli_query($con,$sql);
    if(isset($_SESSION['del_false'])){
        echo '<script>alert("Giáo viên đang có lớp dạy!! không thể xoá!!");</script>';
        unset($_SESSION["del_false"]);
    };
?>


<div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Danh sách tài khoản và thông tin của giáo viên </h4>
              <h4><a href="index.php?id=qlgv&add">Thêm giáo viên</a></h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> ID </th>
                      <th> Họ và tên </th>
                      <th> SDT </th>
                      <th> Địa chỉ </th>
                      <th> Email </th>
                      <th> Chuyên môn </th>
                      <th> Sửa </th>
                      <th> Xóa </th>
                    </tr>
                  </thead>
                  <tbody>
                <?php 
                while($row = mysqli_fetch_array($result))
                {   
                    echo "
                    <tr>
                    <td>".$row['giaovien_id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['phone']."</td>
                    <td>".$row['address']."</td>
                    <td>".$row['email']."</td>
                    <td>";
                    ?><?php
                      $dk = $row['category_id'];
                      $sql1 ="SELECT * FROM tbl_category where category_id=$dk";
                      $result1 = mysqli_query($con,$sql1);
                      while($arr = mysqli_fetch_array($result1))
                      {
                        echo $arr["category_name"];
                      };
                    ?><?php echo "
                    </td>
                    <td><a href='index.php?id=qlgv&edit=".$row['giaovien_id']."'>Edit</a></td> 
                    <td><a href='delegv.php?id=".$row['giaovien_id']."'>Del</a></td>
                    </tr>";
                };                    
                ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>