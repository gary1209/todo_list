<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$my_db = mysqli_connect("127.0.0.1","root","");
	mysqli_select_db($my_db,"my_db");

if(!@mysqli_connect("127.0.0.1","root","")){
        die("無法對資料庫連線");}

if(!@mysqli_select_db($my_db,"my_db")){
        die("無法使用資料庫");}
?> 