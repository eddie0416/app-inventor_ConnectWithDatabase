<?php
include("connMySQL.php");

$seldb = mysqli_select_db($link, "inventor_game") or die("資料庫選擇失敗！");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  	// 接收 POST 資料
	$id = $_POST['id'];
	$type = $_POST['type'];

  	// 檢查該 id 做過的問題
  	$sql = "SELECT question_qnum FROM history WHERE member_id = '$id'";
  	$result = mysqli_query($link,$sql);

  	$doneQuestions = []; 
	  
  	while ($row = mysqli_fetch_assoc($result)) {
    	$doneQuestions[] = $row['question_qnum'];  //用陣列儲存做過的題目
  	}

	if($type == "truefalse"){  // 挑選一題還未被該 id 做過的是非題
		$sql = "SELECT qnum FROM question WHERE ans IN ('O', 'X') AND qnum NOT IN ('" . implode("','", $doneQuestions) . "') ORDER BY RAND() LIMIT 1";
	}else{  // 挑選一題還未被該 id 做過的選擇題
		$sql = "SELECT qnum FROM question WHERE ans IN ('1', '2', '3') AND qnum NOT IN ('" . implode("','", $doneQuestions) . "') ORDER BY RAND() LIMIT 1";
	}
  	
  	$result = mysqli_query($link,$sql);

  	$row = mysqli_fetch_assoc($result);
	if($row){
		echo $row['qnum'];
	}else{
		echo "fail";
	}
}

?>
