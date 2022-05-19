<form action="index.php?do=dhchuaxl&filter=true" method="POST">
    <div class="row">
        <div class="col-4">
            <label>Từ ngày: </label>
            <div id="datePre" class="input-group date" data-date-format="dd-mm-yyyy">
                <input id="datePreInput" name="datePreInput" class="form-control" type="text" readonly />
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>

        <div class="col-4">
            <label>Đến ngày: </label>
            <div id="dateAft" class="input-group date" data-date-format="dd-mm-yyyy">
                <input id="dateAftInput" name="dateAftInput" class="form-control" type="text" readonly />
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>
        <div class="col-2">
            <button class="btn btn-primary" style="margin-top:24.5px;" type="submit">Chọn</button>
        </div>
    </div>
</form>
<?php
if ($_GET['filter']) {
    $dateLeft = ($_POST['datePreInput']);
    $dateRight = ($_POST['dateAftInput']);
    $dayLeft = substr($dateLeft, 0, 2);
    $monthLeft = substr($dateLeft, 3, 2);
    $yearLeft = substr($dateLeft, 6, 4);
    $stringDateLeft = $dayLeft . '-' . $monthLeft . '-' . $yearLeft;
    $dateLeft = date('m-d-Y', strtotime($stringDateLeft));

    $dayRight = substr($dateRight, 0, 2);
    $monthRight = substr($dateRight, 3, 2);
    $yearRight = substr($dateRight, 6, 4);
    $stringDateRight = $dayRight . '-' . $monthRight . '-' . $yearRight;
    $dateRight = date('m-d-Y', strtotime($stringDateRight));

    if ($dateLeft > $dateRight) {
        exit("<h3 class='text-center'>Vui lòng chọn ngày hợp lệ <a href='index.php?do=dhchuaxl'>Chọn lại</a></h3>");
    }
}
?>
<h3 class="text-center">Đơn hàng chưa xử lý</h3>

<?php
$taikhoan = $_SESSION['username'];
$sqlmadh = "SELECT maDonHang,thoidiemdathang FROM donhang WHERE trangthai=0";

$resmadh = $mysqli->query($sqlmadh);
$arrMaDH = array();
$index = 0;
while ($row = $resmadh->fetch_assoc()) {
    $dateLeft = ($_POST['datePreInput']);
    $dateRight = ($_POST['dateAftInput']);
    $dayLeft = substr($dateLeft, 0, 2);
    $monthLeft = substr($dateLeft, 3, 2);
    $yearLeft = substr($dateLeft, 6, 4);
    $stringDateLeft = $dayLeft . '-' . $monthLeft . '-' . $yearLeft;
    $dateLeft = date('m-d-Y', strtotime($stringDateLeft));

    $dayRight = substr($dateRight, 0, 2);
    $monthRight = substr($dateRight, 3, 2);
    $yearRight = substr($dateRight, 6, 4);
    $stringDateRight = $dayRight . '-' . $monthRight . '-' . $yearRight;
    $dateRight = date('m-d-Y', strtotime($stringDateRight));

    $datetime = new DateTime($row['thoidiemdathang']);
    if ($_GET['filter']) {
        $datetime = new DateTime($row['thoidiemdathang']);
        $date = $datetime->format('m-d-Y');
        if ($dateLeft <= $date && $date <= $dateRight) {
            $arrMaDH[$index] = (int)($row['maDonHang']);
            $index++;
        }
    } else {
        $arrMaDH[$index] = (int)($row['maDonHang']);
        $index++;
    }
}
// var_dump($index);
$arrCTDH = array();
$indexCTDH = 0;
?>
<style>
    .table td {
        border: none;
    }
</style>

<div class="row">
    <div class="col-1"></div>
    <table class="table col-10">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col" class="text-center">Mã đơn hàng</th>

                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên SP</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thời điểm đặt hàng</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < $index; $i++) {
                // echo $arrMaDH[$i];
                $maDH = $arrMaDH[$i];
                $sqlmactdh = "SELECT maCTDH,gia,img,nameProduct,soluong FROM chitietdonhang WHERE maDonHang='$maDH'";
                $resmactdh = $mysqli->query($sqlmactdh);

                $sqltongtien = "SELECT thanhtien,thoidiemdathang FROM donhang WHERE maDonHang='$maDH'";
                $restongtien = $mysqli->query($sqltongtien);
                $rowTongTien = $restongtien->fetch_assoc();

            ?>
                <?php
                $isRender = false;
                $isRenderDH = false;
                $isRenderBTN = false;
                while ($row = $resmactdh->fetch_assoc()) {
                    // echo ($row['maDonHang']);
                    // array_push($arrMaDH, $row['maDonHang']);
                    // $arrCTDH[$index] = (int)($row['maDonHang']);
                    // $index++;
                    $arrCTDH[$indexCTDH] = $row['maCTDH'];
                    $indexCTDH++;
                ?>
                    <tr>
                        <td><?php if (!$isRender) {
                                echo $i + 1;
                                $isRender = "true";
                            } ?></td>
                        <td class="text-center font-weight-bold">
                            <?php if (!$isRenderDH) {
                                echo $maDH;
                                $isRenderDH = "true";
                            } ?>
                        <td>
                            <img src=<?= $row['img'] ?> style="max-width:100px" alt="">
                        </td>
                        <td>
                            <?= $row['nameProduct'] ?>
                        </td>
                        <td>
                            <?= $row['soluong'] ?>
                        </td>
                        <td>
                            <?php
                            // $date = strtotime($rowTongTien['thoidiemdathang']);
                            // echo date('H : m', $date);
                            echo $rowTongTien['thoidiemdathang'];
                            ?>
                        </td>
                        <td class=" pt-0 pb-3" style="font-weight:bold">
                            <?php if (!$isRenderBTN) {
                            ?>
                                <button type="submit" class="btn btn-success " onclick="xulydonhang(<?= $maDH ?>)">Check xử lý đơn hàng</button>
                                <a class="" href="chitietdonhang.php?id=<?= $maDH ?>"><button type="submit" class="btn btn-primary ">Xem chi tiết đơn hàng</button></a>
                            <?php
                                $isRenderBTN = "true";
                            } ?>

                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td></td>
                    <td class="text-right pt-0 pb-3" style="font-weight:bold">
                    </td>
                    <td></td>
                    <td class="text-right pt-0 pb-3" style="font-weight:bold">
                        Tổng tiền:
                    </td>
                    <td class="pt-0 pb-3" style="font-weight:bold">
                        <?= number_format($rowTongTien['thanhtien'], 0, ',', '.') ?> đ
                    </td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>