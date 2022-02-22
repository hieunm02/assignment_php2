@extends('layouts.main')
@section('title', 'Tạo mới câu hỏi')
@section('content')
<form action="{{ BASE_URL . 'question/luu-tao-moi' }}" method="POST" enctype="multipart/form-data">
    <div>
        <label for="">Tên question</label>
        <input type="text" name="name" id=""><br>
        <label for="">Quiz</label>
        <input type="hidden" name="quiz_id" value="{{$_GET['id']}}">
        <label for="">Img</label>
        <input type="file" name="img" id=""><br>

    </div>
    <div>
        <br>
        <button onclick="alert('Thêm thành công')" type="submit">Lưu</button>
    </div>
</form>
</body>

</html>
@endsection