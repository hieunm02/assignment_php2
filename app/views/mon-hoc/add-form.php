<form action="<?= BASE_URL . 'mon-hoc/luu-tao-moi'?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="">Tên danh mục</label>
        <input type="text" name="name"><br>
        <label for="">Ảnh đại diện</label>
        <input type="FILE" name="avatar">
    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>