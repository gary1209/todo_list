<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$my_link = mysqli_connect("127.0.0.1","root","0000");
	mysqli_select_db($my_link,"todolist");

if(!@mysqli_connect("127.0.0.1","root","0000")){
        die("無法對資料庫連線");}

if(!@mysqli_select_db($my_link,"todolist")){
        die("無法使用資料庫");}
?> 