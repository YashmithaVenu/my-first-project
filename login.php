<?php
session_start();
include("db.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM students
WHERE email='$email'
AND password='$password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    $_SESSION['email'] = $email;

    header("Location: dashboard.php");
    exit();

} else {

    echo "Invalid Email or Password!";

}
?>