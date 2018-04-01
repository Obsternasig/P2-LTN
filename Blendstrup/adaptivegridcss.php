<?php header("Content-type: text/css"); 

	require_once "../Blendstrup/connection.php";

	$results = mysqli_query($connection, "SELECT * FROM switches");

	if(!$results) {
		die("Could not query the database" .mysqli_error());
	}


	$row = mysqli_fetch_assoc($results);
		
		$away = $row['away'];
		$broken = $row['broken'];

	$white = "#ffffff";
	$blue = "#334488";
	$red = "#e95522";
	$g9 = "#909090";
	$g8 = "#808080";
	$g7 = "#707070";
	$g6 = "#606060";
	$g5 = "#505050";
	$g4 = "#404040";
	$g3 = "#303030";
	$g2 = "#202020";
	$g1 = "#101010";

?>

@import url('https://fonts.googleapis.com/css?family=Noto+Sans:400,400i|Roboto:300,500');

html, body {
	margin: 0;
}

.grid {
	text-align: center;
	font-size: 2vw;
	color: white;
	font-family: 'Noto Sans', sans-serif;

	display: grid;
	grid-template-columns: 1fr 4fr 2fr;
	grid-template-rows: 15vh 50vh 35vh;
}

.logo {
	background-color: orangered;
	grid-column-start: 1;
	grid-column-end: 2;
	grid-row-start: 1;
	grid-row-end: 2;
}

.search {
	background-color: coral;
	grid-column-start: 2;
	grid-column-end: 3;
	grid-row-start: 1;
	grid-row-end: 2;
}

.end {
	background-color: lightsalmon;
	grid-column-start: 3;
	grid-column-end: 4;
	grid-row-start: 1;
	grid-row-end: 2;
}

.functions {
	background-color: cadetblue;
	grid-column-start: 1;
	grid-column-end: 2;
	grid-row-start: 2;
	grid-row-end: 3;
}

.shoppinglist {
	background-color: darkorange;
	grid-column-start: 1;
	grid-column-end: 2;
	grid-row-start: 3;
	grid-row-end: 4;
}

.list {
	background-color: #909090;
	grid-column-start: 2;
	grid-column-end: 3;
	grid-row-start: 2;
	grid-row-end: 4;
	
	overflow-y: scroll;
	text-align: left;
}

.list ul {
	margin-left: -0.6vw;
}

.list div {
	display: inline-block;
	overflow: hidden;
	width: 12vw;
	font-size: 1.2vw;
}

.status {
	border-top: solid;
	border-top-color: #505050;
	padding-top: 1vh;
	height: 3.5vh;
	font-style: italic;
}

#firststatus {
	margin: 1vh 0  0 16.2vw;
	color: <?php if($away == 0) { echo "$white"; } else { echo "$blue"; } ?>
}

#kate {
	font-family: 'Roboto', sans-serif;
	font-weight: 500;
	font-size: 1.5vw;
	text-align: right;
	text-transform: uppercase;
	margin: 0 1vw;
	padding-right: 1vw;
	border-right: solid;
	border-right-color: #505050;
}

hr {
	border: none;
	background-color: #404040;
	margin-left: -2vw;
	height: 0.7vh;
}

.information {
	background-color: dimgrey;
	grid-column-start: 3;
	grid-column-end: 4;
	grid-row-start: 2;
	grid-row-end: 4;
	text-transform: uppercase;
	font-size: 1vw;
	overflow-y: scroll;
}

<?php
	mysqli_close($connection);
?>