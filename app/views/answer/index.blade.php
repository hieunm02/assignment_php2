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
    <div style="padding: 20px;">
        <h2 style="margin-top: 20px;margin-bottom: 20px;">Đáp án</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Câu hỏi</th>
                    <th>Đáp án</th>
                    <th>Đúng/sai</th>
                    <th>Ảnh</th>
                    <th>
                        <a class="btn btn-secondary" href="{{ BASE_URL . 'answer/tao-moi' }}">Tạo mới</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($answer as $ans)
                    <tr>
                        <td>{{ $ans->id }}</td>
                        <td>{{ $ans->qs_name }}</td>
                        <td>{{ $ans->content }}</td>
                        <td><?php 
                                if($ans->is_correct == 1){
                                    echo "Đáp án <span style='color:red'>Sai</span>";
                                }else{
                                    echo "Đáp án <span style='color:green'>Đúng</span>";
                                }
                        ?></td>
                        <td>{{ $ans->img }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ BASE_URL . 'answer/' . $ans->id . '/cap-nhat'  }}">Sửa</a>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ BASE_URL . 'answer/xoa/' . $ans->id }}">Xóa</a>
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
            @for($i = 1; $i <= $pages; $i++)
                <li class="page-item"><a class="page-link" href="{{ BASE_URL . 'answer?pages=' . $i }}">{{ $i }}</a></li>
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