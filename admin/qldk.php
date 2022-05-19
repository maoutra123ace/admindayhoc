<?php 
    include("connect.php"); 
    $sql="SELECT * FROM tbl_giaodich";
    $result =mysqli_query($con,$sql);
?>

<div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Danh sách đăng kí học tập của học sinh</h4>
              <h4><a href="index.php?id=qldk&add">Thêm giao dịch</a></h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID </th>
                     <th>Tên Lớp</th>
                     <th>Tên giao dịch</th>
                     <th>Giá thanh toán</th>
                     <th>Ngày tháng đăng kí</th>
                     <th>Tên học sinh đăng kí</th>
                     <th>Tình trạng giao dịch</th>
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
                    <td>".$row['giaodich_id']."</td>
                    <td>";
                    ?><?php
                      $dk = $row['lophoc_id'];
                      $sql1 ="SELECT * FROM tbl_lophoc where lophoc_id=$dk";
                      $result1 = mysqli_query($con,$sql1);
                      while($arr = mysqli_fetch_array($result1))
                      {
                        echo $arr["tenlophoc"];
                      };
                    ?><?php echo "</td";?>
                    <?php echo "
                    <tr>
                    <td>".$row['tengiaodich']."</td>
                    <td>".$row['giagiaodich']."</td>
                    <td>".$row['ngaythang']."</td>
                    <td>"?>
                    <?php
                    $dk = $row['hocsinh_id'];
                    $sql1 ="SELECT * FROM tbl_hocsinh where hocsinh_id=$dk";
                    $result1 = mysqli_query($con,$sql1);
                    while($arr = mysqli_fetch_array($result1))
                    {
                      echo $arr["name"];
                    };
                    ?>
                    <?php echo "
                    </td>
                    <td>".$row['tinhtrangdon']."</td>
                    <td><a href='index.php?id=qldk&edit=".$row['giaodich_id']."'>Edit</a></td> 
                    <td><a href='deledk.php?id=".$row['giaodich_id']."'>Del</a></td>
                    </tr>";
                };                    
                ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>