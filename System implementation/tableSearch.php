<?php
	$q = intval($_GET['q']);

	// Create connection
	$con=mysqli_connect("localhost","root","root","restaurant");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sq = $q;

	$searchquery = "SELECT T_No, T_SIZE FROM _TABLE WHERE (T_Availability = 1 AND T_SIZE >= '$sq') || ('$sq' >= (SELECT MAX(T_SIZE) FROM _TABLE) AND T_Availability = 1) ORDER BY T_SIZE";

	$result = mysqli_query($con,$searchquery);
	
	echo "<select name='decision' style='line-height:5px;' class='select-shayn txt-shayn txt-shayn-dark txt-shayn-one' size='1'>
	<option selected> | &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Table No &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Size &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|";

	while($row = mysqli_fetch_array($result)) {
		$tNo = $row['T_No'];
		if($row['T_No'] < 10){ $tNo = '0'.$row['T_No'] ; }
	  echo "<option> | &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $tNo . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp | &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp". $row['T_SIZE'] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp |";
	}

	echo "</select>";

mysqli_close($con);
?>