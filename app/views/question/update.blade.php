@extends('layouts.main')
@section('title', 'Cập nhật câu hỏi')
@section('content')
<form action="{{ BASE_URL . 'question/luu-cap-nhat'}}" method="post" enctype="multipart/form-data">
    <div>
    <input type="hidden" name="id" value="{{ $data['id'] }}">

        <label for="">Tên question</label>
        <input type="text" name="name" value="{{ $data['name'] }}"><br>
        <input type="hidden" name="quiz_id" value="{{$_GET['quiz_id']}}">
        <label for="">Img</label>
        <input type="file" name="img" value="{{ $data['img'] }}">

    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>
@endsection