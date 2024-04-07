<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "table";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = isset($_POST['name']) ? $_POST['name'] : "";
$contact = isset($_POST['contact']) ? $_POST['contact'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$industry = isset($_POST['industry']) ? $_POST['industry'] : "";
$skills = isset($_POST['skills']) ? $_POST['skills'] : "";

// SQL to insert data into database
$sql = "INSERT INTO mentors (name, contact, email, industry, skills)
        VALUES ('$name', '$contact', '$email', '$industry', '$skills')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
