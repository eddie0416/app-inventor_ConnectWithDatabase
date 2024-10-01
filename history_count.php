<?php
include("connMySQL.php");

$seldb = mysqli_select_db($link, "inventor_game") or die("資料庫選擇失敗！");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // 接收 POST 資料
	$id = $_POST['id'];

	$sql = "SELECT COUNT(*) FROM history WHERE member_id = '$id'"; // 計算該id做過的題目數量
  	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);

	$sql2 = "SELECT `name` FROM member WHERE id = '$id'"; // 抓暱稱
	$result2 = mysqli_query($link,$sql2);
	$row2 = mysqli_fetch_assoc($result2);

  	if($result){
		echo $row2['name']."(".$row['COUNT(*)'].")";
	}else{
		echo "fail";
	}
}
?>
