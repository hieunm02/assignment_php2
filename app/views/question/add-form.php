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

    <form action="<?= BASE_URL . 'question/luu-tao-moi' ?>" method="POST" enctype="multipart/form-data">
        <div>
            <label for="">Tên question</label>
            <input type="text" name="name" id=""><br>
            <label for="">Quiz</label>
            <select name="quiz_id" id="">
                <?php foreach ($quiz as $quiz) { ?>
                    <option value="<?= $quiz->id ?>"><?= $quiz->name ?></option>
                <?php }  ?>
            </select><br>
            <label for="">Img</label>
            <input type="file" name="img" id=""><br>

        </div>
        <div>
            <button type="submit">Lưu</button>
        </div>
    </form>
</body>

</html>