<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ BASE_URL }}app/css/bootstrap.min.css">


</head>

<body>
    <?php require_once './app/views/nav/nav-admin.php' ?>
    <div style="padding: 20px;">

        <h2 style="margin-top: 20px;margin-bottom: 20px;">Tài khoản</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mã user</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Quyền</th>
                    <th>Avatar</th>
                    <th>
                        <a class="btn btn-secondary" href="{{ BASE_URL . 'user/tao-moi' }}">Tạo mới</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($users as $u) 
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->password }}</td>
                        <td>{{ $u->role_id }}</td>
                        <td><img src="app/img/{{ $u->avatar }}" alt="" width="100px" height="100px"></td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ BASE_URL . 'user/xoa/' . $u->id }}">Xóa</a>
                            <a class="btn btn-primary" href="{{ BASE_URL . 'user/'. $u->id .'/cap-nhat'  }}">Cập nhật</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- phân trang -->
    <nav aria-label="Page navigation example" style="float: right;margin-right: 100px;">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for ($i = 1; $i <= $pages; $i++) {?>
                <li class="page-item"><a class="page-link" href="{{ BASE_URL . 'user?pages=' . $i }}">{{$i }}</a></li>
            <?php } ?>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</body>

</html>