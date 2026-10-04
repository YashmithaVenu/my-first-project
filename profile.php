<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Internship Tracker</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Specific styles for the profile page */
        .profile-card {
            background-color: #1e1e1e; /* Matching your dark theme in image.png */
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        .profile-img {
            width: 180px; /* Increased size as requested */
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #007bff;
            margin-bottom: 15px;
        }

        .upload-btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
        }

        .upload-btn:hover {
            background-color: #0056b3;
        }

        /* Status pill styling consistent with image_2.png */
        .status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
        }
        .status.interview { background-color: #f39c12; color: white; }
        .status.applied { background-color: #27ae60; color: white; }
    </style>
</head>
<body>
    <!-- Sidebar structure from image.png -->
    <nav class="sidebar">
        <h2>Internship App</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="add_internship.php">Add Application</a></li>
            <li><a href="" class="active">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <main class="main-content">
        <header>
            <h1>User Profile</h1>
        </header>

        <section class="profile-section">
            <div class="profile-card">
                <!-- Profile Image & Upload -->
                <img src="https://via.placeholder.com/120" id="profilePic" class="profile-img" alt="Profile Photo">
                <br>
                <label for="file-upload" class="upload-btn">Change Photo</label>
                <input type="file" id="file-upload" style="display:none;" accept="image/*" onchange="loadFile(event)">
                
                <h2 style="color: white; margin-top: 15px;">Your Name</h2>
                <p style="color: #888;">Internship Application</p>
            </div>

            <!-- Application Tracking Table matching image_2.png -->
            <div class="table-container">
                <h3>My Applications</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

<?php
include("db.php");

$result = mysqli_query($conn, "SELECT * FROM internships");

while($row = mysqli_fetch_assoc($result)) {
?>

<tr>
    <td><?php echo $row['company']; ?></td>

    <td><?php echo $row['position']; ?></td>

    <td>
        <span class="status">
            <?php echo $row['status']; ?>
        </span>
    </td>
</tr>

<?php
}
?>

</tbody>
                </table>
            </div>
        </section>
    </main>

    <script>
        // Logic to update the photo immediately after selection
        var loadFile = function(event) {
            var output = document.getElementById('profilePic');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
</body>
</html>