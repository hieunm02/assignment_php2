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
        <h2 style="margin-top: 20px;margin-bottom: 20px;">Điểm</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Tên quiz</th>
                    <th>Điểm</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentQuiz as $s)
                    <tr>
                        <td>{{ $s->student_id }}</td>
                        <td>{{ $s->us_name }}</td>
                        <td>{{ $s->q_name }}</td>
                        <td>{{ $s->score }}</td>
                        <td><a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn reset?')" href="{{ BASE_URL . 'studentquiz/reset/' . $s->id }}">Reset</a></td>
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
            <?php for ($i = 1; $i <= $pages; $i++) { ?>
                <li class="page-item"><a class="page-link" href="{{ BASE_URL . 'studentquiz?pages=' . $i }}">{{ $i }}</a></li>
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