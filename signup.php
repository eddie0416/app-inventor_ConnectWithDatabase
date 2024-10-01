<?php
	include("connMySQL.php");

	$seldb = mysqli_select_db($link, "inventor_game")  
	or die("資料庫選擇失敗！");

	if ($_SERVER['REQUEST_METHOD'] == 'POST') { //以 POST 方式接收網頁傳來的資料
		$id = $_POST['id'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$birth = $_POST['birth'];

		// 檢查 ID 是否重複
		$check_query = "SELECT * FROM `member` WHERE id='$id'";
		$check_result = mysqli_query($link, $check_query);
		if (mysqli_num_rows($check_result) > 0) {
			echo "repeat";
			exit; // 若 ID 重複，停止程式執行
		}else{
            $signup_query = "INSERT INTO `member`(`id`, `name`, `password`, `birth`) 
		    VALUES ('$id','$name','$password','$birth')"; //SQL新增語法
		    $result = mysqli_query($link, $signup_query);  //執行SQL語法

		    if($result){
			echo "pass";
		    }else{
			echo "fail";
		    }
        }
	}
	mysqli_close($link); //斷開與資料庫的連結
?>
