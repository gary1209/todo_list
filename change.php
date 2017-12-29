<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="GaryHsu">
    <!--<link rel="stylesheet" href="assets/css/main.css" />-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <title>待處理公文</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="">公文回報系統</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="user.php">處理中 <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="finish_list.php">已結案</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="all_list.php">顯示全部</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_job.php">新增公文</a>
          </li>
        </ul>
        <form action="search.php" class="form-inline mt-2 mt-md-0" style="margin: 0 0 0 0;">
          <input class="form-control mr-sm-2" name="title" type="text" placeholder="公文字號搜尋" aria-label="公文字號搜尋" required="required">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">搜尋</button>
        </form>
      </div>
    </nav>



 <!--  <main role="main" class="container">
      <div class="jumbotron">
        <h1>Navbar example</h1>
        <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser's viewport.</p>
        <a class="btn btn-lg btn-primary" href="../../components/navbar/" role="button">View navbar docs &raquo;</a>
      </div>
    </main> -->
    

	
<?php
	/*if($_SESSION['username'] != null){
	        echo "歡迎您&nbsp;&nbsp;".$_SESSION['username'].'<a href="logout.php">登出</a>';
	}
	else{
		echo "<script>alert('who are you!?'); location.href = 'index.html';</script>";
		// header("Refresh:0;url=index.html");
	}*/
	
	include("mysql.php");
 	mysqli_query($my_db,"SET NAMES 'utf8'");
	$title=$_REQUEST["title"];
	$sql = "SELECT * FROM document where title ='$title' ";
	$result = mysqli_query($my_db,$sql);
	$rs = mysqli_fetch_array($result);
?>
	<div id="wrapper" style="margin-top: 60px;">
		<div class="col-12">
			<p class="h3" style="text-align: center;">公文資料</p>
			<div class="col-5 border border-dark" style="margin: 0 auto;">
				<form action="changeok.php" method="POST" enctype="multipart/form-data"> 
					<br />
					<div>發函單位:
						<input type="text" name="unit" value="<?php echo $rs[2] ?>"/>
						  公文字號:
						<input type="text" name="title" value="<?php echo $rs[3] ?>"/>						  
					</div><br />
					<div>對象姓名:
						<input type="text" name="name" value="<?php echo $rs[4] ?>"/>
						  發文日期:
						<input type="text" name="startdate" value="<?php echo $rs[5] ?>"/>						 
					</div><br />
					<div>截止日期:
						<input type="text" name="deadline" value="<?php echo $rs[6] ?>"/>
						  是否開會:
						<input type="text" name="meeting" value="<?php echo $rs[11] ?>"/>						  
					</div><br />
					<div>備註:<br />
						<textarea name="ps" style="width: 550px; height: 100px;"><?php echo $rs[12]; ?></textarea>
						<input type="hidden" name="sql_id" value="<?php echo $rs[0] ; ?>"/>
					</div><br />
					<div>
						<input type="submit" name="1" value="修改"/>
					</div>
					</div>
				</form>
			</div>		
		</div>
	</div>


    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>