<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="table.css">
    <style>  
    body{
            background: rgb(103,0,231);
           background: linear-gradient(90deg, rgba(103,0,231,1) 1%, rgba(16,27,219,1) 1%, rgba(0,254,255,1) 100%);
        }
        </style>
</head>

<?php 

          $conn = new mysqli("localhost", "root", "", "hospital_db");
    
         if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
         }
		$sql = "SELECT * FROM patient";
		$result = $conn->query($sql);
		
		// Display data in table format
		if ($result === false) {
			die("Error executing query: " . mysqli_error($conn));
		}
		elseif ($result->num_rows > 0) {
			echo "<table>";
			echo "<tr><th>ID</th><th>Patient_Name</th><th>Email</th><th>Phone_Name</th><th>Appointment_date</th>><th>Appointment_time</th><th>Doctor</th><th>Message</th><th>Action</th></tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
                echo "<td>".$row["ID"]."</td>";
				echo "<td>".$row["patient_name"]."</td>";
				echo "<td>".$row["email"]."</td>";
				echo "<td>".$row["phone"]."</td>";
				echo "<td>".$row["appointment_date"]."</td>";
                echo "<td>".$row["appointment_time"]."</td>";
                echo "<td>".$row["doctor"]."</td>";
                echo "<td>".$row["message"]."</td>";
				echo "<td><a href='checked.php?id=" . $row["ID"] . "'>Checked</a></td>";
 
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No results";
		}
	 
	 ?>
</body>
</html>