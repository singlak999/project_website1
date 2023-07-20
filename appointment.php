<!DOCTYPE html>
<html>
<head>
	<title>Patient Doctor Appointment Form</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f0f0f0;
		}

		form {
			background-color: #fff;
			padding: 40px;
			max-width: 500px;
			margin: 0 auto;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0,0,0,0.3);
		}

		input[type=text], input[type=email], input[type=tel], select, textarea {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			resize: vertical;
		}

		label {
			padding: 12px 0 6px 0;
			display: block;
			font-weight: bold;
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: #fff;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}

		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		.col-25 {
			flex: 25%;
			max-width: 25%;
		}

		.col-75 {
			flex: 75%;
			max-width: 75%;
		}
	</style>
</head>
<body>
	<form method="post" >
		<div class="container">
			<div class="col-25">
				<label for="name">Patient Name</label><br>
			</div>
			<div class="col-75">
				<input type="text" id="name" name="name" placeholder="Enter your full name">
			</div>
		</div>
		<div class="container">
			<div class="col-25">
				<label for="email">Email Address</label><br>
			</div>
			<div class="col-75">
				<input type="email" id="email" name="email" placeholder="Enter your email address">
			</div>
		</div>
		<div class="container">
			<div class="col-25">
				<label for="phone">Phone Number</label><br>
			</div>
			<div class="col-75">
				<input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
			</div>
		</div>
		<div class="container">
			<div class="col-25">
				<label for="appointment-date">Appointment Date</label>
			</div>
			<div class="col-75">
				<input type="date" id="appointment-date" name="appointment_date">
			</div>
		</div>
		<div class="container">
			<div class="col-25">
				<label for="appointment-time">Appointment Time</label>
			</div>
			<div class="col-75">
				<input type="time" id="appointment-time" name="appointment_time">
</div>
</div>
<div class="container">
<div class="col-25">
<label for="doctor">Doctor's Name</label><br>
</div>
<div class="col-75">
<select id="doctor" name="doctor">
<option value="Dr. Smith">Dr. Smith</option>
<option value="Dr. Johnson">Dr. Johnson</option>
<option value="Dr. Williams">Dr. Williams</option>
<option value="Dr. Brown">Dr. Brown</option>
</select>
</div>
</div>
<div class="container">
<div class="col-25">
<label for="message">Message</label>
</div>
<div class="col-75">
<textarea id="message" name="message" placeholder="Enter any additional information"></textarea>
</div>
</div>
<div class="container">
<input type="submit" name ="submit" value="Submit">
</div>
</form>
<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// retrieve form data
if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$doctor = $_POST['doctor'];
$message = $_POST['message'];

// insert form data into patient table
$sql = "INSERT INTO patient (patient_name, email, phone, appointment_date, appointment_time, doctor, message)
VALUES ('$name', '$email', '$phone', '$appointment_date', '$appointment_time', '$doctor', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>

</body>
</html>
