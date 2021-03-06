<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ BASE_URL }}app/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ BASE_URL }}app/css/bootstrap.min.css">
    

</head>

<body>
    <div class="container" style="width:100%;">
        <header style="height: 77px; padding:30px 0;">
            <a href="{{ BASE_URL }}"><img src="{{ BASE_URL }}app/img/logo-3.png" alt="" class="logo" ></a>

            <?php require_once './app/views/nav/index.php'; ?>

        </header>

        <main>
            <div class="info">
                <div class="info-avatar">
                    <img src="../app/img/{{ $avatar }}" alt="" class="avatar">
                    <a onclick="$('#profile_edit').toggle();" id="btn_profile" href="#profile_edit" class="btn btn-primary">Chỉnh sửa thông tin cá nhân</a><br><br>
                    <a href="{{ BASE_URL }}logout" class="btn btn-primary">Đăng xuất</a>

                </div>

            </div>
            <div id="profile_edit" style="display:none" class="container mt-5">
                <h2 class="text-center">Cập nhật tài khoản</h2>
                <form class="p-5" action="{{ BASE_URL }}user/profile-edit" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id" id="" value="{{ $id }}">
                        <label>Họ tên</label>
                        <input type="text" name="name" value="{{ $info }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                    <div class="form-group">
                        <label>Ảnh nền</label>
                        <input type="file" class="form-control" name="avatar">
                    </div>

                    <input type="submit" class="btn btn-primary" value="cập nhật">
                </form>
            </div>
        </main>

    </div>
</body>

</html>