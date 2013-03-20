<?php
/**
 * @link: http://www.Awcore.com/dev
 */
	include_once 'header.php';
    //connect to the database
    include_once ('database.php'); 
    //get the function
    include_once ('function.php');
    include_once 'data_calculation.php';
    $db_link = new database();
    $dc = new data_calculation();
    $DBH = $db_link->connect();
    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $limit = 120;
    $startpoint = ($page * $limit) - $limit;
        
        //to make pagination
    $statement = "ratan";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Pagination</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/A_green.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.records {
	width: 510px;
	margin: 5px;
	padding: 2px 5px;
	border: 1px solid #B6B6B6;
}

.record {
	color: #474747;
	margin: 5px 0;
	padding: 3px 5px;
	background: #E6E6E6;
	border: 1px solid #B6B6B6;
	cursor: pointer;
	letter-spacing: 2px;
}

.record:hover {
	background: #D3D2D2;
}

.round {
	-moz-border-radius: 8px;
	-khtml-border-radius: 8px;
	-webkit-border-radius: 8px;
	border-radius: 8px;
}

p.createdBy {
	padding: 5px;
	width: 510px;
	font-size: 15px;
	text-align: center;
}

p.createdBy a {
	color: #666666;
	text-decoration: none;
}
</style>
</head>

<body>
<?php
            //show records
	$sql = "SELECT * FROM ratan order by date desc LIMIT :start , :limit";
    $STH = $DBH->prepare($sql);
    $STH->bindParam(':start', $startpoint, PDO::PARAM_INT);
    $STH->bindParam(':limit', $limit, PDO::PARAM_INT);
    $STH->execute();
    $kalyan = $STH->fetchAll();
    $dc->complete_data($kalyan);
            
?>
	<div class="record round">
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
<?php echo pagination($statement,$limit,$page); ?>
	<p class="createdBy record round">
		<a
			href="http://www.awcore.com/dev/1/3/Create-Awesome-PHPMYSQL-Pagination_en">Read
			& Download on Advanced Web Core »</a>
	</p>
</body>
</html>