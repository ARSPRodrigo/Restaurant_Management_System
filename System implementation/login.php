<!DOCTYPE HTML>
<?php
if(isset($_POST["username"]) AND isset($_POST["password"])){
    if($_POST["username"] == "admin" and $_POST["password"] == "root"){
        header("Location: "."Adminmain.php");
    }
    else if($_POST["username"] == "staff" and $_POST["password"] == "root"){
        header("Location: "."staffmain.php");
    }
	else{
		$_SESSION['user_id'] = '';
        header("Location: "."login.php");
        exit;
    }
}

?>

<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>DAILY FOOD</title>
	<link rel="stylesheet" href="style/style.css" />
</head>
<body>
    <div class="wrapper">
        <div class="lg-container">
            <img src="img/logo.png" id="logo">
            <form action="" id="lg-form" name="lg-form" method="post">

                <div>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" placeholder="username"/>
                </div>

                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="password" />
                </div>

                <div>				
                    <button type="submit" id="login">Login</button>
                </div>

            </form>
            <div id="message"></div>
        </div>
    </div>
</body>
</html>