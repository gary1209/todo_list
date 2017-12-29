<?php 
 // $day = date("w", strtotime('2017-12-30')); //判斷特定日期星期幾
	include('mysql.php');
 	mysqli_query($my_db,"SET NAMES 'utf8'");
	$sql = "SELECT * FROM document ";
	$result = mysqli_query($my_db,$sql);
	$num = mysqli_num_rows($result);
    $getDate= date("Y-m-d",mktime(0,0,0,date("m"),date("d"),date("Y")));
	$day = date("w");
	//今天是周三，過期日期小於四天的都要通知
	if ($day=="3"){ 
		for ($i=1; $i <=$num ; $i++){
		 	$rs = mysqli_fetch_array($result);
		    $deadline=date($rs[6]);
		    $startdate=strtotime($getDate);
		    $enddate=strtotime($deadline);
			$days=round(($enddate-$startdate)/3600/24) ;
			if($days<=3){
	            $message = "\n"."單位:".$rs[2]."\n"."文號:".$rs[3]."\n"."截止日期:".$rs[6] ;
	            $initData['message'] = $message;
                sendLineNotify($initData);
			}
	    }
	}
	//今天是周四，過期日期小於三天的都要通知
	if ($day=="4"){ 
	 	for ($i=1; $i <=$num ; $i++){
		 	$rs = mysqli_fetch_array($result);
		    $deadline=date($rs[6]);
		    $startdate=strtotime($getDate);
		    $enddate=strtotime($deadline);
			$days=round(($enddate-$startdate)/3600/24) ;
			if($days<=3){
	            // echo $rs[2];  //單位
	            // echo $rs[3];  //文號
	            // echo $rs[6];  //截止日期
	            $message = "\n"."單位:".$rs[2]."\n"."文號:".$rs[3]."\n"."截止日期:".$rs[6] ;
	            $initData['message'] = $message;
                sendLineNotify($initData);
			}
	    }
	}
	//小於兩天的通知
	else{ 
		for ($i=1; $i <=$num ; $i++){
		 	$rs = mysqli_fetch_array($result);
		    $deadline=date($rs[6]);
		    $startdate=strtotime($getDate);
		    $enddate=strtotime($deadline);
			$days=round(($enddate-$startdate)/3600/24) ;
			if($days<=2){
	        	$message = "\n"."單位:".$rs[2]."\n"."文號:".$rs[3]."\n"."截止日期:".$rs[6] ;
	            $initData['message'] = $message;
                sendLineNotify($initData);
			}
	    }	
	}
    
     echo "<script>window.close();</script>";


function sendLineNotify($initData, $token = '0t9gK1r6QnucXB93YvNuyrvfgwhvCvstc0YIXUgDBGe',$url = 'https://notify-api.line.me/api/notify') {
    $ch = curl_init();
    $header[] = 'Authorization: Bearer';
    $header[] = $token;
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => array(implode(' ',$header)),
        CURLOPT_POSTFIELDS => http_build_query($initData),
    ));

    $result = curl_exec($ch);
    curl_close($ch); 
    $aResult = json_decode ($result, TRUE);
    return $aResult;
}

?>