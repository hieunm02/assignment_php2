<form action="{{ BASE_URL . 'mon-hoc/luu-cap-nhat'}}" method="post" enctype="multipart/form-data">
    <div>
        <label for="">Tên danh mục</label>
        <input type="hidden" name="id" value="{{ $data['id'] }}">
        <input type="text" name="name" value="{{ $data['name'] }}"><br>
        <label for="">Avatar</label>
        <input type="file" name="avatar">

    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>