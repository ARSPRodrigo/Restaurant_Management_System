<!DOCTYPE>
<?php

	$host = "localhost";
	$userName = "root";
	$pasword = "root";
	$database = "restaurant";

	// Create connection
	$con=mysqli_connect($host, $userName, $pasword, $database);

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// define variables
	$currentst_id;
	$result;
	$st_id = '';
	$nic = '';
	$f_name = '';
	$l_name = '';
	$add = '';
	$tp_no = '';
	$position = '';
	$gender = '1';
	$salary = '';
	$up_status = '';
	
	// queries
		
	$selectMaxSql = "SELECT MAX(Staff_ID) FROM staff";
	
	$result = mysqli_query($con,$selectMaxSql);

	while($row = mysqli_fetch_array($result)) {
		$currentst_id = $row['MAX(Staff_ID)'];
	}
	
	if(isset($_POST['insert'])){
		// get the variables
		$st_id = $_POST["St_ID"];
		$nic = $_POST["NIC"];
		$f_name = $_POST["F_Name"];
		$l_name = $_POST["L_Name"];
		$add = $_POST["Address"];
		$tp_no = $_POST["Tp_NO"];
		$position = $_POST["Position"];
		$gender = $_POST["gender"];
		$salary = $_POST["Salary"];
		
		$insertSql = "INSERT INTO staff (Staff_ID, NIC, FName, LName, Address, Contact, Gender, Position, Salary)
		VALUES ('$st_id','$nic','$f_name','$l_name','$add','$tp_no','$gender','$position','$salary')";
		
		if(isset($st_id) || isset($nic) || isset($f_name) || isset($l_name) || isset($add) || isset($tp_no) || isset($position) || isset($gender) || isset($salary)){
		
			$insertSql = "INSERT INTO staff (Staff_ID, NIC, FName, LName, Address, Contact, Gender, Position, Salary)
			VALUES ('$st_id','$nic','$f_name','$l_name','$add','$tp_no','$gender','$position','$salary')";
			if (!mysqli_query($con,$insertSql)) {
					$up_status = "<p style='color:#e5060b;'>Error: " . mysqli_error($con)."</p>";
				}
				else{		
					$up_status = "<p style='color:#8be323;'>Sucessfully added</p>";
				}			
		}
		else{
			$up_status = "<p style='color:#e5060b;'>Error: There are empty</p>";
		}
	}
	
	if(isset($_POST['upSearchbtn'])){
		// get the variables if entered
		$st_id = $_POST["St_ID_up"];
		$nic = $_POST["NIC_up"];
		
		if(isset($st_id) || isset($nic)){
			$searchquery = "SELECT * FROM STAFF WHERE Staff_ID = '$st_id' || NIC = '$nic'";
			
			$result = mysqli_query($con,$searchquery);
			
			while($row = mysqli_fetch_array($result)) {
				$st_id = $row['Staff_ID'];
				$nic = $row['NIC'];
				$f_name = $row['FName'];;
				$l_name = $row['LName'];
				$add = $row['Address'];
				$tp_no = $row['Contact'];
				$gender = $row['Gender'];
				$position = $row['Position'];
				$salary = $row['Salary'];
			}
		}
	}
	
	if(isset($_POST['updateBtn'])){
		// get the new variables
		$st_idn = $_POST["St_ID_up"];
		$nicn = $_POST["NIC_up"];
		$f_namen = $_POST["F_Name_up"];
		$l_namen = $_POST["L_Name_up"];
		$addn = $_POST["Address_up"];
		$tp_non = $_POST["Tp_NO_up"];
		$positionn = $_POST["Position_up"];
		$gendern = $_POST["gender_up"];
		$salaryn = $_POST["Salary_up"];
		
		$updateSql = "UPDATE STAFF SET NIC = '$nicn', FName = '$f_namen', LName = '$l_namen', Address = '$addn', Contact = '$tp_non', Gender = '$gendern', Position = '$positionn', Salary = '$salaryn' WHERE Staff_ID = '$st_idn'";

		$result = mysqli_query($con,$updateSql);

		if (!$result) {
			$up_status = "<p style='color:#e5060b;'>Error: " . mysqli_error($con)."</p>";
		}else{		
			$up_status = "<p style='color:#8be323;'>Database updated</p>";
		}		
	}

	if(isset($_POST['deleteBtn'])){

		$st_id = $_POST["St_ID_dl"];

		$deleteSql = "DELETE FROM STAFF WHERE Staff_ID = '$st_id'";

		$result = mysqli_query($con,$deleteSql);

		if (!$result) {
				$up_status = "<p style='color:#e5060b;'>Error: " . mysqli_error($con)."</p>";
		}else{		
			$up_status = "<p style='color:#8be323;'>Sucessfully deleted</p>";
		}	
	}
?> 
<html>
<head>
    <title>Staff</title>
    <link rel="stylesheet" href="style/styles.css">
        <link rel="stylesheet" href="style/all.css">
    
    <style type="text/css">
      body { font-size: 80%; font-family: 'Lucida Grande', Verdana, Arial, Sans-Serif; }
      ul#tabs { list-style-type: none; margin: 30px 0 0 0; padding: 0 0 0.3em 0; }
      ul#tabs li { display: inline; }
      ul#tabs li a { color: #42454a; background-color: #dedbde; border: 1px solid #c9c3ba; border-bottom: none; padding: 0.3em; text-decoration: none; }
      ul#tabs li a:hover { background-color: #f1f0ee; }
      ul#tabs li a.selected { color: #000; background-color: #f1f0ee; font-weight: bold; padding: 0.7em 0.3em 0.38em 0.3em; }
      div.tabContent { border: 1px solid #c9c3ba; padding: 0.5em; background-color: #f1f0ee; }
      div.tabContent.hide { display: none; }
    </style>

<script type="text/javascript">
    //<![CDATA[

    var tabLinks = new Array();
    var contentDivs = new Array();

    function init() {

      // Grab the tab links and content divs from the page
      var tabListItems = document.getElementById('tabs').childNodes;
      for ( var i = 0; i < tabListItems.length; i++ ) {
        if ( tabListItems[i].nodeName == "LI" ) {
          var tabLink = getFirstChildWithTagName( tabListItems[i], 'A' );
          var id = getHash( tabLink.getAttribute('href') );
          tabLinks[id] = tabLink;
          contentDivs[id] = document.getElementById( id );
        }
      }

      // Assign onclick events to the tab links, and
      // highlight the first tab
      var i = 0;

      for ( var id in tabLinks ) {
        tabLinks[id].onclick = showTab;
        tabLinks[id].onfocus = function() { this.blur() };
        if ( i == 0 ) tabLinks[id].className = 'selected';
        i++;
      }

      // Hide all content divs except the first
      var i = 0;

      for ( var id in contentDivs ) {
        if ( i != 0 )  contentDivs[id].className = 'tabContent hide';
        i++;
      }
    }

    function showTab() {
      var selectedId = getHash( this.getAttribute('href') );

      // Highlight the selected tab, and dim all others.
      // Also show the selected content div, and hide all others.
      for ( var id in contentDivs ) {
        if ( id == selectedId ) {
          tabLinks[id].className = 'selected';
          contentDivs[id].className = 'tabContent';
        } else {
          tabLinks[id].className = '';
          contentDivs[id].className = 'tabContent hide';
        }
      }

      // Stop the browser following the link
      return false;
    }

    function getFirstChildWithTagName( element, tagName ) {
      for ( var i = 0; i < element.childNodes.length; i++ ) {
        if ( element.childNodes[i].nodeName == tagName ) return element.childNodes[i];
      }
    }

    function getHash( url ) {
      var hashPos = url.lastIndexOf ( '#' );
      return url.substring( hashPos + 1 );
    }

	function popitup(url) {
		newwindow=window.open(url,'name','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=350,addressbar=no');
		if (window.focus) {newwindow.focus()}
		return false;
	}
    //]]>
</script>

</head>

<!-- **************************************************************************************************** -->

<body class="trans" onload="init()" >
      <div class="main ">
          <div class="container register after-div">
              <h1 style ="font-size:70" align="center"><em>Staff Details</em></h1>

    <ul id="tabs">
      <li><a class="" href="#addStaff" id="addStaff_ID">Add Staff details</a></li>
      <li><a class="" href="#updateStaff" id="updateStaff_ID">Update Staff details</a></li>
      <li><a class="" href="#deleteStaff" id="deleteStaff_ID">Delete Staff details</a></li>
      <li><a class="" href="#showtable" id="showStaff_ID">View Staff details</a></li>
    </ul>

<!-- **************************************************************************************************** -->

    <div class="tabContent" id="addStaff">
      <h2>Add Staff details</h2>
      <div>
        <form name="form1" action="" method="post">
		<table>
		<tr>
			<td><B><p>Staff Id</p> </B></td>
			<td><input type="text" name="St_ID" class="txt-one awesome" value="<?php echo $currentst_id+1;?>"></td>
            
			<td><B><p>NIC</p> </B></td>
			<td><input type="text" name="NIC" class="txt-one awesome"></td>
		
		</tr>

		<tr>
			<td><B><p>First Name</p> </B></td>
			<td><input type="text" name="F_Name" class="txt-one awesome"></td>
            
            <td><B><p>Last Name</p> </B></td>
			<td><input type="text" name="L_Name" class="txt-one awesome"></td>
		</tr>

		<tr>
			<td><B><p>Address</p> </B></td>
			<td><input type="text" name="Address" class="txt-one awesome"></td>
            
            <td><B><p>Contact No</p> </B></td>
			<td><input type="text" name="Tp_NO" class="txt-one awesome"></td>
		</tr>

		<tr>
			<td><B><p>Position</p> </B></td>
			<td><input type="text" name="Position" class="txt-one awesome"></td>
            
            <td><B><p>Salary</p> </B></td>
			<td><input type="text" name="Salary" class="txt-one awesome"></td>
		</tr>

		<tr>
			<td><B><p>Gender </p></B></td>
			<td ><div style='margin:0 15 0 25;'><input type="radio" name="gender" value="Male" checked="true">Male
				<input type="radio" name="gender" value="Female" >Female</div></td>
		</tr>
		
		</table>
		<div style='margin:0 15 0 380;' >
            <input type="submit" value="Add" class="btn-awesome" name="insert">
			<input type="reset" value="Clear" class="btn-awesome">
			<input type="button" value="Exit"class="btn-awesome" onclick="location.href='login.php';">
		</div>
		</form>
      </div>
    </div>

<!-- **************************************************************************************************** -->

    <div class="tabContent hide" id="updateStaff">
      <h2>Update Staff details</h2>
      <div>
        <form name="form1" action="" method="post">
		<table>
		<tr>
			<td><B><p>Staff Id</p> </B></td>
			<td><input type="text" name="St_ID_up" value="<?php echo $st_id; ?>" <?php echo "placeholder='Can be used to search'"; ?> class="txt-one awesome"></td>
            
			<td><B><p>NIC</p> </B></td>
			<td><input type="text" name="NIC_up" value="<?php echo $nic; ?>" <?php echo "placeholder='Can be used to search'"; ?> class="txt-one awesome"></td>
		
		</tr>

		<tr>
			<td><B><p>First Name</p> </B></td>
			<td><input type="text" name="F_Name_up" value="<?php echo $f_name; ?>" class="txt-one awesome"></td>
            
            <td><B><p>Last Name</p> </B></td>
			<td><input type="text" name="L_Name_up" value="<?php echo $l_name; ?>" class="txt-one awesome"></td>
		</tr>

		<tr>
			<td><B><p>Address</p> </B></td>
			<td><input type="text" name="Address_up" value="<?php echo $add; ?>" class="txt-one awesome"></td>
            
            <td><B><p>Contact No</p> </B></td>
			<td><input type="text" name="Tp_NO_up" value="<?php echo $tp_no; ?>" class="txt-one awesome"></td>
		</tr>

		<tr>
			<td><B><p>Position</p> </B></td>
			<td><input type="text" name="Position_up" value="<?php echo $position; ?>" class="txt-one awesome"></td>
            
            <td><B><p>Salary</p> </B></td>
			<td><input type="text" name="Salary_up" value="<?php echo $salary; ?>" class="txt-one awesome"></td>
		</tr>

		<tr>
			<td><B><p>Gender </p></B></td>
			<td ><div style='margin:0 15 0 25;'>
				<?php
					if($gender == '1'){ 
						echo "<input type='radio' name='gender_up' value='Male' checked='true'>Male";
						echo "<input type='radio' name='gender_up' value='Male'>Female";
					} 
					else if($gender == '0'){
						echo "<input type='radio' name='gender_up' value='Male' >Male";
						echo "<input type='radio' name='gender_up' value='Male' checked='true'>Female";
					}
				?>
			</div></td>
		</tr>

		</table><div style='margin:0 15 0 380;'>
            <input type="submit" value="Search" class="btn-awesome" name="upSearchbtn">
			<input type="submit" value="Update" class="btn-awesome" name="updateBtn">
			<input type="button" value="Exit"class="btn-awesome" onclick="location.href='login.php';">
            </div>
		</form>
      </div>
    </div>

<!-- **************************************************************************************************** -->

    <div class="tabContent hide" id="deleteStaff">
      <h2>Delete Staff details</h2>
      <div>
        <form name="form1" action="" method="post">
		<div style='margin:0 15 0 210;'>
			<table>
		<tr>
			<td><B><p>Staff Id</p> </B></td>
			<td><input type="text" name="St_ID_dl" class="txt-one awesome"></td>		
		</tr>

		<tr>
			<td><B><p></p> </B></td>
			<td></td>
		</tr>
		</table>
		</div>
		<div style='margin:0 15 0 400;'>
			<input type="submit" value="Delete" class="btn-awesome" name="deleteBtn">
			<input type="button" value="Exit"class="btn-awesome" onclick="location.href='login.php';">
		</div>
		</form>
      </div>
	</div>
    


<!-- **************************************************************************************************** -->

    <div class="tabContent hide" id="showtable">
      <h2>View Staff details</h2>
      <div>
	  <form name="form1" action="" method="post">
		<table>

		<tr>
			<td><input type="button" value="View All" class="btn-awesome" name="viewAll" onclick="showStaff('all')"></td>
			<td><div style='margin:0 0 0 50;'><input type="text" name="txt" class="txt-one awesome" id="txt">
			<input type="button" value="Search" class="btn-awesome" name="search"  onclick="showStaff(txt.value)"></div></td>
			
		</tr>

		<tr>
			<td>
			<input type="button" value="Exit"class="btn-awesome" onclick="location.href='login.php';">
			</td>
		</tr>
		</table>
		</form>
		<br>
		<div id="txtDis"><b>Results will be displayed here.</b></div>
		<script>
			function showStaff(str) {
			  if (str=="") {
			    document.getElementById("txtDis").innerHTML="";
			    return;
			  }
			  if (window.XMLHttpRequest) {
			    // code for IE7+, Firefox, Chrome, Opera, Safari
			    xmlhttp=new XMLHttpRequest();
			  } else { // code for IE6, IE5
			    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  xmlhttp.onreadystatechange=function() {
			    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			      document.getElementById("txtDis").innerHTML=xmlhttp.responseText;
			    }
			  }
			  xmlhttp.open("get","staffSearch.php?q="+str,true);
			  xmlhttp.send();
			}
		</script>

	  </div>
	</div>
	<?php echo $up_status; ?>
   </div>
  </div>
</body>
</html>