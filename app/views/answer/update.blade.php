@extends('layouts.main')
@section('content')
<form action="{{ BASE_URL . 'answer/luu-cap-nhat'}}" method="post" enctype="multipart/form-data">
    <div>
        <label for="">Đáp án</label>
        <input type="hidden" name="id" value="{{ $data['id'] }}">
        <input type="text" name="content" value="{{ $data['content'] }}"><br>
        <label for="">Đúng/sai</label>
        <input type="radio" name="is_correct" value="1">Sai
        <input type="radio" name="is_correct" value="2">Đúng <br>
        <label for="">Ảnh</label>
        <input type="file" name="img">

    </div>
    <div>
        <button type="submit">Lưu</button>
        <a href="javascript:history.back()">Quay lại</a>
    </div>
</form>
@endsection