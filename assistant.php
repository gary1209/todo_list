<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="GaryHsu">
    <!--<link rel="stylesheet" href="assets/css/main.css" /> -->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <title>待處理公文</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
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
            <a class="nav-link" href="assistant.php">顯示全部</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="assis_add_job.php">新增公文</a>
          </li>
        </ul>
        
      </div>
    </nav>



 <!--    <main role="main" class="container">
      <div class="jumbotron">
        <h1>Navbar example</h1>
        <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser's viewport.</p>
        <a class="btn btn-lg btn-primary" href="../../components/navbar/" role="button">View navbar docs &raquo;</a>
      </div>
    </main> -->
    <div id="wrapper" style="margin-top: 60px;">

<?php
  if($_SESSION['username'] != null){
          echo "&nbsp;&nbsp;歡迎您&nbsp;&nbsp;".$_SESSION['username'].'&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">登出</a>';
  }
  else{
    echo "<script>alert('who are you!?'); location.href = 'index.html';</script>";
    // header("Refresh:0;url=index.html");
  }
 ?>
	<?php

	include("mysql.php");
 	mysqli_query($my_db,"SET NAMES 'utf8'");
	
	$sql = "SELECT * FROM document ORDER BY id DESC ";
	$result = mysqli_query($my_db,$sql);
	$num = mysqli_num_rows($result);	
	?>

		<br />
		<div class="col-12 ">
			<div>
				<table class="table table-bordered table-sm">
					<thead class="thead-dark table-hover">
						<tr style="text-align: center;">
							<th>發文單位</th>
							<th>發文字號</th>
							<th>對象姓名</th>
							<th>文件時間</th>
							<th>截止日期</th>
							<th>回覆日期</th>
							<th>是否結案</th>
							<th>發文檔案</th>													
							<th>回覆檔案</th>
							<th>是否開會</th>
							<th>備註</th>	
							<th></th>											
						</tr>
					</thead>
					<tbody>
<?php 
	for ($i=1; $i <=$num ; $i++) {
		$rs = mysqli_fetch_array($result);
	if($rs[8]==1){
		$rs[8]="是";
	}else{
		$rs[8]="否";
	}		
?>	
						<tr>
							<td style="text-align: center;">
								<?php echo $rs[2] ; ?>						
							</td>
							<td style="text-align: center;">
								<input type="hidden" name="title" value="<?php echo $rs[3] ; ?>"/>
								<?php echo $rs[3] ; ?>
							</td>
							<td style="text-align: center;">
								<?php echo $rs[4] ; ?>
							</td>
							<td style="text-align: center;">
								<?php echo $rs[5] ; ?>
							</td>
							<td style="text-align: center;">
								<?php echo $rs[6] ; ?>
							</td>
							<td style="text-align: center;">
								<?php echo $rs[7] ; ?>
							</td>
							<td style="text-align: center;">
								<?php echo $rs[8] ; ?>
							</td>
							<td style="text-align: center;">
								<a href="<?php echo $rs[9]; ?>"  target="_blank" title="文件檔案">
									<img src="images/link_logo.png" style="width: 25px;"/>
								</a>
							</td>
<?php if(!empty($rs[10])){ ?>
							<td style="text-align: center;">
								<a href="<?php echo $rs[10]; ?>"  target="_blank" title="文件檔案">
									<img src="images/link_logo.png" style="width: 25px;"/>
								</a>
							</td>
<?php }else{ ?>
							<td style="text-align: center;">無</td>		
<?php } ?> 
								<td style="text-align: center;">
								<?php echo $rs[11] ; ?>
							</td>
								<td style="text-align: center;">
								<?php echo $rs[12] ; ?>
							</td>
							<form action="assis_change.php" method="POST"> 		
									<td style="text-align: center;">
										<input type="hidden" name="title" value="<?php echo $rs[3] ; ?>"/>
										<input type="submit" value="修改" style="background-color:white;"/>
									</td>
							</form>									
						</tr>						
					</tbody>
				
<?php 
	} 
?>														
				</table>
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
