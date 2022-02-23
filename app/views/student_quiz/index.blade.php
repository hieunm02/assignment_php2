@extends('layouts.main')
@section('title', 'Danh sách tài khoản')
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
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Điểm</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentQuiz as $s)
                    <tr>
                        <td>{{ $s->student_id }}</td>
                        <td>{{ $s->us_name }}</td>
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
@endsection
@section('page-script')
<script>
    $('#select_subject').on('change', function(){
        $('form#search_form').trigger('submit');
    })
</script>
<script>
    $('#select_quiz').on('change', function(){
        $('form#search_form').trigger('submit');
    })
</script>
@endsection   