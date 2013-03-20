<?php
include_once 'database.php';
include_once 'data_calculation.php';
$db_link = new database();
$DBH = $db_link->connect();

$dc = new data_calculation();
$jodi1 =$_POST['jodi1'];
$jodi2 =$_POST['jodi2'];
$jodi3 =$_POST['jodi3'];

$day1 =$_POST['day1'];
$day2 =$_POST['day2'];
$day3 =$_POST['day3'];
$weeks =$_POST['week'];
$time =$_POST['time'];
$order = $_POST['order'];

if ($jodi1 != "") {
	$akhkhar1 = substr($jodi1, 0, 1);
	$akhkhar2 = substr($jodi1, 1, 1);
}
if ($jodi2 != "") {
	$akhkhar3 = substr($jodi1, 0, 1);
	$akhkhar4 = substr($jodi1, 1, 1);
}
if ($jodi3 != "") {
	$akhkhar5 = substr($jodi1, 0, 1);
	$akhkhar6 = substr($jodi1, 1, 1);
}
  
if (strtolower($day1) == 'monday') {
	$weekStarter = 'Monday';
} else {
	$weekStarter = 'Last Monday';
}

if ($time == 'kalyan') {
	$sql = "SELECT * FROM data2 WHERE DAY = :day AND TIME = 'ko' AND akhkhar = :akhkhar1 AND DATE IN (SELECT DATE FROM data2 WHERE DAY = :day AND TIME = 'kk' AND akhkhar = :akhkhar2) order by date desc, time desc";
} else {
	$sql = "SELECT * FROM ratan WHERE DAY = :day AND TIME = 'ro' AND akhkhar = :akhkhar1 AND DATE IN (SELECT DATE FROM ratan WHERE DAY = :day AND TIME = 'rk' AND akhkhar = :akhkhar2) order by date desc, time desc";
}

$STH = $DBH->prepare($sql);
$STH->bindParam(':day', $day1, PDO::PARAM_STR);
$STH->bindParam(':akhkhar1', $akhkhar1, PDO::PARAM_INT);
$STH->bindParam(':akhkhar2', $akhkhar2, PDO::PARAM_INT);
$STH->execute();
$kalyan = $STH->fetchAll();
$row_count = count($kalyan);


if ($order == 'nw' or $order == 'pw'){
	if ($time == 'kalyan') {
		$sql = "SELECT * FROM data2";
	} else {
		$sql = "SELECT * FROM ratan";
	}
	$STH = $DBH->prepare($sql);
	$STH->execute();
	$all_data = $STH->fetchAll();
}

$dateArr = $dc->getDate($kalyan, $weeks, $order, $weekStarter, $all_data);

//echo $row_count. '<br />';
if ($row_count > 0){
	include_once 'show_query_data.php';
}else {
	echo "No rows matched the query";
	//include_once 'home.php';
}
