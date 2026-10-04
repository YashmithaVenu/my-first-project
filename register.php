<?php
include("db.php");

if(isset($_POST['fullname'])){

    $fullname = $_POST['fullname'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = mysqli_query($conn,
    "SELECT * FROM students WHERE email='$email'");

    if(mysqli_num_rows($check) > 0){

        echo "Email already registered!";

    } else {

        $sql = "INSERT INTO students
        (fullname, student_id, email, password)

        VALUES
        ('$fullname','$student_id','$email','$password')";

        if(mysqli_query($conn, $sql)){

            header("Location: login.html");
            exit();

        } else {

            echo "Registration Failed";

        }
    }

} else {

    echo "Form not submitted";

}
?>