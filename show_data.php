<?php include_once 'header.php';?>
<?php include_once 'data_calculation.php';?>
<div style="float: left">
<h1>kalyan data</h1>
<table>
  <thead>
    <tr>
      <th class="price">date</th>
      <th class="price">mon</th>
      <th class="price">tue</th>
      <th class="price">wed</th>
      <th class="price">thu</th>
      <th class="price">fri</th>
      <th class="price">sat</th>
      <th class="price">total</th>
    </tr>
  </thead>
  <tbody>
<?php 
$dc = new data_calculation();
$dc->day_and_date($kalyan, $first_day_of_week);
for ($i = 0; $i < count($dc->tueDate); $i++) {
  	$total = $dc->monAkhkhar[$i] + $dc->tueAkhkhar[$i] + $dc->wedAkhkhar[$i] + $dc->thuAkhkhar[$i] + $dc->friAkhkhar[$i] + $dc->satAkhkhar[$i];
?>
    <tr>
      <td class="item"><?php echo $dc->monDate[$i];?></td>
      <td class="item"><?php echo $dc->monPatta[$i];?> - <?php echo $dc->monAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->tuePatta[$i];?> - <?php echo $dc->tueAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->wedPatta[$i];?> - <?php echo $dc->wedAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->thuPatta[$i];?> - <?php echo $dc->thuAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->friPatta[$i];?> - <?php echo $dc->friAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->satPatta[$i];?> - <?php echo $dc->satAkhkhar[$i];?></td>
      <td class="item"><?php echo $total;?></td>
    </tr>
    
  <?php }?>
  </tbody>

</table>			
</div>
<div style="float: right">
<h1>ratan data</h1>
<table>
  <thead>
    <tr>
      <th class="price">date</th>
      <th class="price">mon</th>
      <th class="price">tue</th>
      <th class="price">wed</th>
      <th class="price">thu</th>
      <th class="price">fri</th>
      <th class="price">total</th>
    </tr>
  </thead>
  <tbody>
<?php 
$dc->day_and_date($ratan, $first_day_of_week);
for ($i = 0; $i < count($dc->tueDate); $i++) {
  	$total = $dc->monAkhkhar[$i] + $dc->tueAkhkhar[$i] + $dc->wedAkhkhar[$i] + $dc->thuAkhkhar[$i] + $dc->friAkhkhar[$i];
?>
    <tr>
      <td class="item"><?php echo $dc->monDate[$i];?></td>
      <td class="item"><?php echo $dc->monPatta[$i];?> - <?php echo $dc->monAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->tuePatta[$i];?> - <?php echo $dc->tueAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->wedPatta[$i];?> - <?php echo $dc->wedAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->thuPatta[$i];?> - <?php echo $dc->thuAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->friPatta[$i];?> - <?php echo $dc->friAkhkhar[$i];?></td>
      <td class="item"><?php echo $total;?></td>
    </tr>
    
  <?php }?>
  </tbody>

</table>			
</div>
<div style="float: left">
<h1>KALYAN DATA</h1>
<table>
  <thead>
    <tr>
      <th class="price">date</th>
      <th class="price">mon</th>
      <th class="price">tue</th>
      <th class="price">wed</th>
      <th class="price">thu</th>
      <th class="price">fri</th>
      <th class="price">sat</th>
      <th class="price">total</th>
    </tr>
  </thead>
  <tbody>
<?php 
for($da = 0; $da < count($dateArr1); $da++) {
	
	$first_day_of_week = $dateArr1[$da];
	if ($first_day_of_week < date('Y-m-d', strtotime($weekStarter, time()))) {
	$sql = "SELECT * FROM data2 WHERE date between :date and DATE_ADD(:date, INTERVAL 6 DAY) order by time desc";
	
	$week_data = $dc->fetchData($DBH, $sql, $first_day_of_week);
	$row_count = count($week_data);
	$dc->day_and_date($week_data, $first_day_of_week);
	for ($i = 0; $i < count($dc->monDate); $i++) {
  		$total = $dc->monAkhkhar[$i] + $dc->tueAkhkhar[$i] + $dc->wedAkhkhar[$i] + $dc->thuAkhkhar[$i] + $dc->friAkhkhar[$i] + $dc->satAkhkhar[$i];
?>
     <tr>
      <td class="item"><?php echo $dc->monDate[$i];?></td>
      <td class="item"><?php echo $dc->monPatta[$i];?> - <?php echo $dc->monAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->tuePatta[$i];?> - <?php echo $dc->tueAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->wedPatta[$i];?> - <?php echo $dc->wedAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->thuPatta[$i];?> - <?php echo $dc->thuAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->friPatta[$i];?> - <?php echo $dc->friAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->satPatta[$i];?> - <?php echo $dc->satAkhkhar[$i];?></td>
      <td class="item"><?php echo $total;?></td>
    </tr> 
    
  <?php }}}?>
  </tbody>
</table>			
</div>

<div style="float: left">
<h1>RATAN DATA</h1>
<table>
  <thead>
    <tr>
      <th class="price">date</th>
      <th class="price">mon</th>
      <th class="price">tue</th>
      <th class="price">wed</th>
      <th class="price">thu</th>
      <th class="price">fri</th>
      <th class="price">total</th>
    </tr>
  </thead>
  <tbody>
<?php 
for($da = 0; $da < count($dateArr2); $da++) {
	
	$first_day_of_week = $dateArr2[$da];
	if ($first_day_of_week < date('Y-m-d', strtotime($weekStarter, time()))) {
	$sql = "SELECT * FROM ratan WHERE date between :date and DATE_ADD(:date, INTERVAL 5 DAY) order by time desc";
	
	$week_data = $dc->fetchData($DBH, $sql, $first_day_of_week);
	$row_count = count($week_data);
	$dc->day_and_date($week_data, $first_day_of_week);
	for ($i = 0; $i < count($dc->monDate); $i++) {
  		$total = $dc->monAkhkhar[$i] + $dc->tueAkhkhar[$i] + $dc->wedAkhkhar[$i] + $dc->thuAkhkhar[$i] + $dc->friAkhkhar[$i];
?>
     <tr>
      <td class="item"><?php echo $dc->monDate[$i];?></td>
      <td class="item"><?php echo $dc->monPatta[$i];?> - <?php echo $dc->monAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->tuePatta[$i];?> - <?php echo $dc->tueAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->wedPatta[$i];?> - <?php echo $dc->wedAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->thuPatta[$i];?> - <?php echo $dc->thuAkhkhar[$i];?></td>
      <td class="item"><?php echo $dc->friPatta[$i];?> - <?php echo $dc->friAkhkhar[$i];?></td>
      <td class="item"><?php echo $total;?></td>
    </tr> 
    
  <?php }}}?>
  </tbody>
</table>			
</div>
<div style="float: left">
<h1>KALYAN</h1>
<table>
  <thead>
    <tr>
      <th class="price">date</th>
      <th class="price">total</th>
    </tr>
  </thead>
  <tbody>
<?php 
foreach ($kalyan2 as $kalyan) {
	
?>
     <tr>
      <td class="item"><?php echo $kalyan['date'];?></td>
      <td class="item"><?php echo $kalyan['patta'];?> - <?php echo $kalyan['akhkhar'];?></td>
    </tr> 
    
  <?php }?>
  </tbody>
</table>			
</div>

<div style="float: left">
<h1>RATAN</h1>
<table>
  <thead>
    <tr>
      <th class="price">date</th>
      <th class="price">total</th>
    </tr>
  </thead>
  <tbody>
<?php 
foreach ($ratan2 as $ratan) {
	
?>
     <tr>
      <td class="item"><?php echo $ratan['date'];?></td>
      <td class="item"><?php echo $ratan['patta'];?> - <?php echo $ratan['akhkhar'];?></td>
    </tr> 
    
  <?php }?>
  </tbody>
</table>			
</div>

<div style="float: left">
<h1>KALYAN</h1>
<table>
  <thead>
    <tr>
      <th class="price">date</th>
      <th class="price">total</th>
    </tr>
  </thead>
  <tbody>
<?php 
foreach ($kalyan4 as $kalyan) {
	
?>
     <tr>
      <td class="item"><?php echo $kalyan['date'];?></td>
      <td class="item"><?php echo $kalyan['patta'];?> - <?php echo $kalyan['akhkhar'];?></td>
    </tr> 
    
  <?php }?>
  </tbody>
</table>			
</div>

<div style="float: left">
<h1>RATAN</h1>
<table>
  <thead>
    <tr>
      <th class="price">date</th>
      <th class="price">total</th>
    </tr>
  </thead>
  <tbody>
<?php 
foreach ($ratan4 as $ratan) {
	
?>
     <tr>
      <td class="item"><?php echo $ratan['date'];?></td>
      <td class="item"><?php echo $ratan['patta'];?> - <?php echo $ratan['akhkhar'];?></td>
    </tr> 
    
  <?php }?>
  </tbody>
</table>			
</div>
</body>
</html>