<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Search Engine</title>
</head>

<body>
	<form action="../searchengine.php" method="POST">
		<input type= "text" name= "search" placeholder="Search" />
		<button type="submit" name="submit-search">Search</button>
	</form>
	
</body>
</html>

<?php 
	require_once "../connection.php";

	$sql = "SELECT * FROM komponenter";
	$result = mysqli_query($connection, $sql);
	$queryResults = mysqli_num_rows($result);
	
		if ($queryResults > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "<div>
					<h3>" .$row['category']."</h3> 
					<p>" .$row['brand']. "</p>
					</div>";
			}
		}
mysqli_close($connection);
?>

