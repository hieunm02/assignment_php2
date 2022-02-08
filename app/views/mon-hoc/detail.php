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
            
            <?php require_once './app/views/nav/index.php' ?>

        </header>

        <main>
            <div class="content">
                <div class="content-nav">
                    <ul>
                        <li><a href="">Quiz</a></li>
                        <li><a href="">Discussion</a></li>
                        <li><a href="">Wiki</a></li>
                        <li><a href="">Progress</a></li>
                    </ul>
                </div>
                <div class="main">
                    <div class="name-quiz">
                        <h2 style="text-transform: uppercase; font-family: Arial, Helvetica, sans-serif;"><?= $data['name'] ?></h2>
                    </div>
                    <div class="list-quiz">
                        <ul>
                            <?php foreach($quiz as $quiz) {  ?>
                            <li><a href="<?= BASE_URL ?>quiz/lam-bai?id=<?= $quiz->id ?>" class="quiz"><?= $quiz->name ?></a> : Điểm <?= $quiz->getStudentScore() ?></li><br>

                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </main>

    </div>
</body>

</html>