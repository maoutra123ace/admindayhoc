<?php 
    include("connect.php"); 
    $sql="SELECT * FROM tbl_lophoc";
    $result =mysqli_query($con,$sql);
?>


<div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
            <h4 class="card-title">Danh sách lớp và thông tin của giáo viên đang dạy</h4>
              <h4><a href="index.php?id=qllop&add">Thêm lớp học</a></h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> ID </th>
                      <th> Chuyên môn </th>
                      <th> Giáo viên </th>
                      <th> Tên lớp </th>
                      <th> Giá đăng kí </th>
                      <th> Ảnh lớp </th>
                      <th> Sửa </th>
                      <th> Xóa </th>
                    </tr>
                  </thead>
                  <tbody>
                <?php 
                while($row = mysqli_fetch_assoc($result))
                {   
                    echo "
                    <tr>
                    <td>".$row['lophoc_id']."</td>
                    <td>";
                    ?><?php
                      $dk = $row['category_id'];
                      $sql1 ="SELECT * FROM tbl_category where category_id=$dk";
                      $result1 = mysqli_query($con,$sql1);
                      while($arr = mysqli_fetch_array($result1))
                      {
                        echo $arr["category_name"];
                      };
                    ?>
                    <?php echo "</td><td>";
                    ?><?php
                      $gv = $row['giaovien_id'];
                      $sql1 ="SELECT * FROM tbl_giaovien where giaovien_id=$gv";
                      $result1 = mysqli_query($con,$sql1);
                      while($arr = mysqli_fetch_array($result1))
                      {
                        echo $arr["name"];
                      };

                    ?>
                    <?php
                    echo"</td>
                    <td>".$row['tenlophoc']."</td>
                    <td>".$row['lophoc_giaca']."</td>
                    <td><img src='assets/images/".$row['lophoc_hinhanh']."'></td>
                    <td><a href='index.php?id=qllop&edit=".$row['lophoc_id']."'>Edit</a></td> 
                    <td><a href='delelop.php?id=".$row['lophoc_id']."'>Del</a></td>
                    </tr>
                    ";
                };                    
                ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>