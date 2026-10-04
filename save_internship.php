<?php
session_start();
include("db.php");

$company = $_POST['company'];
$position = $_POST['position'];

$user_email = $_SESSION['email'];

$resume_name = basename($_FILES['resume']['name']);
$tmp_name = $_FILES['resume']['tmp_name'];

$uploadDir = __DIR__ . "/upload/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$folder = $uploadDir . $resume_name;

if ($_FILES['resume']['error'] !== UPLOAD_ERR_OK || !move_uploaded_file($tmp_name, $folder)) {
    die('Failed to upload resume. Please try again.');
}

$sql = "INSERT INTO internships
(company, position, status, resume, user_email, date_applied)

VALUES
('$company', '$position', 'Applied', '$resume_name', '$user_email', CURDATE())";

mysqli_query($conn, $sql);

header("Location: dashboard.php");
exit();
?>