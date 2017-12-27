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
        <form class="form-inline mt-2 mt-md-0" style="margin: 0 0 0 0;">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit" ">搜尋</button>
        </form>
      </div>
    </nav>



 <!--   <main role="main" class="container">
      <div class="jumbotron">
        <h1>Navbar example</h1>
        <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser's viewport.</p>
        <a class="btn btn-lg btn-primary" href="../../components/navbar/" role="button">View navbar docs &raquo;</a>
      </div>
    </main> -->
    <div id="wrapper" style="margin-top: 60px;">

	
	<?php
	/*if($_SESSION['username'] != null){
	        echo "歡迎您&nbsp;&nbsp;".$_SESSION['username'].'<a href="logout.php">登出</a>';
	}
	else{
		echo "<script>alert('who are you!?'); location.href = 'index.html';</script>";
		// header("Refresh:0;url=index.html");
	}*/
	$my_db = mysqli_connect("localhost", "root", "");
 	mysqli_select_db($my_db,"my_db");
 	mysqli_query($my_db,"SET NAMES 'utf8'");
	
	$sql = "SELECT * FROM document ";
	$result = mysqli_query($my_db,$sql);
	$num = mysqli_num_rows($result);
	?>

	
		<div class="col-12 border border-dark">
			<p class="h3" style="text-align: center;">七天內截止公文</p>
		<div>
			<table class="table table-bordered table-sm">
				<thead class="thead-dark table-hover">
					<tr style="text-align: center;">
						<th>發文單位</th>
						<th>發文字號</th>
						<th>對象姓名</th>
						<th>截止日期</th>
						<th>是否開會</th>
						<th>發文檔案</th>														
					</tr>
				</thead>
				<tbody>	
<?php
	//取得今天日期
	$getDate= date("Y-m-d",mktime(0,0,0,date("m"),date("d"),date("Y")));
			
	for ($i=1; $i <=$num ; $i++) { $rs = mysqli_fetch_row($result);
		//計算日期並顯示
		$deadline=date($rs[6]);
		$startdate=strtotime($getDate);
		$enddate=strtotime($deadline);
		$days=round(($enddate-$startdate)/3600/24) ;
			if($days<=7){							
?>						
							
							<tr>
								<td style="text-align: center;"><?php echo $rs[2] ; ?></td>
								<td style="text-align: center;"><?php echo $rs[3] ; ?></td>
								<td style="text-align: center;"><?php echo $rs[4] ; ?></td>
								<td style="text-align: center;"><?php echo $rs[6] ; ?></td>
								<td style="text-align: center;"><?php echo $rs[11] ; ?></td>
								<td style="text-align: center;">
									<a href="<?php echo $rs[9]; ?>"  target="_blank" title="文件檔案">
										<img src="images/link_logo.png" style="width: 25px;"/>
									</a>
								</td>
							</tr>
<?php 
			}
	} 
?>					
				</tbody>
			</table>
	  </div>
	  <div class="border border-dark" style="height: 300px;">
		<p class="h3" style="text-align: center;">處理中公文</p>
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
