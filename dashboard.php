<?php
session_start();
include("db.php");
if(!isset($_SESSION['email'])){
    header("Location: login.html");
    exit();
}

$user_email = $_SESSION['email'];
$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t 
FROM internships 
WHERE user_email='$user_email'"))['t'];

$applied = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as a 
FROM internships 
WHERE status='Applied' 
AND user_email='$user_email'"))['a'];

$interview = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as i 
FROM internships 
WHERE status='Interview' 
AND user_email='$user_email'"))['i'];

$rejected = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as r 
FROM internships 
WHERE status='Rejected' 
AND user_email='$user_email'"))['r'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Internship Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="sidebar">
        <h2>Internship App</h2>
        <ul>
            <li><a href="#" class="active">Dashboard</a></li>
            <li><a href="add_internship.php">Add Application</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <main class="main-content">
        <header>
            <h1>My Applications</h1>
            <a href="add_internship.php" class="btn-add">+ New Application</a>
        </header>

        <section class="stats-container">
            <div class="card">
                <h3>Total</h3>
                <p class="count"><?php echo $total; ?></p>
            </div>
            <div class="card">
                <h3>Applied</h3>
                <p class="count"><?php echo $applied; ?></p>
            </div>
            <div class="card">
                <h3>Interview</h3>
                <p class="count"><?php echo $interview; ?></p>
            </div>
            <div class="card">
                <h3>Rejected</h3>
                <p class="count"><?php echo $rejected; ?></p>
            </div>
        </section>

        <section class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Position</th>
                        <th>Date Applied</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

<?php
$result = mysqli_query($conn, "SELECT * FROM internships
WHERE user_email='$user_email'");

while($row = mysqli_fetch_assoc($result)) {
?>

<tr>

<td><?php echo $row['company']; ?></td>

<td><?php echo $row['position']; ?></td>

<td><?php echo $row['date_applied']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>
<?php
$resumePath = __DIR__ . '/upload/' . $row['resume'];
$resumeUrl = 'upload/' . rawurlencode($row['resume']);
if ($row['resume'] && file_exists($resumePath)) {
    echo '<a href="' . htmlspecialchars($resumeUrl) . '" target="_blank">View Resume</a>';
} else {
    echo 'Resume file missing';
}
?>
</td>

</tr>

<?php
}
?>

</tbody>
               
               
                    
            </table>
        </section>
    </main>
</body>
</html>