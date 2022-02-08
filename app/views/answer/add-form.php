<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../app/css/bootstrap.min.css">
</head>

<body>

    <form action="<?= BASE_URL ?>answer/luu-tao-moi" method="POST" enctype="multipart/form-data">
        <div>
            <h3>Chọn câu hỏi</h3>
            <select name="question_id" id="">
                <?php foreach ($question as $ques) { ?>
                    <option value="<?= $ques->id ?>"><?= $ques->name ?></option>
                <?php } ?>
            </select>
        </div>
        <hr>

<!-- đáp án 1  -->
        <div style="float: left;margin-right: 30px;">
            <h3>Đáp án 1</h3>
            <label for="">Content</label>
            <input type="text" name="content" id=""><br>
            <br>
            <label for="">Correct</label>
            <input type="number" name="is_correct" id=""><br>
            <label for="">img</label>
            <input type="file" name="img" id=""><br>
        </div>

        <!-- đáp án 2 -->
        <div style="float: left;margin-right: 30px;">
            <h3>Đáp án 2</h3>
            <label for="">Content</label>
            <input type="text" name="content2" id=""><br>
            <br>
            <label for="">Correct</label>
            <input type="number" name="is_correct2" id=""><br>
            <label for="">img</label>
            <input type="file" name="img2" id=""><br>
        </div>

        <!-- đáp án 3 -->
        <div style="float: left;margin-right: 30px;">
            <h3>Đáp án 3</h3>
            <label for="">Content</label>
            <input type="text" name="content3" id=""><br>
            <br>
            <label for="">Correct</label>
            <input type="number" name="is_correct3" id=""><br>
            <label for="">img</label>
            <input type="file" name="img3" id=""><br>
        </div>

        <!-- đáp án 4 -->
        <div>
            <h3>Đáp án 4</h3>
            <label for="">Content</label>
            <input type="text" name="content4" id=""><br>
            <br>
            <label for="">Correct</label>
            <input type="number" name="is_correct4" id=""><br>
            <label for="">img</label>
            <input type="file" name="img4" id=""><br>
        </div>
        <div>
            <br>
            <button type="submit">Lưu</button>
        </div>
    </form>
</body>

</html>