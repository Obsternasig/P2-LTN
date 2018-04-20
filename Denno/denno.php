<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
	require_once "connection.php";
$q = intval($_GET['q']);

mysqli_select_db($connection,"4ndy_dk");
$sql="SELECT * FROM Komponenter WHERE brand = '".$q."'";
$result = mysqli_query($connection,$sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['category'] . "</td>";
    echo "<td>" . $row['brand'] . "</td>";
    echo "<td>" . $row['serialnb'] . "</td>";
    echo "<td>" . $row['ports'] . "</td>";
    echo "<td>" . $row['speed'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($connection);
?>
</body>
</html>