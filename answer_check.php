<?php
include("connMySQL.php");

$seldb = mysqli_select_db($link, "inventor_game") or die("資料庫選擇失敗！");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {// 接收 POST 資料
	$id = $_POST['id'];
	$qnum = $_POST['qnum'];
	$ans = $_POST['ans'];

  	$sql = "SELECT ans FROM question WHERE qnum = '$qnum'"; //抓題庫中的答案出來比對
	
	$db_ans = mysqli_fetch_assoc(mysqli_query($link,$sql))['ans'];

	if($db_ans == $ans){ //判斷答案是否正確
		echo "true";
	}else{
		echo "false";
	} 
	$sql = "INSERT INTO `history`(`member_id`, `question_qnum`, `answer`) VALUES ('$id','$qnum','$ans')"; //新增作答記錄到history
	$result = mysqli_query($link,$sql);
}
?>
