<?php
class Data {
	public $patta;
	public $akhkhar;
	public $day;
	public $date;
	public $ok;
	public $id;
	
	function insertData() {
		
	}
}

include_once 'database.php';
include_once 'data_calculation.php';
$dc = new data_calculation();
$db_link = new database();
$DBH = $db_link->connect();
if (strtolower(date('l', time())) == 'monday') {
	$weekStarter = 'Monday';
} elseif (strtolower(date('l', time())) == 'sunday') {
	$weekStarter = 'Next Monday';
}else {
	$weekStarter = 'Last Monday';
}
$first_day_of_week = date('Y-m-d', strtotime($weekStarter, time()));
$first_day = date('m-d', strtotime($first_day_of_week));
$date = '%Y-' . $first_day;
//echo $date . ' : Week count : '.date("W", strtotime("- 1 day")) . '<br />';
//$last_day_of_week = date('m-d', strtotime('Next Sunday', time()));
//echo $first_day_of_week . '<br /> ' . $last_day_of_week;

	$sql = "SELECT * FROM data2 WHERE DATE BETWEEN DATE_FORMAT(DATE, :date) AND (SELECT DATE_ADD(DATE_FORMAT( DATE, :date), INTERVAL 6 DAY)) order by date desc, time desc";
	$kalyan = $dc->fetchData($DBH, $sql, $date);
	$row_count = count($kalyan);
	
	//echo 'Row Count Returened from function : '.$row_count;

	$sql = "SELECT * FROM ratan WHERE DATE BETWEEN DATE_FORMAT(DATE, :date) AND (SELECT DATE_ADD(DATE_FORMAT( DATE, :date), INTERVAL 6 DAY)) order by date desc, time desc";
	$ratan = $dc->fetchData($DBH, $sql, $date);
	
	$first_day = date('m-d', time());
	$date = '%Y-' . $first_day;
	$sql = "SELECT * FROM data2 WHERE DATE like DATE_FORMAT(DATE, :date) order by date desc, time desc limit 0,20";
	$kalyan2 = $dc->fetchData($DBH, $sql, $date);

	$sql = "SELECT * FROM ratan WHERE DATE like DATE_FORMAT(DATE, :date) order by date desc, time desc limit 0,20";
	$ratan2 = $dc->fetchData($DBH, $sql, $date);
	
	$day_of_week = date('l', time());
	$first_day = date('d', time());
	$date = '%Y-%m-' . $first_day;
	
	$sql = "SELECT date FROM data2 WHERE DATE LIKE DATE_FORMAT(DATE, :date) and day = :dow and time = 'ko' order by date desc, time asc limit 0, 20";
	$kalyan3 = $dc->fetchData($DBH, $sql, $date, $day_of_week);
	$dateArr1 = $dc->getDate($kalyan3, 0, 'cur', $weekStarter);
		
	$sql = "SELECT date FROM ratan WHERE DATE LIKE DATE_FORMAT(DATE, :date) and day = :dow and time = 'ro' order by date desc, time asc limit 0, 20";
	$ratan3 = $dc->fetchData($DBH, $sql, $date, $day_of_week);
	$dateArr2 = $dc->getDate($ratan3, 0, 'cur', $weekStarter);
	
	$sql = "SELECT * FROM data2 WHERE DATE LIKE DATE_FORMAT(DATE, :date) order by date desc, time asc limit 0, 20";
	$kalyan4 = $dc->fetchData($DBH, $sql, $date);
	
	$sql = "SELECT * FROM ratan WHERE DATE LIKE DATE_FORMAT(DATE, :date) order by date desc, time asc limit 0, 20";
	$ratan4 = $dc->fetchData($DBH, $sql, $date);
	
	if ($row_count > 0){
		include_once 'show_data.php';
	}else {
		echo "No rows matched the query";
		include_once 'home.php';
	}
