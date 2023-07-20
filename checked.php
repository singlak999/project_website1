<?php
 $conn = new mysqli("localhost", "root", "", "hospital_db");
    
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM patient WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location:  patient_records.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header("Location: patient_records.php");
}

$conn->close();