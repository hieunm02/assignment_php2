@extends('layouts.main')
@section('content')
    <form action="{{ BASE_URL }}answer/luu-tao-moi" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="question_id" value="{{ $_GET['question_id'] }}"/>

        <div >
            <label for="">Nội dung : </label>
            <input type="text" name="content" id=""><br>
            <label for="">Đúng/sai : </label>
            <input type="radio" name="is_correct" value="1">sai
            <input type="radio" name="is_correct" value="2">đúng <br>
            <label for="">img</label>
            <input type="file" name="img" id=""><br>
        </div>

 
            <br>
            <button onclick="alert('Thêm thành công')" type="submit">Lưu</button>
            <a href="javascript:history.back()">Quay lại</a>
        </div>
    </form>
    @endsection
