<?php include_once 'header.php';?>
<?php include_once 'data_calculation.php';?>
<div style="float: left">
<h1><?php echo strtoupper($time)?> DATA</h1>
<table>
  <thead>
    <tr>
      <th class="price">date</th>
      <th class="price">mon</th>
      <th class="price">tue</th>
      <th class="price">wed</th>
      <th class="price">thu</th>
      <th class="price">fri</th>
      <?php if ($time == 'kalyan') {?>
      <th class="price">sat</th><?php }?>
      <th class="price">total</th>
    </tr>
  </thead>
  <tbody>
<?php 
$dc = new data_calculation();

for($da = 0; $da < count($dateArr); $da++) {
	
	$first_day_of_week = $dateArr[$da];
	if ($first_day_of_week < date('Y-m-d', strtotime($weekStarter, time()))) {
	if ($time == 'kalyan') {
		$sql = "SELECT * FROM data2 WHERE date between :userDate and DATE_ADD(:userDate, INTERVAL 6 DAY) order by date desc, time desc";
	} else {
		$sql = "SELECT * FROM ratan WHERE date between :userDate and DATE_ADD(:userDate, INTERVAL 5 DAY) order by date desc, time desc";
	}
	
	$STH = $DBH->prepare($sql);
	$STH->bindParam(':userDate', $first_day_of_week, PDO::PARAM_STR);
	$STH->execute();
	$week_data = $STH->fetchAll();
	$row_count = count($week_data);
	
	$dc->day_and_date($week_data, $first_day_of_week);
	for ($i = 0; $i < count($dc->monDate); $i++) {
  		$total = $dc->monAkhkhar[$i] + $dc->tueAkhkhar[$i] + $dc->wedAkhkhar[$i] + $dc->thuAkhkhar[$i] + $dc->friAkhkhar[$i];
  		if ($time == 'kalyan') {
  			$total += $dc->satAkhkhar[$i];
  		}
?>
    <tr>
      <td class="item"><?php echo $dc->monDate[$i];?></td>
      <td class="item"><?php echo $dc->monPatta[$i];?> - <?php echo $dc->monAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->tuePatta[$i];?> - <?php echo $dc->tueAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->wedPatta[$i];?> - <?php echo $dc->wedAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->thuPatta[$i];?> - <?php echo $dc->thuAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->friPatta[$i];?> - <?php echo $dc->friAkhkhar[$i];?></td>
      <?php if ($time == 'kalyan') {?><td class="item"><?php echo $dc->satPatta[$i];?> - <?php echo $dc->satAkhkhar[$i];?></td><?php }?>
      <td class="item"><?php echo $total;?></td>
    </tr>
    
  <?php }}}?>
  </tbody>
</table>			
</div>
<div style="float: right">
<h1>open data</h1>
<table>
  <thead>
    <tr>
      <th class="price">date</th>
      <th class="price">mon</th>
      <th class="price">tue</th>
      <th class="price">wed</th>
      <th class="price">thu</th>
      <th class="price">fri</th>
      <?php if ($time == 'kalyan') {?>
      <th class="price">sat</th><?php }?>
      <th class="price">total</th>
    </tr>
  </thead>
  <tbody>
<?php 
for($da = 0; $da < count($dateArr); $da++) {
	
	$first_day_of_week = $dateArr[$da];
	if ($first_day_of_week < date('Y-m-d', strtotime($weekStarter, time()))) {
	if ($time == 'kalyan') {
		$sql = "SELECT * FROM data2 WHERE date between :userDate and DATE_ADD(:userDate, INTERVAL 6 DAY) and time = 'ko'";
	} else {
		$sql = "SELECT * FROM ratan WHERE date between :userDate and DATE_ADD(:userDate, INTERVAL 5 DAY) and time = 'ro'";
	}
	
	$STH = $DBH->prepare($sql);
	$STH->bindParam(':userDate', $first_day_of_week, PDO::PARAM_STR);
	$STH->execute();
	$week_data = $STH->fetchAll();
	$row_count = count($week_data);
	
	$dc->day_and_date($week_data, $first_day_of_week);
	for ($i = 0; $i < count($dc->monDate); $i++) {
		$total = $dc->monAkhkhar[$i] + $dc->tueAkhkhar[$i] + $dc->wedAkhkhar[$i] + $dc->thuAkhkhar[$i] + $dc->friAkhkhar[$i];
  		if ($time == 'kalyan') {
  			$total += $dc->satAkhkhar[$i];
  		}
?>
    <tr>
      <td class="item"><?php echo $dc->monDate[$i];?></td>
      <td class="item"><?php echo $dc->monPatta[$i];?> - <?php echo $dc->monAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->tuePatta[$i];?> - <?php echo $dc->tueAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->wedPatta[$i];?> - <?php echo $dc->wedAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->thuPatta[$i];?> - <?php echo $dc->thuAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->friPatta[$i];?> - <?php echo $dc->friAkhkhar[$i];?></td>
      <?php if ($time == 'kalyan') {?><td class="item"><?php echo $dc->satPatta[$i];?> - <?php echo $dc->satAkhkhar[$i];?></td><?php }?>
      <td class="item"><?php echo $total;?></td>
    </tr>
    
  <?php }}}?>
  </tbody>
  
</table>			
</div>
<div style="float: right">
<h1>close data</h1>
<table>
  <thead>
    <tr>
      <th class="price">date</th>
      <th class="price">mon</th>
      <th class="price">tue</th>
      <th class="price">wed</th>
      <th class="price">thu</th>
      <th class="price">fri</th>
      <?php if ($time == 'kalyan') {?>
      <th class="price">sat</th><?php }?>
      <th class="price">total</th>
    </tr>
  </thead>
  <tbody>
<?php 
for($da = 0; $da < count($dateArr); $da++) {
	
	$first_day_of_week = $dateArr[$da];
	if ($first_day_of_week < date('Y-m-d', strtotime($weekStarter, time()))) {
	if ($time == 'kalyan') {
		$sql = "SELECT * FROM data2 WHERE time = 'kk' and date between :userDate and DATE_ADD(:userDate, INTERVAL 6 DAY)";
	} else {
		$sql = "SELECT * FROM ratan WHERE date between :userDate and DATE_ADD(:userDate, INTERVAL 5 DAY) and time = 'rk'";
	}
	
	$STH = $DBH->prepare($sql);
	$STH->bindParam(':userDate', $first_day_of_week, PDO::PARAM_STR);
	$STH->execute();
	$week_data = $STH->fetchAll();
	$row_count = count($week_data);
	
	$dc->day_and_date($week_data, $first_day_of_week);
	for ($i = 0; $i < count($dc->monDate); $i++) {
		$total = $dc->monAkhkhar[$i] + $dc->tueAkhkhar[$i] + $dc->wedAkhkhar[$i] + $dc->thuAkhkhar[$i] + $dc->friAkhkhar[$i];
  		if ($time == 'kalyan') {
  			$total += $dc->satAkhkhar[$i];
  		}
?>
    <tr>
      <td class="item"><?php echo $dc->monDate[$i];?></td>
      <td class="item"><?php echo $dc->monPatta[$i];?> - <?php echo $dc->monAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->tuePatta[$i];?> - <?php echo $dc->tueAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->wedPatta[$i];?> - <?php echo $dc->wedAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->thuPatta[$i];?> - <?php echo $dc->thuAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->friPatta[$i];?> - <?php echo $dc->friAkhkhar[$i];?></td>
      <?php if ($time == 'kalyan') {?><td class="item"><?php echo $dc->satPatta[$i];?> - <?php echo $dc->satAkhkhar[$i];?></td><?php }?>
      <td class="item"><?php echo $total;?></td>
    </tr>
    
  <?php }}}?>
  </tbody>
  
</table>			
</div>

</body>
</html>