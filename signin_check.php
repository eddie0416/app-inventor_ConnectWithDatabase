<?php
	include("connMySQL.php");

	$seldb = mysqli_select_db($link, "inventor_game")  
	or die("資料庫選擇失敗！");

	//mysqli_query($link, "SET CHARACTER SET UTF8");

	if ($_SERVER['REQUEST_METHOD'] == 'POST') { //以post方式接收網頁傳來的資料
    $id = $_POST['id'];
    $password = $_POST['password'];
    
    $id_query = "SELECT * FROM `member` WHERE id='$id'"; //SQL新增語法
    $result = mysqli_query($link, $id_query);  //執行SQL語法
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $dbPassword = $row['password'];
        if ($password == $dbPassword) {
            echo "pwpass";
        } else {
            echo "pwfail";
        }
    } else {
        echo "idfail";
    }
	}
	mysqli_close($link); //斷開與資料庫的連結
?>
