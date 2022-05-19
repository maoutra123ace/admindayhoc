<?php 
    include("connect.php"); 
    $sql="SELECT * FROM tbl_hocsinh";
    $result =mysqli_query($con,$sql);
?>


<div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
            <h4 class="card-title">Danh sách tài khoản và thông tin của học sinh</h4>
              <h4><a href="index.php?id=qlhs&add">Thêm học sinh</a></h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> ID </th>
                      <th> Họ và tên </th>
                      <th> SDT </th>
                      <th> Địa chỉ </th>
                      <th> Lớp </th>
                      <th> Email </th>
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
                    <td>".$row['hocsinh_id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['phone']."</td>
                    <td>".$row['address']."</td>
                    <td>".$row['class']."</td>
                    <td>".$row['email']."</td>
                    <td><a href='index.php?id=qlhs&edit=".$row['hocsinh_id']."'>Edit</a></td> 
                    <td><a href='delehs.php?id=".$row['hocsinh_id']."'>Del</a></td>
                    </tr>";
                };                    
                ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>