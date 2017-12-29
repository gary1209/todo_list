<?php
    $my_db = mysqli_connect("localhost", "root", "");
 	mysqli_select_db($my_db,"my_db");
 	mysqli_query($my_db,"SET NAMES 'utf8'");
	$title=$_REQUEST["title"];
	$sql = "SELECT * FROM document where title ='$title' ";
	$result = mysqli_query($my_db,$sql);
	$rs = mysqli_fetch_array($result);
	
	//判斷檔案是否錯誤
	if ($_FILES["re_file"]["error"] === UPLOAD_ERR_OK){ 
  	//檢查檔案是否已經存在
  	if (file_exists("refile_upload/" . $re_file)){
   		echo "檔案已存在。<br/>";
  	} else {
		$file = $_FILES["re_file"]["tmp_name"];
		$dest = "refile_upload/" . $re_file;

  	//將檔案移至指定位置
  	  	move_uploaded_file($file, $dest);
 	  }
	} else {
 		echo "錯誤代碼：" . $_FILES["re_file"]["error"] . "<br/>";
	  }
	//存入資料庫
	$sql="UPDATE document SET cmpltDate = '$cmpltdate', closed = '$closed' , 
		  file2 = '$dest' , ps ='$ps' WHERE id = '$sql_id'";
	mysqli_query($my_db, $sql);
	echo "<script>alert('結案成功');</script>";
	header("REFRESH:0;url=user.php");
?>