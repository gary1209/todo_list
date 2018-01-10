<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$my_db = mysqli_connect("localhost","taipeinew2018","s8CuUrjUcnTAZuHf");
	mysqli_select_db($my_db,"waywin_new2018");

if(!@mysqli_connect("localhost","taipeinew2018","s8CuUrjUcnTAZuHf")){
        die("無法對資料庫連線");}

if(!@mysqli_select_db($my_db,"waywin_new2018")){
        die("無法使用資料庫");}

// $my_db = mysqli_connect("localhost","root","0000");
// 	mysqli_select_db($my_db,"todolist");

// if(!@mysqli_connect("localhost","root","0000")){
//         die("無法對資料庫連線");}

// if(!@mysqli_select_db($my_db,"todolist")){
//         die("無法使用資料庫");}
?> 