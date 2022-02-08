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
        <h2 style="margin-top: 20px;margin-bottom: 20px;">Điểm</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Quiz</th>
                    <th>Điểm</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studentQuiz as $s) : ?>
                    <tr>
                        <td><?= $s->student_id ?></td>
                        <td><?= $s->student_name ?></td>
                        <td><?= $s->quiz_name ?></td>
                        <td><?= $s->score ?></td>
                        <td><a href="<?= BASE_URL . 'studentquiz/reset?id=' . $s->id ?>">Reset</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>