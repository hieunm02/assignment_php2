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
    <?php require_once './app/views/nav/nav-admin.php' ?>

    <div style="padding: 20px;">
        <h2 style="margin-top: 20px;margin-bottom: 20px;">Môn học</h2>
        <table class="table table-striped">
            <thead>
                <th>Mã môn</th>
                <th>Tên môn</th>
                <th>
                    <a href="<?= BASE_URL . 'mon-hoc/tao-moi' ?>">Tạo mới</a>
                </th>
            </thead>
            <tbody>
                <?php foreach ($subjects as $sub) : ?>
                    <tr>
                        <td><?= $sub->id ?></td>
                        <td><?= $sub->name ?></td>
                        <td>
                            <a href="<?= BASE_URL . 'mon-hoc/cap-nhat?id=' . $sub->id ?>">Sửa</a>
                            <a href="<?= BASE_URL . 'mon-hoc/xoa?id=' . $sub->id ?>">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>