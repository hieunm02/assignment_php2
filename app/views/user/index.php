<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app/css/bootstrap.min.css">


</head>

<body>
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
                    <a href="<?= BASE_URL . 'user/tao-moi' ?>">Tạo mới</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $u) { ?>
                <tr>
                    <td><?= $u->id ?></td>
                    <td><?= $u->name ?></td>
                    <td><?= $u->email ?></td>
                    <td><?= $u->password ?></td>
                    <td><?= $u->role_id ?></td>
                    <td><img src="app/img/<?= $u->avatar ?>" alt="" width="100px" height="100px"></td>
                    <td>
                        <a href="<?= BASE_URL . 'user/xoa?id=' . $u->id ?>">Xóa</a>
                        <a href="<?= BASE_URL . 'user/cap-nhat?id=' . $u->id?>">Cập nhật</a>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>