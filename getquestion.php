<?php
include("connMySQL.php");

$seldb = mysqli_select_db($link, "inventor_game") or die("資料庫選擇失敗！");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  	// 接收 POST 資料
	$qnum = $_POST['qnum'];

  	$sql = "SELECT topic FROM question WHERE qnum = '$qnum'"; //依照qnum抓題目
	$result = mysqli_query($link,$sql);

  	$row = mysqli_fetch_assoc($result);
	if($row){
		echo $row['topic'];
	}else{
		echo "fail";
	}
}

?>
