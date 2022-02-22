@extends('layouts.main')
@section('title', 'Danh sách tài khoản')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Mã user</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Password</th>
            <th>Quyền</th>
            <th>Avatar</th>
            <th>
                <a class="btn btn-secondary" href="{{ BASE_URL . 'user/tao-moi' }}">Tạo mới</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $u)
        <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->password }}</td>
            <td>
                <?php
                if( $u->role_id == 1){
                    echo "<span style='color:red'>Giáo viên</span>";
                }else{
                    echo "<span style='color:green'>Sinh viên</span>";
                }
                ?>
                </td>
            <td><img src="app/img/{{ $u->avatar }}" alt="" width="100px" height="100px"></td>
            <td>
                <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ BASE_URL . 'user/xoa/' . $u->id }}">Xóa</a>
                <a class="btn btn-primary" href="{{ BASE_URL . 'user/'. $u->id .'/cap-nhat'  }}">Cập nhật</a>

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
            <li class="page-item"><a class="page-link" href="{{ BASE_URL . 'user?pages=' . $i }}">{{$i }}</a></li>
        <?php } ?>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
@endsection