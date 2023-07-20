<?php
// start session
// session_start();

// // if user is already logged in, redirect to patient_records.php
// if(isset($_SESSION['username'])) {
//     header("Location: patient_records.php");
//     exit;
// }

// if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_db";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // query doctor table
    $sql = "SELECT * FROM doctor WHERE user_name='$username' AND password='$password'";
    $result = $conn->query($sql);
    
    // if user exists, redirect to patient_records.php
    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: patient_records.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor Login</title>
	<style>
		form {
			border: 3px solid #f1f1f1;
			margin: 20px auto;
			width: 50%;
			padding: 20px;
            background: rgb(103,0,231);
background: linear-gradient(90deg, rgba(103,0,231,1) 1%, rgba(16,27,219,1) 1%, rgba(0,254,255,1) 100%);
		}
		
		input[type=text], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}
		
		button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
		}
        h2{
         text-align: center;
         color: wheat;
         
        }
        body{
            background: rgb(103,0,231);
background: linear-gradient(90deg, rgba(103,0,231,1) 1%, rgba(16,27,219,1) 1%, rgba(0,254,255,1) 100%);
        }
		
		button:hover {
			opacity: 0.8;
		}
		
		.container {
			padding: 16px;
		}
		
		span.psw {
			float: right;
			padding-top: 16px;
		}
		
		@media screen and (max-width: 300px) {
			span.psw {
				display: block;
				float: none;
			}
			.loginbtn {
				width: 100%;
			}
		}
	</style>
</head>
<body>
	<h2>Doctor Login</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="container">
			<label for="username"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>
		
			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>
        
			<button type="submit">Login</button>
		</div>
	</form>
</body>
</html>
