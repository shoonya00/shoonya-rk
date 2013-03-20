<?php include_once 'header.php';?>
	<form action="show_query.php" method="post">
		<label>Enter jodi1</label><input type="text" name="jodi1"/><br />
		<label>Enter Day1</label><input type="text" name="day1"/> <br />
		<label>Enter jodi2</label><input type="text" name="jodi2"/><br /> 
		<label>Enter Day2</label><input type="text" name="day2"/> <br />
		<label>Enter jodi3</label><input type="text" name="jodi3"/><br /> 
		<label>Enter Day3</label><input type="text" name="day3"/> <br />
		<label>Enter weeks</label><input type="text" name="week"/><br />
		<label>Ratan</label><input type="radio" name="time" value="ratan" checked="checked"/> 
		<label>Kalyan</label><input type="radio" name="time" value="kalyan"/><br />
		<label>next week</label><input type="radio" name="order" value="nw" checked="checked"/>
		<label>current week</label><input type="radio" name="order" value="cur"/> 
		<label>previous week</label><input type="radio" name="order" value="pw"/><br />
		
		<label>Submit</label><input type="submit" />
	</form>
</body>
</html>