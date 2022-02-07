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
        <?php foreach($role as $role) { ?>
        <option value="<?= $role->id ?>"><?= $role->name ?></option>
        <?php } ?>
    </select>
</div>
<div>
    <button type="submit">Lưu</button>
</div>
</form>