@extends('layouts.main')
@section('title', 'Danh sách Quiz')
@section('content')
<form action="{{ BASE_URL . 'quiz/luu-tao-moi' }}" method="post">
    <div>
        <label for="">Tên Quiz</label>
        <input type="text" name="name"><br>
        <input type="hidden" name="subject_id" value="{{$_GET['id']}}">
        <label for="">Thời gian làm bài</label>
        <input type="number" name="duration_minutes"><br>
        <label for="">Ngày bắt đầu</label>
        <input type="date" name="start_time"><br>
        <label for="">Ngày kết thúc</label>
        <input type="date" name="end_time"><br>
        <label for="">Trạng thái</label>
        <input type="number" name="status"><br>
        <label for="">is_shuffle</label>
        <input type="number" name="is_shuffle"><br>

    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>
@endsection