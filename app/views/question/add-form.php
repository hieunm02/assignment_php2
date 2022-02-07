<form action="<?= BASE_URL . 'question/luu-tao-moi' ?>" method="POST" enctype="multipart/form-data">
    <div>
        <label for="">Tên question</label>
        <input type="text" name="name" id=""><br>
        <label for="">Quiz</label>
        <select name="quiz_id" id="">
            <?php foreach($quiz as $quiz) { ?>
            <option value="<?=$quiz->id ?>"><?=$quiz->name ?></option>
            <?php }  ?>
        </select><br>
        <label for="">Img</label>
        <input type="file" name="img" id=""><br>

    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>