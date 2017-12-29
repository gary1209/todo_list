<?php
	//與資料庫連線
 	include("mysql.php");
 	mysqli_query($my_db,"SET NAMES 'utf8'");
	
	//獲取HTML資料並存入變數
    $unit=$_REQUEST["unit"];
	$startdate_year=$_REQUEST["startdate_year"];
	$startdate_month=$_REQUEST["startdate_month"];
	$startdate_day=$_REQUEST["startdate_day"];
	$title=$_REQUEST["title"];
	$name=$_REQUEST["name"];
	$meeting=$_REQUEST["meeting"];
	$Deadline_year=$_REQUEST["Deadline_year"];
	$Deadline_month=$_REQUEST["Deadline_month"];
	$Deadline_day=$_REQUEST["Deadline_day"];
	$ps=$_REQUEST["ps"];
	$unit_file=$_FILES["unit_file"]["name"]; 
	//判斷檔案是否錯誤
	if ($_FILES["unit_file"]["error"] === UPLOAD_ERR_OK){ 
  	//檢查檔案是否已經存在
  	if (file_exists("upload/" . $unit_file)){
   	 echo "檔案已存在。<br/>";
  	} else {
  	  $file = $_FILES["unit_file"]["tmp_name"];
  	  $dest = "upload/" . $unit_file;

  	  //將檔案移至指定位置
  	  move_uploaded_file($file, $dest);
 	  }
	} else {
 		echo "錯誤代碼：" . $_FILES["unit_file"]["error"] . "<br/>";
	  }
	//存入資料庫
	$unit_file="upload/" . $unit_file;
	if(empty($Deadline_year) && empty($Deadline_month) && empty($Deadline_day)){
		$sql="INSERT INTO document (unit , title , name , startdate , file1 , meeting  , ps)
						VALUES ('$unit' , '$title' , '$name' , '$startdate_year-$startdate_month-$startdate_day' , 
								'$unit_file' , '$meeting' , '$ps')";
	}else{
	
	$sql="INSERT INTO document (unit , title , name , startdate , Deadline , file1 , meeting , ps)
						VALUES ('$unit' , '$title' , '$name' , '$startdate_year-$startdate_month-$startdate_day' , 
								'$Deadline_year-$Deadline_month-$Deadline_day' , '$unit_file' , '$meeting' , '$ps')";
	}
	mysqli_query($my_db, $sql);
	echo "<script>alert('儲存成功');</script>";
	header("REFRESH:0;url=user.php");
?>