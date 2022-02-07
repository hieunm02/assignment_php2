<form action="<?= BASE_URL . 'user/luu-cap-nhat' ?>" method="POST" enctype="multipart/form-data">
<div>
    <input type="hidden" name="id" id="" value="<?= $user['id'] ?>">
    <label for="">Tên</label>
    <input type="text" name="name" id="" value="<?= $user['name'] ?>"><br>
    <label for="">Email</label>
    <input type="email" name="email" id="" value="<?= $user['email'] ?>"><br>
    <label for="">Password</label>
    <input type="password" name="password" id="" value="<?= $user['password'] ?>"><br>
    <label for="">Avatar</label>
    <input type="file" name="avatar" id="" value="<?= $user['avatar'] ?>"><br>
    <label for="">Quyền</label>
    <select name="role_id" id="">
        <?php foreach($role as $r) { ?>
        <option value="<?= $r->id ?>"><?= $r->id ?>:<?= $r->name ?></option>
        <?php } ?>
    </select>

</div>
<div>
    <button type="submit">Lưu</button>
</div>
</form>