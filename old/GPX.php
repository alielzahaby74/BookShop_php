<?php
	require "conn.php";
	$query = "SELECT title, available FROM books";
	$stmt = $conn->query($query);
	/*while ($row = $stmt->fetch()) {
		$title = strtoupper($row["title"]);
		echo "<div class='container'>";
		echo "<div class='ad'>".
			 "<span class='left'>".
			 $title .
			 "</span>".
			 "<span class='right'>".
			 " AVAILABLE: " . 
			 $row["available"] . 
			 "</span>".
			 "</div>";
		echo "</div>";
	}
	echo  "<br class='clearfix'><br>";*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>library</title>
	<style type="text/css">
		.container{
			padding: 0;
			margin: 0;
		}
		.container .ad{
			display: inline-block;
			float: left;
			font-weight: bold;
			margin: 5px;
			padding: 5px;
			width: 30%;
			height: 5%;
		}
		.container .ad .left
		{
			float: left;
		}
		.container .ad .right
		{
			color: #F00;
			float: right;
		}
		.clearfix{
			clear: both;
		}
	</style>
</head>
<body>
	<div class='container'>
		<?php foreach ($stmt->fetchAll() as $row) { 
			?>
			<div class='ad'>
				 <span class='left'>
				 	<?php echo strtoupper($row["title"]); ?>
				 </span>
				 <span class='right'>
				 AVAILABLE: 
				 <?php echo $row["available"]; ?>
				 </span>
			 </div>
		 <?php } ?>
	</div>
	<form method="POST" action="">
		<div style="margin-left: 35%">
			<input type="text" name="title">
			<select name="available">
				<?php for($i = 1;$i <= 50;$i++) echo "<option>" . $i . "</option>"?>
			</select>
			<input type="submit" name="submit" value="Buy">
		</div>
	</form>
</body>
</html>