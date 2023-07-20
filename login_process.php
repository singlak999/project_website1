<?php
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
    $sql = "SELECT * FROM patient_info WHERE user_name='$username' AND password='$password'";
    $result = $conn->query($sql);
    
    // if user exists, redirect to patient_records.php
    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: deshbord_patient.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }
    
    $conn->close();
}
?>