<?php
class data_calculation {
	
	public $monDate = array();
	public $monPatta = array();
	public $monAkhkhar = array();
	public $tueDate = array();
	public $tuePatta = array();
	public $tueAkhkhar = array();
	public $wedDate = array();
	public $wedPatta = array();
	public $wedAkhkhar = array();
	public $thuDate = array();
	public $thuPatta = array();
	public $thuAkhkhar = array();
	public $friDate = array();
	public $friPatta = array();
	public $friAkhkhar = array();
	public $satDate = array();
	public $satPatta = array();
	public $satAkhkhar = array();
	
	function fetchData($DBH, $sql, $date, $dow = NULL) {
		$STH = $DBH->prepare($sql);
		$STH->bindParam(':date', $date, PDO::PARAM_STR);
		if ($dow != NULL) {
			$STH->bindParam(':dow', $dow, PDO::PARAM_STR);
		}
		$STH->execute();
		$data = $STH->fetchAll();
		return $data;
	}
	
	public function day_and_date ($data_arr, $first_day_of_week){
		
		$first_day = date('m-d', strtotime($first_day_of_week));
		$date_tue = date('m-d', strtotime($first_day_of_week. ' + 1 day'));
		$date_wed = date('m-d', strtotime($first_day_of_week. ' + 2 day'));
		$date_thu = date('m-d', strtotime($first_day_of_week. ' + 3 day'));
		$date_fri = date('m-d', strtotime($first_day_of_week. ' + 4 day'));
		$date_sat = date('m-d', strtotime($first_day_of_week. ' + 5 day'));
		
		$mon_counter = 0;
		$tue_counter = 0;
		$wed_counter = 0;
		$thu_counter = 0;
		$fri_counter = 0;
		$sat_counter = 0;
		
		unset($this->monDate);
		unset($this->monPatta);
		unset($this->monAkhkhar);
		unset($this->tueDate);
		unset($this->tuePatta);
		unset($this->tueAkhkhar);
		unset($this->wedDate);
		unset($this->wedPatta);
		unset($this->wedAkhkhar);
		unset($this->thuDate);
		unset($this->thuPatta);
		unset($this->thuAkhkhar);
		unset($this->friDate);
		unset($this->friPatta);
		unset($this->friAkhkhar);
		unset($this->satDate);
		unset($this->satPatta);
		unset($this->satAkhkhar);
		
		foreach ($data_arr as $record) {
			
			if (($record['day'] == 'Monday') && (date('m-d', strtotime($record['date'])) == $first_day)) {
				$this->monDate[$mon_counter] = $record['date'];
				$this->monPatta[$mon_counter] = $record['patta'];
				$this->monAkhkhar[$mon_counter] = $record['akhkhar'];

				$mon_counter++;
			}
			if (($record['day'] == 'Tuesday') && (date('m-d', strtotime($record['date'])) == $date_tue)) {
				$this->tueDate[$tue_counter] = $record['date'];
				$this->tuePatta[$tue_counter] = $record['patta'];
				$this->tueAkhkhar[$tue_counter] = $record['akhkhar'];
				$this->tueDay[$tue_counter] = $record['day'];
				$tue_counter++;
			}
			if (($record['day'] == 'Wednesday') && (date('m-d', strtotime($record['date'])) == $date_wed)) {
				$this->wedDate[$wed_counter] = $record['date'];
				$this->wedPatta[$wed_counter] = $record['patta'];
				$this->wedAkhkhar[$wed_counter] = $record['akhkhar'];
				$wed_counter++;
			}
			if (($record['day'] == 'Thursday') && (date('m-d', strtotime($record['date'])) == $date_thu)) {
				$this->thuDate[$thu_counter] = $record['date'];
				$this->thuPatta[$thu_counter] = $record['patta'];
				$this->thuAkhkhar[$thu_counter] = $record['akhkhar'];
				$thu_counter++;
			}
			if (($record['day'] == 'Friday') && (date('m-d', strtotime($record['date'])) == $date_fri)) {
				$this->friDate[$fri_counter] = $record['date'];
				$this->friPatta[$fri_counter] = $record['patta'];
				$this->friAkhkhar[$fri_counter] = $record['akhkhar'];
				$fri_counter++;
			}
			if (($record['day'] == 'Saturday') && (date('m-d', strtotime($record['date'])) == $date_sat)) {
				$this->satDate[$sat_counter] = $record['date'];
				$this->satPatta[$sat_counter] = $record['patta'];
				$this->satAkhkhar[$sat_counter] = $record['akhkhar'];
				$sat_counter++;
			}
		
		}
		//echo count($this->monAkhkhar);
/* 		for ($i = 0; $i < count($this->monDate); $i++) {
			//echo '<br /> DATE : ' . $monDate[$i] . ' PATTA : ' . $monPatta[$i] .  ' AKHKHAR : ' . $monAkhkhar[$i] .'<br />';
			echo '<br /> DATE : '.$this->monDate[$i].'<br />';
		}
 */		
	} 
	
	function complete_data ($data_arr){
		
		$mon_counter = 0;
		$tue_counter = 0;
		$wed_counter = 0;
		$thu_counter = 0;
		$fri_counter = 0;
		$sat_counter = 0;
		
		unset($this->monDate);
		unset($this->monPatta);
		unset($this->monAkhkhar);
		unset($this->tueDate);
		unset($this->tuePatta);
		unset($this->tueAkhkhar);
		unset($this->wedDate);
		unset($this->wedPatta);
		unset($this->wedAkhkhar);
		unset($this->thuDate);
		unset($this->thuPatta);
		unset($this->thuAkhkhar);
		unset($this->friDate);
		unset($this->friPatta);
		unset($this->friAkhkhar);
		unset($this->satDate);
		unset($this->satPatta);
		unset($this->satAkhkhar);
		
		foreach ($data_arr as $record) {
			//echo '<br />' . 'date : ' . $record['date'];
			if ($record['day'] == 'Monday') {
				$this->monDate[$mon_counter] = $record['date'];
				$this->monPatta[$mon_counter] = $record['patta'];
				$this->monAkhkhar[$mon_counter] = $record['akhkhar'];
				$mon_counter++;
			}
			if ($record['day'] == 'Tuesday') {
				$this->tueDate[$tue_counter] = $record['date'];
				$this->tuePatta[$tue_counter] = $record['patta'];
				$this->tueAkhkhar[$tue_counter] = $record['akhkhar'];
				$tue_counter++;
			}
			if ($record['day'] == 'Wednesday') {
				$this->wedDate[$wed_counter] = $record['date'];
				$this->wedPatta[$wed_counter] = $record['patta'];
				$this->wedAkhkhar[$wed_counter] = $record['akhkhar'];
				$wed_counter++;
			}
			if ($record['day'] == 'Thursday') {
				$this->thuDate[$thu_counter] = $record['date'];
				$this->thuPatta[$thu_counter] = $record['patta'];
				$this->thuAkhkhar[$thu_counter] = $record['akhkhar'];
				$thu_counter++;
			}
			if ($record['day'] == 'Friday') {
				$this->friDate[$fri_counter] = $record['date'];
				$this->friPatta[$fri_counter] = $record['patta'];
				$this->friAkhkhar[$fri_counter] = $record['akhkhar'];
				$fri_counter++;
			}
			if ($record['day'] == 'Saturday') {
				$this->satDate[$sat_counter] = $record['date'];
				$this->satPatta[$sat_counter] = $record['patta'];
				$this->satAkhkhar[$sat_counter] = $record['akhkhar'];
				$sat_counter++;
			}
		
		}
	} 
	
	function getDate($dataSet, $weeks, $order, $weekStarter, $allData = NULL) {
		
		$dateArr;
		$i = 0;
		$j = 0;
		$mondayCounter = 0;
		
		foreach ($dataSet as $ds) {
			$weekCounter = 0;
			$first_day_of_week = date('Y-m-d', strtotime($weekStarter, strtotime($ds['date'])));
			
			if ($order == 'cur') {
				$dateArr[$j] = $first_day_of_week;
				$j++;
			} else {
				foreach ($allData as $all) {
					if($all['date'] > $first_day_of_week) {
						if (strtolower(date('l', strtotime($all['date']))) == 'monday') {
							$mondayCounter++;
						}
						if ($mondayCounter == 2) {
							$weekCounter++;
							$mondayCounter = 0;
							//echo ' WC : ' .$weekCounter. ' | DATE : ' . $all['date'] . ' | WEEKS : ' .$weeks .'<br />';
						}
						if ($weekCounter == $weeks) {
							$dateArr[$i] = $all['date'];
							$i++;
							break;
						}
					}
				
				}
			}
			
			if ($order == 'pw') {
				$weeks--;
			}
		
		}
		
		return $dateArr;
	}
	
	function pagination($query, $per_page = 10,$page = 1, $url = '?'){
		$query = "SELECT COUNT(*) as `num` FROM {$query}";
		$row = mysql_fetch_array(mysql_query($query));
		$total = $row['num'];
		$adjacents = "2";
	
		$page = ($page == 0 ? 1 : $page);
		$start = ($page - 1) * $per_page;
	
		$prev = $page - 1;
		$next = $page + 1;
		$lastpage = ceil($total/$per_page);
		$lpm1 = $lastpage - 1;
		 
		$pagination = "";
		if($lastpage > 1)
		{
			$pagination .= "<ul class='pagination'>";
			$pagination .= "<li class='details'>Page $page of $lastpage</li>";
			if ($lastpage < 7 + ($adjacents * 2))
			{
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a class='current'>$counter</a></li>";
					else
						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))
			{
				if($page < 1 + ($adjacents * 2))
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li><a class='current'>$counter</a></li>";
						else
							$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
					}
					$pagination.= "<li class='dot'>...</li>";
					$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
					$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
				}
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
					$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
					$pagination.= "<li class='dot'>...</li>";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li><a class='current'>$counter</a></li>";
						else
							$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
					}
					$pagination.= "<li class='dot'>..</li>";
					$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
					$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
				}
				else
				{
					$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
					$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
					$pagination.= "<li class='dot'>..</li>";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li><a class='current'>$counter</a></li>";
						else
							$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
					}
				}
			}

			if ($page < $counter - 1){
				$pagination.= "<li><a href='{$url}page=$next'>Next</a></li>";
				$pagination.= "<li><a href='{$url}page=$lastpage'>Last</a></li>";
			}else{
				$pagination.= "<li><a class='current'>Next</a></li>";
				$pagination.= "<li><a class='current'>Last</a></li>";
			}
			$pagination.= "</ul>\n";
		}


		return $pagination;
	}
}