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
                        <a class="btn btn-secondary" href="<?= BASE_URL . 'question/tao-moi' ?>">Tạo mới</a>

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
                            <a class="btn btn-primary" href="<?= BASE_URL . 'question/cap-nhat?id=' . $qs->id ?>">Sửa</a>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')" href="<?= BASE_URL . 'question/xoa?id=' . $qs->id ?>">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach ?>
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
            <?php for ($i = 1; $i <= $pages; $i++) { ?>
                <li class="page-item"><a class="page-link" href="<?= BASE_URL . 'question?pages=' . $i ?>"><?= $i ?></a></li>
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