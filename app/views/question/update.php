<form action="<?= BASE_URL . 'question/luu-cap-nhat'?>" method="post" enctype="multipart/form-data">
    <div>
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <label for="">Tên question</label>
        <input type="text" name="name" value="<?= $data['name'] ?>"><br>
        <label for="">Quiz</label>
        <select name="quiz_id" id="">
            <?php foreach($quiz as $quiz) { ?>
            <option value="<?=$quiz->id ?>"><?=$quiz->name ?></option>
            <?php }  ?>
        </select><br>
        <label for="">Img</label>
        <input type="file" name="img" value="<?= $data['img'] ?>">

    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>