<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="app/css/bootstrap.min.css">

</head>
<body>
<?php require_once './app/views/nav/nav-admin.php' ?>

    <table class="table table-striped">
        <thead>
            <th>Mã question</th>
            <th>Tên question</th>
            <th>Quiz</th>
            <th>Img</th>
            <th>
            <a href="<?= BASE_URL . 'question/tao-moi'?>">Tạo mới</a>
        </th>
        </thead>
        <tbody>
        <?php foreach($question as $qs): ?>
            <tr>
                <td><?= $qs->id ?></td>
                <td><?= $qs->name ?></td>
                <td><?= $qs->quiz_name ?></td>
                <td><img src="app/img/<?= $qs->img ?>" alt=""></td>
                <td>
                    <a href="<?= BASE_URL . 'question/cap-nhat?id=' . $qs->id ?>">Sửa</a>
                    <a href="<?= BASE_URL . 'question/xoa?id=' . $qs->id ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>