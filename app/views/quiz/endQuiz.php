<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../app/css/style.css">
</head>

<body>
    <div class="container">
        <header>
            <a href="<?= BASE_URL ?>"><img src="../app/img/logo-3.png" alt="" class="logo"></a>
            <?php require_once './app/views/nav/index.php'; ?>

        </header>

        <main>
            <div class="content">
                <div class="content-nav">
                    <ul>
                        <li><a href="javascript:history.back()">Quiz</a></li>
                        <li><a href="">Discussion</a></li>
                        <li><a href="">Wiki</a></li>
                        <li><a href="">Progress</a></li>
                    </ul>
                </div>
                <div class="main">

                    <?php

                    use App\Models\Answer;

                    $score = 0;
                    foreach ($_POST['questionId'] as $questionId) {
                        $answer = Answer::findAnswerIdCorrect($questionId);
                        if ($answer->id == $_POST['question_' . $questionId]) {
                            $score++;
                        }
                    };

                    // $_SESSION['score'] = $score;


                    ?>
                    <h2>Bạn làm đúng <?= $score ?>/<?= $_SESSION['countQuestion'] / 2 ?> Câu hỏi</h2><br>
                    <a href="javascript:history.back()" >Quay lại</a><br>

                </div>

            </div>

        </main>

    </div>
</body>

</html>