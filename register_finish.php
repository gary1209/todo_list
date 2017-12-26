<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql.php");
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$password2 = $_REQUEST["password2"];
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($name != null && $email != null && $password != null && $password2 != null && $password == $password2){
        //新增資料進資料庫語法
        $sql = "insert into user (name, email, password) values ('$name', '$email', '$password')";
        if(mysqli_query($my_link,$sql)){
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=admin.php>';
        }
        else{
                echo '新增失敗，請重新操作';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=admin.php>';
        }
}
else{
        echo "<script>alert('資料有誤，請重新註冊!'); location.href = 'admin.php';</script>";
}
?>