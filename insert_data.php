<?php 

class insert_data {
	public $returnPage;
	public function __construct(){
		
		include_once 'database.php';
		$db_link = new database();
		$DBH = $db_link->connect();
		$this->insertData($DBH);
		
	}
	
	public function insertData($dbh){
		$patta = $_POST['patta'];
		$patta2 = (string)$patta;
		$akhkhar = substr($patta2, 0, 1) + substr($patta2, 1, 1) +substr($patta2, 2, 1);
		if ($akhkhar > 9) {
			$akhkhar = substr($akhkhar, 1, 1);
		}

		$today = getdate();
		$date = $_POST['date'];
		$day = date('l', strtotime($date));
		$time = $_POST['time'];
		date('l', strtotime( $date));
		$sql = "SELECT * FROM data WHERE date = ? AND time = ?";
		$STH = $dbh->prepare($sql);
		$STH->execute(array($date, $time));
		$rowCount = $STH->rowCount();
		
		if ($STH->rowCount() > 0){
			$error = 'we already have data for date = '. $date . 'and time = '. $time;
			$this->returnPage = 'insert_data_view.php';
			
		} else {
			
			$sth = $dbh->prepare('INSERT INTO data (date, day, patta, akhkhar,time) VALUES (:date, :day, :patta, :akhkhar, :time)');
			$sth->bindparam(':date', $date);
			$sth->bindparam(':day', $day);
			$sth->bindparam(':patta', $patta);
			$sth->bindparam(':akhkhar', $akhkhar);
			$sth->bindparam(':time', $time);
			$sth->execute();
			$this->returnPage = 'home.php';
		}
	}
}

include_once 'insert_data.php';
$insert = new insert_data();
include_once $insert->returnPage;
?>