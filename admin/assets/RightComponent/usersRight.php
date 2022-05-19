<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Quản lý tài khoản</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Trang chính</li>
                            <li class="breadcrumb-item active">QL tài khoản</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <span class="pull-right">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_user">
                                    <i class="fas fa-user-plus" aria-hidden="true"></i>Thêm tài khoản</button>
                            </span>
                            <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_add_user" aria-hidden="true" id="modal_add_user">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <form action="users.php?addUser" method="post" enctype="multipart/form-data">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Thêm tài khoản mới</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Tài khoản (bắt buộc)</label>
                                                            <input class="form-control" name="name" type="text" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Email (bắt buộc)</label>
                                                            <input class="form-control" name="email" type="email" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Mật khẩu (bắt buộc)</label>
                                                            <input class="form-control" name="password" type="text" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Quyền</label>
                                                            <select name="permission" class="form-control">
                                                                <!-- <option value="1">Administrator</option>
                                                            <option value="2">Manager</option>
                                                            <option value="3">Author</option> -->
                                                                <?php while ($row = mysqli_fetch_assoc($permissionResult)) { ?>
                                                                    <option value=<?= $row["idPermission"] ?>><?= $row["namePermission"] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Kích hoạt</label>
                                                            <select name="active" class="form-control">
                                                                <option value="1">Có</option>
                                                                <option value="0">Không</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Thêm tài khoản</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_edit_user" aria-hidden="true" id="modal_edit_user">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="users.php?updateUser" method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Cập nhật tài khoản</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Tài khoản</label>
                                                            <input class="form-control modalInput" name="updateName" type="text" required readonly="readonly" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Email (bắt buộc)</label>
                                                            <input class="form-control modalInput" name="email" type="email" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Mật khẩu</label>
                                                            <input class="form-control modalInput" name="password" type="password" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Quyền</label>
                                                            <select name="permission" class="form-control">
                                                                <?php
                                                                $permissionSql = "SELECT * FROM permission";
                                                                $permissionResult = $mysqli->query($permissionSql); ?>
                                                                <?php while ($row = mysqli_fetch_assoc($permissionResult)) { ?>
                                                                    <option value=<?= $row["idPermission"] ?>><?= $row["namePermission"] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Kích hoạt</label>
                                                            <select name="active" class="form-control">
                                                                <option value="1">Có</option>
                                                                <option value="0">Không</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Cập nhật tài khoản</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_delete_user" aria-hidden="true" id="modal_delete_user">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="users.php?deleteUser" method="post">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Xóa tài khoản</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Tài khoản</label>
                                                            <input class="form-control modalInput" name="deleteName" type="text" required readonly="readonly" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Bạn có chắc muốn xóa tài khoản này</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <h3>
                                <i class="far fa-user"></i> All users
                            </h3>
                        </div>
                        <!-- end card-header -->
                        <?php
                        if (isset($_GET["addUser"])) {
                            if ($resultAdd) {
                                echo "<h1 class='mt-4 text-center'>Thêm thành công <a href='users.php'>Tải lại trang</a></h1>";
                            } else {
                                echo "<h1 class='mt-4 text-center text-danger'>Thêm thất bại, tài khoản bị trùng <a href='users.php'>Tải lại trang</a></h1>";
                            }
                        }
                        ?>
                        <?php
                        if (isset($_GET["updateUser"])) {
                            if ($resultUpdate) {
                                echo "<h1 class='mt-4 text-center'>Cập nhật thành công <a href='users.php'>Tải lại trang</a></h1>  ";
                                // var_dump($updateSql);
                            } else {
                                echo "<h1 class='mt-4 text-center text-danger'>Cập nhật thất bại <a href='users.php'>Tải lại trang</a></h1>  ";
                            }
                        }
                        ?>
                        <?php
                        if (isset($_GET["deleteUser"])) {
                            if ($resultDelete) {
                                echo "<h1 class='mt-4 text-center'>Xóa thành công <a href='users.php'>Tải lại trang</a></h1>  ";
                                // var_dump($isContained);
                            } else {
                                echo "<h1 class='mt-4 text-center text-danger'>Xóa thất bại <a href='users.php'>Tải lại trang</a></h1> ";
                                // var_dump($deleteSql);
                            }
                        }
                        ?>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="min-width:300px">User details</th>
                                            <th style="width:120px">Role</th>
                                            <th style="width:110px;">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $count = 0;
                                        while ($row = mysqli_fetch_assoc($resultUserSql)) { ?>
                                            <tr>
                                                <td>
                                                    <div class="user_avatar_list d-none d-none d-lg-block"><img alt="image" src="assets/images/avatars/avatar_small.png" /></div>
                                                    <h4>Tài khoản: <span class="taiKhoan" name="taikhoan"><?= $row['taikhoan'] ?></span></h4>
                                                    <p>Email: <span class="email"> <?= $row['email'] ?></span></p>
                                                    <p>Địa chỉ: <span class="diaChi"><?= $row['diaChi'] ?></span></p>
                                                    <p>Số điện thoại: <span class="soDienThoai"><?= $row['soDienThoai'] ?></span></p>
                                                </td>
                                                <?php
                                                $idPermission = $row['permission'];
                                                $sql = "SELECT namePermission FROM permission WHERE idPermission=$idPermission";
                                                $result = $mysqli->query($sql);
                                                $rowPermis = mysqli_fetch_assoc($result);
                                                ?>
                                                <td class="permission"><?= $rowPermis['namePermission'] ?></td>
                                                <td>
                                                    <span class="pull-right">
                                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit_user" onclick="editUser(<?= $count ?>)">
                                                            <i class="fas fa-user-plus" aria-hidden="true"></i> Edit </button>
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_delete_user" onclick="deleteUser(<?= $count ?>)">
                                                            <i class="fas fa-trash"></i> Delete</button>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php
                                            $count++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                        <!-- end card-body -->

                    </div>
                    <!-- end card -->

                </div>
                <!-- end col -->

            </div>
            <!-- end row -->

        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>