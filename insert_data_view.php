<?php include_once 'header.php';?>
<?php 
$today = getdate();
//print_r($today) . '<br />';
$day = $today['weekday'];

?>
	<form action="insert_data.php" method="post">
		<label>Enter Patta</label><input type="text" name="patta"/><br />
		<label>Date</label><input type="date" name="date"/> <br />
		<label>RO</label><input type="radio" name="time" value="ro" checked="checked"/> 
		<label>RK</label><input type="radio" name="time" value="rk"/>
		<?php if ($day != 'saturday'){?> 
		<label>KO</label><input type="radio" name="time" value="ko"/> 
		<label>KK</label><input type="radio" name="time" value="kk"/> <?php }?><br />
		<label>Submit</label><input type="submit" />
	</form>
</body>
</html>