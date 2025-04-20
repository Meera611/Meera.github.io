<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $sql = "INSERT INTO test(fullname, email, phonenumber, subject, message) values('".$fullname. "','".$email."','".$phonenumber."','".$subject."','".$message."')";
  if (mysqli_query($conn, $sql)){
    echo "Connected successfully";
  }
  else{
    echo "Error to insert";
  }
  $conn->close();
}