<nav>
    <ul>
        <li><a href="<?= BASE_URL ?>">Các môn học</a></li>
        <li><a href="">Khám phá</a></li>
        <?php if ($role == "1") { ?>
            <li><a href="<?= BASE_URL ?>admin">Quản trị</a></li>
        <?php } ?>
        <li style="float:right"><a href="<?= BASE_URL ?>user/info">
                <?= "Xin chào! " . $info ?>
            </a></li>
    </ul>
</nav>