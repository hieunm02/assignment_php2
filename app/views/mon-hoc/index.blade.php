@extends('layouts.main')
@section('title', 'Danh sách môn học')
@section('content')

        <table class="table table-striped">
            <thead>
                <th>Mã môn</th>
                <th>Tên môn</th>
                <th>
                    <a class="btn btn-secondary" href="{{ BASE_URL . 'mon-hoc/tao-moi' }}">Tạo mới</a>
                </th>
            </thead>
            <tbody>
                @foreach ($subjects as $sub)
                    <tr>
                        <td>{{ $sub->id }}</td>
                        <td>{{ $sub->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ BASE_URL . 'mon-hoc/'.$sub->id.'/cap-nhat'."/$sub->name" }}">Sửa</a>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ BASE_URL . 'mon-hoc/xoa/' . $sub->id }}">Xóa</a>
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
            <?php for ($i = 1; $i <= $pages; $i++) { ?>
                <li class="page-item"><a class="page-link" href="{{ BASE_URL . 'mon-hoc?pages=' . $i }}">{{ $i }}</a></li>
            <?php } ?>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection