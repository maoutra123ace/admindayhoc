<!doctype html>
<html lang="en">

<head>
    <title>Đăng nhập admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn0.fahasa.com/media/favicon/default/favicon4.ico" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <h1 class="text-center">ĐĂNG NHẬP ADMIN</h1>
    <div class="text-center">
        <div>Tại sao bạn lại nhìn thấy trang này</div>
        <div>1. Do bạn chưa đăng nhập</div>
        <div>2. Do tài khoản của bạn không đủ quyền để truy cập vào hệ thống</div>
        <div>3. Do tài bạn truy cập nhầm đường dẫn</div>
        <div><a href="../index.php" style="color:blue">Trở về trang chủ</a></div>
    </div>
    <div id="loginZone" class="login__zone" style="margin-top: 50px;">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item bg-white text-center" style="width: 50%; border-radius:5px 0 0 0 ">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="Đăng nhập" aria-selected="true">Đăng nhập</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div id="loginForm">
                    <div class="row">
                        <div class="col-4">
                        </div>
                        <div class="col-4">
                            <div class="login-wrap p-4 p-md-5" style="border-radius:0 0 5px 5px">
                                <form class="login-form">
                                    <div class="form-group">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                                        <input type="text" class="form-control rounded-left" placeholder="Username" id="txtUsername" name="txtUsername" required="">
                                    </div>
                                    <div class="form-group">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                                        <input type="password" class="form-control rounded-left" placeholder="Password" id="txtPassword" name="txtPassword" required="">
                                    </div>
                                    <div class="form-group d-flex align-items-center row">
                                        <div class="col-12 text-danger text-center" id="textError">

                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center row">
                                        <div class="col-4"></div>
                                        <div class="col-4">
                                            <div class=" d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary rounded" onclick="dangNhap(event)">Đăng nhập</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script>
        function dangNhap() {
            event.preventDefault();
            username = document.getElementById("txtUsername").value;
            password = document.getElementById("txtPassword").value;
            $.ajax({
                url: "xulydangnhapadmin.php",
                method: "POST",
                data: {
                    data: {
                        username,
                        password,
                    }
                },
                success: function(result) {
                    if (result == 1) {
                        window.location.reload();
                    } else {
                        document.getElementById("textError").innerHTML = result;
                    }
                }
            })
        }
    </script>
</body>

</html>