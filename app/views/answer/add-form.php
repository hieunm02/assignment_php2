<form action="<?= BASE_URL ?>answer/luu-tao-moi" method="POST" enctype="multipart/form-data">
    <div>
        <label for="">Content</label>
        <input type="text" name="content" id=""><br>
        <label for="">Question</label>
        <select name="question_id" id="">
            <?php foreach($question as $ques) { ?>
            <option value="<?= $ques->id ?>"><?= $ques->name ?></option>
            <?php } ?>
        </select>
        <br>
        <label for="">Correct</label>
        <input type="number" name="is_correct" id=""><br>
        <label for="">img</label>
        <input type="file" name="img" id=""><br>
    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>