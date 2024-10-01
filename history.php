<?php
include("connMySQL.php");

$seldb = mysqli_select_db($link, "inventor_game") or die("資料庫選擇失敗！");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {// 接收 POST 資料
	$id = $_POST['id'];

  	$sql = "SELECT * FROM history WHERE member_id = '$id'"; //依照id抓歷史紀錄(會有很多筆)
	$result = mysqli_query($link,$sql);

	echo "題目,作答紀錄,答題狀況,詳解\n";

	while($row = mysqli_fetch_assoc($result)){ //一筆一筆抓history紀錄出來
		$qnum = $row['question_qnum'];

		$sql2 = "SELECT * FROM question WHERE qnum = '$qnum'"; //抓該筆history紀錄對應的question紀錄
		$result2 = mysqli_query($link,$sql2);
		$row2 = mysqli_fetch_assoc($result2);

		if($row['answer'] == $row2['ans']){ //比對history跟question的答案
			$output = "答對";
		}else{
			$output = "答錯";
		}
		//$CHAR = "\n"
		//echo $row2['topic'].",".$row['answer'].",".$output.",".$row2['Detail']."\n";
		$outputString = $row2['topic'] . "," . $row['answer'] . "," . $output . "," . $row2['Detail'] . "\n";
		echo "<p>" . htmlspecialchars($outputString) . "</p>";
	}
}
?>
