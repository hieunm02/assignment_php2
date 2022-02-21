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
    <?php require_once './app/views/nav/nav-admin.blade.php'?>

    <div style="padding: 20px;">
        <h2 style="margin-top: 20px;margin-bottom: 20px;">Quiz</h2>

        <table class="table table-striped">
            <thead>
                <th>Mã quiz</th>
                <th>Tên quiz</th>
                <th>Môn học</th>
                <th>Thời gian làm bài</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th>status</th>
                <th>Trộn</th>

                <th>
                    <a class="btn btn-secondary" href="{{ BASE_URL . 'quiz/tao-moi' }}">Tạo mới</a>
                </th>
            </thead>
            <tbody>
                @foreach($quiz as $quiz)
                    <tr>
                        <td>{{ $quiz->id }}</td>
                        <td>{{ $quiz->name }}</td>
                        <td>{{ $quiz->sub_name }}</td>
                        <td>{{ $quiz->duration_minutes }}</td>
                        <td>{{ $quiz->start_time }}</td>
                        <td>{{ $quiz->end_time }}</td>
                        <td>{{ $quiz->status }}</td>
                        <td><?php
                            if($quiz->is_shuffle == 1){
                                echo "không";
                            }else{
                                echo "Có";
                            }
                        ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ BASE_URL . 'quiz/' . $quiz->id . '/cap-nhat' }}">Sửa</a>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ BASE_URL . 'quiz/xoa/' . $quiz->id }}">Xóa</a>
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
            @for ($i = 1; $i <= $pages; $i++)
                <li class="page-item"><a class="page-link" href="{{ BASE_URL . 'quiz?pages=' . $i }}">{{ $i }}</a></li>
            @endfor
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</body>

</html>