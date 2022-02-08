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
            <tr>
                <th>ID</th>
                <th>Content</th>
                <th>Question_id</th>
                <th>is_correct</th>
                <th>img</th>
                <th>
                    <a href="<?= BASE_URL . 'answer/tao-moi' ?>">Tạo mới</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($answer as $ans) { ?>
                <tr>
                    <td><?= $ans->id ?></td>
                    <td><?= $ans->content ?></td>
                    <td><?= $ans->question_id ?></td>
                    <td><?= $ans->is_correct ?></td>
                    <td><?= $ans->img ?></td>
                    <td>
                    <a href="<?= BASE_URL . 'answer/cap-nhat?id=' . $ans->id ?>">Sửa</a>
                    <a href="<?= BASE_URL . 'answer/xoa?id=' . $ans->id ?>">Xóa</a>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>