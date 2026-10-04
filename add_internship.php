<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Internship</title>

<style>

body{
    margin:0;
    padding:0;
    font-family: Arial, sans-serif;
    background: linear-gradient(to right, #1e3c72, #2a5298);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.container{
    width:400px;
    background:white;
    padding:40px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

h2{
    text-align:center;
    margin-bottom:30px;
    color:#1e3c72;
}

label{
    font-weight:bold;
    color:#333;
}

input, select{
    width:100%;
    padding:12px;
    margin-top:8px;
    margin-bottom:20px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:16px;
}

button{
    width:100%;
    padding:12px;
    background:#1e3c72;
    color:white;
    border:none;
    border-radius:8px;
    font-size:18px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#2a5298;
    transform:scale(1.03);
}

</style>
</head>

<body>

<div class="container">

<h2>Add New Application</h2>

<form action="save_internship.php" method="POST" enctype="multipart/form-data">

<label>Company</label>
<input type="text" name="company" required>

<label>Position</label>
<input type="text" name="position" required>

<label>Upload Resume (PDF)</label>
<input type="file" name="resume" accept=".pdf" required>

<button type="submit">Apply Application</button>

</form>

</div>

</body>
</html>
