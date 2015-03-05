<?php
	$m = $_GET['m'];
	$n = $_GET['n'];
	// Create connection
	$con=mysqli_connect("localhost","root","root","restaurant");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sm = 'S'.$m;

	$searchquery = "SELECT * FROM meal WHERE MCID = (SELECT MCID FROM meal_catagory WHERE MCName = '$n')";

	$result = mysqli_query($con,$searchquery);
	echo "<select class='full-select' id=".$sm." onChange='javascript:setPrice(sQty,sPc,this)'>";
	echo "<option value='cat-one'>Select category</option>";

	while($row = mysqli_fetch_array($result)) {

		$tNo = $row['Name'];
		echo "<option value=\'fd-one\'>".$tNo."</option>";
	}

	echo "</select>";
mysqli_close($con);
?>