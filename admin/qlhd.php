<?php 
    include("connect.php"); 
    $sql="SELECT * FROM tbl_donhang";
    $result =mysqli_query($con,$sql);
?>

<div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Danh sách hóa đơn của học sinh</h4>
              <h4><a href="index.php?id=qlhd&add">Thêm hóa đơn</a></h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                     <th>Tên giao dịch</th>
                     <th>Ngày tháng đăng kí</th>
                     <th>Mã hóa đơn</th>
                     <th>Tình trạng đơn</th>
                      <th>Sửa</th>
                      <th> Xóa </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                while($row = mysqli_fetch_array($result))
                {   
                    echo "
                    <tr>
                    <td>".$row['donhang_id']."</td>
                    <td>";
                    ?><?php
                      $dk = $row['giaodich_id'];
                      $sql1 ="SELECT * FROM tbl_giaodich where giaodich_id=$dk";
                      $result1 = mysqli_query($con,$sql1);
                      while($arr = mysqli_fetch_array($result1))
                      {
                        echo $arr["tengiaodich"];
                      };
                    ?><?php echo "</td";?>
                    <?php echo "
                    <tr>
                    <td>".$row['ngaythang']."</td>
                    <td>".$row['mahoadon']."</td>
                    <td>".$row['tinhtrangdon']."</td>
                     <td><a href='index.php?id=qlhd&edit=".$row['donhang_id']."'>Edit</a></td> 
                    <td><a href='delehd.php?id=".$row['donhang_id']."'>Del</a></td>
                    </tr>";
                };                    
                ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>