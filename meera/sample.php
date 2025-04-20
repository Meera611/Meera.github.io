<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  // Check if form is submitted
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO test (fullname, email, phonenumber, subject, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $fullname, $email, $phonenumber, $subject, $message);

    // Execute the statement and check if it's successful
    if ($stmt->execute()) {
      echo "Message added successfully!";
    } else {
      echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
  }
}
?>
