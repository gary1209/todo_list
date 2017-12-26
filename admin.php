<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="GaryHsu">
    <link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <title>管理者頁面</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
  </head>
  <?php
  if($_SESSION['username'] != null){
          echo "歡迎您&nbsp;&nbsp;".$_SESSION['username'].'<a href="logout.php">登出</a>';
  }
  else{
    echo "<script>alert('who are you!?'); location.href = 'index.html';</script>";
    // header("Refresh:0;url=index.html");
  }
  ?>



  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="">管理者頁面</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="admin.php">新增使用者 <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_management.php">使用者管理</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">顯示全部</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">新增公文</a>
          </li> -->
        </ul>
        <form class="form-inline mt-2 mt-md-0" style="margin: 0 0 0 0;">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-success my-2 my-sm-0" type="submit">搜尋</button>
        </form>
      </div>
    </nav>
    <div id="wrapper" style="margin-top: 60px;">

  <?php
  if($_SESSION['username'] != null){
          echo "歡迎您&nbsp;&nbsp;".$_SESSION['username'].'<a href="logout.php">登出</a>';
  }
  else{
    echo "<script>alert('who are you!?'); location.href = 'index.html';</script>";
    // header("Refresh:0;url=index.html");
  }
  ?>
 

  <section id="main" >
    <h2>新增使用者</h2>
            <!-- <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
            <hr >
            <form method="post" action="register_finish.php">
              <label for="inputName" class="sr-only">Name</label>
              <input type="name" name="name" id="inputName" class="form-control" placeholder="Name" required autofocus><br>
              <label for="inputEmail" class="sr-only">Email</label>
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus><br>
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required><br>
              <input type="password" name="password2" id="inputPassword2" class="form-control" placeholder="repeat your Password" required><br>
              <div class="field">
              <input type="checkbox" id="human" name="human" /><label for="human">I'm not a robot</label>
              </div>
              <button style="width:85px;font-size: 14px;" class="btn" type="submit">註冊</button>
            </form>
            <hr />
    
    
  </section>
  </div>


    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
