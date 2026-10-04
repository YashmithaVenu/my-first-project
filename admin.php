<?php
session_start();
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">

<style>

.admin-container{
    padding:20px;
}

.admin-title{
    margin-bottom:30px;
}

.status-btn{
    padding:8px 12px;
    border:none;
    border-radius:5px;
    color:white;
    cursor:pointer;
}

.review{
    background:orange;
}

.accept{
    background:green;
}

.reject{
    background:red;
}

.resume-link{
    text-decoration:none;
    color:blue;
    font-weight:bold;
}

</style>

</head>

<body>

<nav class="sidebar">

<h2>Admin Panel</h2>

<ul>
<li><a href="dashboard.php">Student Dashboard</a></li>
<li><a href="admin.php" class="active">Admin Dashboard</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>

</nav>

<main class="main-content">

<div class="admin-container">

<h1 class="admin-title">All Internship Applications</h1>

<div class="table-container">

<table>

<thead>

<tr>
<th>Applicant Email</th>
<th>Company</th>
<th>Position</th>
<th>Status</th>
<th>Resume</th>
<th>Actions</th>
</tr>

</thead>

<tbody>

<?php

$result = mysqli_query($conn, "SELECT * FROM internships");

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['user_email']; ?></td>

<td><?php echo $row['company']; ?></td>

<td><?php echo $row['position']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>
<?php
$resumePath = __DIR__ . '/upload/' . $row['resume'];
$resumeUrl = 'upload/' . rawurlencode($row['resume']);
if ($row['resume'] && file_exists($resumePath)) {
    echo '<a class="resume-link" href="' . htmlspecialchars($resumeUrl) . '" target="_blank">View Resume</a>';
} else {
    echo 'Resume file missing';
}
?>
</td>

<td>

<a href="update_status.php?id=<?php echo $row['id']; ?>&status=Interview">

<button class="status-btn review">
Interview
</button>

</a>

<a href="update_status.php?id=<?php echo $row['id']; ?>&status=Accepted">

<button class="status-btn accept">
Accept
</button>

</a>

<a href="update_status.php?id=<?php echo $row['id']; ?>&status=Rejected">

<button class="status-btn reject">
Reject
</button>

</a>

</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</div>

</main>

</body>
</html>