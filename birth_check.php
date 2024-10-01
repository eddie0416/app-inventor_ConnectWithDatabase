<?php
	include("connMySQL.php");
    date_default_timezone_set('Asia/Taipei');

	$seldb = mysqli_select_db($link, "inventor_game")  
	or die("資料庫選擇失敗！");

	if ($_SERVER['REQUEST_METHOD'] == 'POST') { //以post方式接收網頁傳來的資料
    $id = $_POST['id'];
    
    $birth_query = "SELECT * FROM `member` WHERE id='$id'"; //SQL新增語法
    $result = mysqli_query($link, $birth_query);  //執行SQL語法

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $birth = $row['birth'];
        
        // 檢查出生日期是否為今天
        if ($birth == date('Y-m-d')) {
            echo "scare";
        }
    } else {
        echo "查詢失敗：" . mysqli_error($link);
    }
	}
	mysqli_close($link); //斷開與資料庫的連結
?>
