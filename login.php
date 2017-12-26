<?php session_start(); ?>

<?php

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];

if ($email == '' || $password == ''){  // 沒登入就想進來，重新導回登入頁面
	header('Location: index.html');
}
else{  // 合法登入
	include("mysql.php");
	//搜尋資料庫資料
	$sql = "SELECT * FROM user where email = '$email'";
	$result = mysqli_query($my_link,$sql);
	$row = @mysqli_fetch_row($result);
	
	//判斷MySQL資料庫裡是否有這個會員
	if($row[1] == $email && $row[2] == $password && $row[4] == 0 ){ //normal user login in
	        //將帳號寫入session，方便驗證使用者身份
	        $_SESSION['username'] = $row[3];
	        $_SESSION['email'] = $email;
	        header('Location: user.php');
	    }

	else if($row[1] == $email && $row[2] == $password && $row[4] == 1){ //admin login
        	$_SESSION['username'] = $row[3];
        	$_SESSION['email'] = $email;
	        header('Location: admin.php');
	}
	
	else{
	        echo "<script>alert('帳號密碼不符，請重新登入'); location.href = 'index.html';</script>";
	        //echo '登入失敗，請重新登入';
	        //echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
	}
}

?>