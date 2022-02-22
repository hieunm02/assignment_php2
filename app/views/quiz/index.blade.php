@extends('layouts.main')
@section('title', 'Danh sách Quiz')
@section('content')
<form id="search_form" action="" method="get">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Môn học</label>
                                    <select id="select_subject" name="subject_id" class="form-control">
                                        @foreach ($subjects as $item)
                                            <option {{$item->id == $subjectId ? "selected" : "" }} value="{{$item->id}}">{{$item->name}}</option>
                                        
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
        <table class="table table-striped">
            <thead>
                <th>Mã quiz</th>
                <th>Tên quiz</th>
                <th>Thời gian làm bài</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th>status</th>
                <th>Trộn</th>
                <th>
                    <?php
                        if(isset($_GET['subject_id'])){
                            $_GET['subject_id'] = $_GET['subject_id'];
                        }else{
                            $_GET['subject_id'] = 1;
                        }
                    ?>
                <a class="btn btn-secondary" href="{{ BASE_URL . 'quiz/tao-moi?id=' . $_GET['subject_id'] }}">Tạo mới</a>
                </th>
            </thead>
            <tbody>
                @foreach($quizs as $quizs)
                    <tr>
                        <td>{{ $quizs->id }}</td>
                        <td>{{ $quizs->name }}</td>
                        <td>{{ $quizs->duration_minutes }}</td>
                        <td>{{ $quizs->start_time }}</td>
                        <td>{{ $quizs->end_time }}</td>
                        <td>{{ $quizs->status }}</td>
                        <td><?php
                            if($quizs->is_shuffle == 1){
                                echo "không";
                            }else{
                                echo "Có";
                            }
                        ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ BASE_URL . 'quiz/' . $quizs->id . '/cap-nhat?subject_id=' . $_GET['subject_id']}}">Sửa</a>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ BASE_URL . 'quiz/xoa/' . $quizs->id }}">Xóa</a>
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


@endsection    
@section('page-script')
<script>
    $('#select_subject').on('change', function(){
        $('form#search_form').trigger('submit');
    })
</script>
@endsection    
