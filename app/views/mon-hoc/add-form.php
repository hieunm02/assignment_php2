<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>app/css/bootstrap.min.css">
</head>

<body>

    <form action="<?= BASE_URL . 'mon-hoc/luu-tao-moi' ?>" method="post" enctype="multipart/form-data">
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
</body>

</html>