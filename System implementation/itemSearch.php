<?php
	$q = $_GET['q'];
	// Create connection
	$con=mysqli_connect("localhost","root","root","restaurant");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sq = 'S'.$q;

	$searchquery = "SELECT * FROM meal_catagory ";

	$result = mysqli_query($con,$searchquery);
	
	echo "<select class='full-select' id=".$sq." onChange='javascript:setMeal(mTr,this)'>";
	echo "<option value='cat-one'>Select category</option>";

	while($row = mysqli_fetch_array($result)) {


		$tNo = $row['MCName'];
		echo "<option value='cat-one'>".$tNo."</option>";
	}

	echo "</select>";

mysqli_close($con);
?>