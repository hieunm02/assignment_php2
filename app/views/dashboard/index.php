
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị</title>
    <!-- CDn icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Bootrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="app/css/admins.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <ion-icon name="menu-outline" id="header-toggle"></ion-icon>
        </div>
        
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="<?= $ADMIN_URL ?>" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Dashboard</span> </a>
                <div class="nav_list">
                    <a href="<?= BASE_URL ?>mon-hoc" class="nav_link">
                        <ion-icon name="grid-outline" class='bx bx-grid-alt nav_icon'></ion-icon>
                        <span class="nav_name">Môn học</span>
                    </a>

                    <a href="<?= BASE_URL ?>quiz" class="nav_link">
                    <ion-icon name="alert-circle-outline" class='bx bx-grid-alt nav_icon'></ion-icon>
                    <span class="nav_name">Quiz</span>
                    </a>

                    <a href="#" class="btn-group nav_link dropright" data-toggle="dropdown">
                        <ion-icon name="person-outline" class='bx bx-user nav_icon'></ion-icon>
                        <span class="nav_name">Tài khoản</span>
                    </a>
    
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= $ADMIN_URL ?>login">Khách hàng</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= $ADMIN_URL ?>//Employee/index.php">Nhân viên</a>
                    </div>

    
                    <a href="<?= BASE_URL ?>question" class="nav_link">
                    <ion-icon name="help-circle-outline" class='bx bx-grid-alt nav_icon'></ion-icon>
                        <span class="nav_name">Câu hỏi quiz</span>
                    </a>
    
                    <a href="<?= BASE_URL ?>answer" class="nav_link">
                    <ion-icon name="checkmark-circle-outline" class='bx bx-grid-alt nav_icon'></ion-icon>
                        <span class="nav_name">Câu trả lời</span>
                    </a>
                    
                    <a href="<?= $ADMIN_URL ?>/Service/index.php" class="nav_link">
                    <i class="fas fa-concierge-bell"></i>
                        <span class="nav_name">Dịch vụ</span>
                    </a>
                    <a href="<?= $ADMIN_URL ?>/News/index.php" class="nav_link">
                        <ion-icon name="newspaper-outline" class='bx bx-folder nav_icon'></ion-icon>
                        <span class="nav_name">Tin tức</span>
                    </a>
    
    
                    <!-- <a href="#" class="nav_link">
                        <ion-icon name="stats-chart-outline" class='bx bx-bar-chart-alt-2 nav_icon'>
                        </ion-icon><span class="nav_name">Thống kê</span>
                    </a> -->
    
                </div>
            </div>
            <a onclick="return sigout()" href="<?= $ADMIN_URL ?>/index.php?sigout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Đăng xuất</span> </a>
        </nav>
    </div>
    
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>Chỉnh sửa website</h4>
        <div class="container">
            <div class="d-flex flex-wrap text-center justify-content-around">

            </div>
        </div>
        <?php
        // $data = select_all_reserver();
        // // echo '<pre>';
        // // var_dump($data);die;
        ?>
        <hr>

    </div>
    <!--Container Main end-->

    </div>

    <script src='app/css/admin.js'></script>
</body>

</html>