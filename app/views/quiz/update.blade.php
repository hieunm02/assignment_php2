@extends('layouts.main')
@section('content')
<form action="{{ BASE_URL . 'quiz/luu-cap-nhat'}}" method="post">
    <div>
        <input type="hidden" name="id" value="{{ $data['id'] }}">
        <label for="">Tên quiz</label>
        <input type="text" name="name" value="{{ $data['name'] }}"><br>
        <input type="hidden" name="subject_id" value="{{$_GET['subject_id']}}">
        <label for="">Thời gian làm bài</label>
        <input type="text" name="duration_minutes" value="{{ $data['duration_minutes'] }}"><br>
        <label for="">Ngày bắt đầu</label>
        <input type="date" name="start_time" value="{{ $data['start_time'] }}"><br>
        <label for="">Ngày kết thúc</label>
        <input type="date" name="end_time" value="{{ $data['end_time'] }}"><br>
        <label for="">Trạng thái</label>
        <input type="text" name="status" value="{{ $data['status'] }}"><br>
        <label for="">is_shuffle</label>
        <input type="text" name="is_shuffle" value="{{ $data['is_shuffle'] }}"><br>


    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>
@endsection