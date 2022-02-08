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
        <h2 style="margin-top: 20px;margin-bottom: 20px;">Câu hỏi Quiz</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mã question</th>
                    <th>Tên question</th>
                    <th>Quiz</th>
                    <th>Img</th>
                    <th>
                        <a href="<?= BASE_URL . 'question/tao-moi' ?>">Tạo mới</a>

                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($question as $qs) : ?>
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
    </div>
</body>

</html>