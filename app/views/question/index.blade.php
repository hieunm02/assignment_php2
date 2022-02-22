@extends('layouts.main')
@section('title', 'Danh sách câu hỏi')
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
                                <div class="form-group">
                                    <label for="">Quiz</label>
                                    <select id="select_quiz" name="quiz_id" class="form-control">
                                        @foreach ($quiz as $item)
                                            <option {{$item->id == $quizId ? "selected" : "" }} value="{{$item->id}}">{{$item->name}}</option>
                                        
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
        <table class="table table-striped">
            <thead>
                <th>Mã câu hỏi</th>
                <th>Nội dung câu hỏi</th>
                <th>Ảnh</th>
                <th>Chi tiết</th>

                <th>
                    <?php
                        if(isset($_GET['quiz_id'])){
                            $_GET['quiz_id'] = $_GET['quiz_id'];
                        }else{
                            $_GET['quiz_id'] = 3;
                        }
                    ?>
                <a class="btn btn-secondary" href="{{ BASE_URL . 'question/tao-moi?id=' . $_GET['quiz_id'] }}">Tạo mới</a>
                </th>
            </thead>
            <tbody>
                @foreach($question as $q)
                    <tr>
                        <td>{{ $q->id }}</td>
                        <td>{{ $q->name }}</td>
                        <td>{{ $q->img }}</td>
                        <td><a href="{{BASE_URL . 'answer?question_id=' . $q->id}}"><i class="nav-icon fas ion-eye"></i></a></td>
                        <td>
                            <a class="btn btn-primary" href="{{ BASE_URL . 'question/' . $q->id . '/cap-nhat?quiz_id=' . $_GET['quiz_id']}}">Sửa</a>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ BASE_URL . 'question/xoa/' . $q->id }}">Xóa</a>
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
                <li class="page-item"><a class="page-link" href="{{ BASE_URL . 'question?pages=' . $i }}">{{ $i }}</a></li>
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
    $('#select_quiz').on('change', function(){
        $('form#search_form').trigger('submit');
    })
    $('#select_subject').on('change', function(){
        $('form#search_form').trigger('submit');
    })
</script>
@endsection    
