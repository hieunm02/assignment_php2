<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{BASE_URL}}app/img/{{$_SESSION['avatar']}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">{{$_SESSION['name']}}</a>
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{BASE_URL}}admin" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
    </ul>

    <!-- Môn học -->
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Môn học
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{BASE_URL . 'mon-hoc'}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>


    <!-- Quiz -->
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas ion-folder"></i>
          <p>
            Quiz
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{BASE_URL . 'quiz'}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>

    <!-- Câu hỏi quiz -->
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas ion-help-circled"></i>
          <p>
            Câu hỏi quiz
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{BASE_URL . 'question'}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>

    <!-- tài khoản -->
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas ion-person-stalker"></i>
          <p>
            Tài khoản
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{BASE_URL . 'user'}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>

    <!-- Điểm -->
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas ion-ios-book"></i>
          <p>
            Điểm
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{BASE_URL . 'studentquiz'}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>

  </nav>
  <div class="logout" style="margin-top: 280px; margin-left: 20px;">
    <a href="{{ BASE_URL }}logout">Đăng xuất</a>
  </div>
  <!-- /.sidebar-menu -->
</div>