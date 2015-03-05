<?php
	$m = intval($_GET['m']); // sQty
	$n = $_GET['n']; // sPc id
	$k = $_GET['k']; // meal
	// Create connection
	$con=mysqli_connect("localhost","root","root","restaurant");

	echo "aaaaaaaaaaaaaaaaa";

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sm = 'S'.$m;

	$searchquery = "SELECT Price FROM meal WHERE Name = '$k'";

	$result = mysqli_query($con,$searchquery);

	while($row = mysqli_fetch_array($result)) {

		$tNo = $row['Price'];
		echo "<span class='full-select right-al'>".$tNo*$m.".00</span>";
	}

	echo "</select>";
mysqli_close($con);
?>