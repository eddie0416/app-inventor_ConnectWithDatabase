<?php
  //資料庫主機設定
  $host = "localhost";
  $username = "root";
  $password = "";
  //連線伺服器
  $link = mysqli_connect($host, $username, $password);
  if(!$link) die("資料庫系統連結失敗！");
  mysqli_query($link, "SET CHARACTER SET UTF8");

?>