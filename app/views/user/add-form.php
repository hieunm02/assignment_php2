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

    <form action="<?= BASE_URL . 'user/luu-tao-moi' ?> " method="POST" enctype="multipart/form-data">
        <div>
            <label for="">Tên</label>
            <input type="text" name="name"><br>
            <label for="">Email</label>
            <input type="email" name="email" id=""><br>
            <label for="">Password</label>
            <input type="password" name="password" id=""><br>
            <label for="">Avatar</label>
            <input type="file" name="avatar" id=""><br>
            <label for="">Quyền</label>
            <select name="role_id" id="">
                <?php foreach ($role as $role) { ?>
                    <option value="<?= $role->id ?>"><?= $role->name ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <button type="submit">Lưu</button>
        </div>
    </form>
</body>

</html>