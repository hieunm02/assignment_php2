<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app/css/style.css">
</head>

<body>
    <div class="container">
        <header>
            <a href="http://localhost/WEB3014/asm1/"><img src="app/img/logo-3.png" alt="" class="logo"></a>
            
            <?php require_once './app/views/nav/index.php' ?>

        </header>

        <main>
                <div class="product">
                <?php foreach ($subject as $sub) { ?>
                    <div class="product__item">
                        <div class="product-header">
                            <div class="product-button">
                                <a href="mon-hoc/<?= $sub->id ?>/chi-tiet/<?= $sub->name ?>"><button type="submit">Làm Quiz</button></a>
                            </div>
                            <div class="product-image">
                                <img src="app/img/<?= $sub->avatar ?>" alt="" class="image">
                            </div>

                        </div>

                        <div class="info">
                            <h3>Mã môn: <?= $sub->id ?></h3>
                            <a href="" class="info-name"><?= $sub->name ?></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>

    </div>
</body>

</html>