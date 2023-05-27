<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "register_students";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    // Insert data into the database
    $sql = "INSERT INTO students (Full_name, email, gender) VALUES ('$fullname', '$email', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

$conn->close();
?>
