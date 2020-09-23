<!DOCTYPE html>
<html lang="en">

<head ('Content-Type: text/html; charset=utf-8');>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="./ANH/icon.jpg">
    <link rel="stylesheet" href="./css/style1.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>đăng ký</title>
</head>

<body>
    <div class=" container-fluid " style="height:100vh; background-image:url(https://data.whicdn.com/images/84259561/original.gif); background-size:cover;">
        <div class="row">
            <div class="col w-100 h-100 mt-3 ">

                <form class="col-4 mx-auto m-auto btn-outline-info  pt-2" style="height: 720px; background-color:hotpink " method="post" action="xulydangky.php">

                    <div class=" text-center"><img src="./ANH/logo.png" alt="clear" height="100px" width="170px " class=" mt-3">
                    </div>
                    <h2 class="text-center"> ĐĂNG KÝ</h2>
                    <div>
                        <label class=" text "> Họ và tên: </label>
                        <div class="d-flex justify-content-center">
                            <input class="form-control w-75 btn-outline-success" type="text" name="hoten" required>
                        </div>
                        <div>
                            <label> Địa chỉ:</label>
                            <div class="d-flex justify-content-center">
                                <input class="form-control w-75 btn-outline-success" type="text" name="address" required>
                            </div>
                        </div>


                        <div>
                            <label> Số điện thoại:</label>
                            <div class="d-flex justify-content-center">
                                <input class="form-control w-75 btn-outline-success" type="text" name="phone" required pattern="^\d{10}$"  title="vui lòng xem lại sdt,  nhập đúng định dạng 10 chữ số của SDT">
                            </div>
                        </div>
                        <!-- <div>
                        <label> Username:</label>
                        <input class="ip" type="text" name="username">
                    </div> -->
                        <!-- <div>
                        <label> Mật Khẩu:</label>
                        <input class="ip " type="password" name="password">
                    </div>
                    <div>
                        <label> Nhập lại mật khẩu:</label>
                        <input class="ip" type="password">
                    </div> -->
                        <div>


                            <label for="username">Tên đăng nhập</label>
                            <div class="d-flex justify-content-center">
                                <input type="text" class="form-control w-75 btn-outline-success" placeholder=" username" name="username" id="username" required>
                            </div>
                        </div>

                        <label for="password">Mật khẩu</label>
                        <div class="d-flex justify-content-center">
                            <input class="form-control w-75 btn-outline-success" type="password" placeholder="******" name="password" id="password" required>
                        </div>
                        <label for="password-repeat">Nhập lại mật khẩu</label>
                        <div class="d-flex justify-content-center">
                            <input class="form-control w-75 btn-outline-success" type="password" placeholder="******" name="nhaplaimk" id="password-repeat" required>
                        </div>
                        <div class=" text-center mt-5">
                            <button type="submit" class="btn btn-success mb-5 " name="gui">Đăng ký</button>
                        </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        function validate() {
            var u = document.getElementById("username").value;
            var p1 = document.getElementById("password").value;
            var p2 = document.getElementById("password-repeat").value;

            if (u == "") {
                alert("Vui lòng nhập tên!");
                return false;
            }
            if (p1 == "") {
                alert("Vui lòng nhập mật khẩu!");
                return false;
            }
            if (p2 == "") {
                alert("Vui lòng xác minh mật khẩu!");
                return false;
            }

            alert("Xin hãy điền đúng mật khẩu!")

            return true;
        }
    </script>



    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
</body>

</html>