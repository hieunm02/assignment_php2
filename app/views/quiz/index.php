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
 
<table class="table table-striped">
    <thead>
        <th>Mã quiz</th>
        <th>Tên quiz</th>
        <th>Subjec_id</th>
        <th>duration_minutes</th>
        <th>start_time</th>
        <th>end_time</th>
        <th>status</th>
        <th>is_shuffle</th>

        <th>
            <a href="<?= BASE_URL . 'quiz/tao-moi'?>">Tạo mới</a>
        </th>
    </thead>
    <tbody>
        <?php foreach($quiz as $quiz): ?>
            <tr>
                <td><?= $quiz->id ?></td>
                <td><?= $quiz->name ?></td>
                <td><?= $quiz->sub_name?></td>
                <td><?= $quiz->duration_minutes ?></td>
                <td><?= $quiz->start_time ?></td>
                <td><?= $quiz->end_time ?></td>
                <td><?= $quiz->status ?></td>
                <td><?= $quiz->is_shuffle ?></td>
                <td>
                    <a href="<?= BASE_URL . 'quiz/cap-nhat?id=' . $quiz->id ?>">Sửa</a>
                    <a href="<?= BASE_URL . 'quiz/xoa?id=' . $quiz->id ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>   
</body>
</html>