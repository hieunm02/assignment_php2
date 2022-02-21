<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ BASE_URL }}app/css/bootstrap.min.css">



</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #007BFF;color:white">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active mr-3">
      <a class="navbar-brand" href="{{ BASE_URL }}mon-hoc">Môn học</a>
      </li>
      <li class="nav-item active mr-3">
      <a class="navbar-brand" href="{{ BASE_URL }}quiz">quiz</a>
      </li>
      <li class="nav-item active mr-3">
      <a class="navbar-brand" href="{{ BASE_URL }}question">Câu hỏi quiz</a>
      </li>
      <li class="nav-item active mr-3">
      <a class="navbar-brand" href="{{ BASE_URL }}answer">Đáp án</a>
      </li>
      <li class="nav-item active mr-3">
      <a class="navbar-brand" href="{{ BASE_URL }}user">Tài khoản</a>
      </li>
      <li class="nav-item active mr-3">
      <a class="navbar-brand" href="{{ BASE_URL }}studentquiz">Điểm</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</body>
</html>