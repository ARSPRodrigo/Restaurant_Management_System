<?php
	$q = intval($_GET['q']);

	// Create connection
	$con=mysqli_connect("localhost","root","root","restaurant");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if($q == 'all'){
		$selectAll = "SELECT * FROM STAFF";
		
		$result = mysqli_query($con,$selectAll);
		
		echo "<table border='1' class='gridtable'>
		<tr>
		<th>Staff ID</th>
		<th maxlength='10'>NIC</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Address</th>
		<th>Contact</th>
		<th>Gender</th>
		<th>Postion</th>
		<th>Salary</th>
		</tr>";

		while($row = mysqli_fetch_array($result)) {
		  echo "<tr>";
		  echo "<td>" . $row['Staff_ID'] . "</td>";
		  echo "<td>" . $row['NIC'] . "</td>";
		  echo "<td>" . $row['FName'] . "</td>";
		  echo "<td>" . $row['LName'] . "</td>";
		  echo "<td>" . $row['Address'] . "</td>";
		  echo "<td>" . $row['Contact'] . "</td>";
		  if($row['Gender'] == 1){ echo "<td> Male </td>"; } else{ echo "<td> Female </td>"; }
		  echo "<td>" . $row['Position'] . "</td>";
		  echo "<td>" . $row['Salary'] . "</td>";
		  echo "</tr>";
		}

		echo "</table>";
	}
	else{
		$sq = $q;
		$searchquery = "SELECT * FROM STAFF WHERE Staff_ID = '$sq' || NIC = '$sq' || FName = '$sq' || LName = '$sq' || Address = '$sq' || Contact = '$sq' || Position = '$sq' || Salary = '$sq'";
		
		$result = mysqli_query($con,$searchquery);
		
		echo "<table border='1' class='gridtable'>
		<tr>
		<th>Staff ID</th>
		<th>NIC</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Address</th>
		<th>Contact</th>
		<th>Gender</th>
		<th>Postion</th>
		<th>Salary</th>
		</tr>";

		while($row = mysqli_fetch_array($result)) {
		  echo "<tr>";
		  echo "<td>" . $row['Staff_ID'] . "</td>";
		  echo "<td>" . $row['NIC'] . "</td>";
		  echo "<td>" . $row['FName'] . "</td>";
		  echo "<td>" . $row['LName'] . "</td>";
		  echo "<td>" . $row['Address'] . "</td>";
		  echo "<td>" . $row['Contact'] . "</td>";
		  if($row['Gender'] == 1){ echo "<td> Male </td>"; } else{ echo "<td> Female </td>"; }
		  echo "<td>" . $row['Position'] . "</td>";
		  echo "<td>" . $row['Salary'] . "</td>";
		  echo "</tr>";
		}

		echo "</table>";
	}

mysqli_close($con);
?>