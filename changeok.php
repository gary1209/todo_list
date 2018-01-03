<?php
    //與資料庫連線
 	include("mysql.php");
 	mysqli_query($my_db,"SET NAMES 'utf8'");

	//獲取變數
	$unit=$_REQUEST["unit"];
	$title=$_REQUEST["title"];
	$name=$_REQUEST["name"];
	$startdate=$_REQUEST["startdate"];
	$deadline=$_REQUEST["deadline"];
	$meeting=$_REQUEST["meeting"];
	$ps=$_REQUEST["ps"];
	$sql_id=$_REQUEST["sql_id"];
	//搜尋資料庫並存入
	$sql="UPDATE document SET unit = '$unit', title = '$title' , 
		    name = '$name' , startdate = '$startdate' , deadline = '$deadline' , meeting = '$meeting' ,
		    ps = '$ps' WHERE id = '$sql_id'";
	mysqli_query($my_db, $sql);
	
	echo "<script>alert('修改成功');</script>";
	header("REFRESH:0;url=user.php");
	
?>    