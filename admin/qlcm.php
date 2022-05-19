<?php 
    include("connect.php"); 
    $sql="SELECT * FROM tbl_category";
    $result =mysqli_query($con,$sql);
?>

<div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Danh sách chuyên môn đăng kí cho giáo viên</h4>
              <h4><a href="index.php?id=qlcm&add">Thêm chuyên môn</a></h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> ID </th>
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
                    <td>".$row['category_id']."</td>
                    <td>".$row['category_name']."</td>
                     <td><a href='index.php?id=qlcm&edit=".$row['category_id']."'>Edit</a></td> 
                    <td><a href='delecm.php?id=".$row['category_id']."'>Del</a></td>
                    </tr>";
                };                    
                ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>