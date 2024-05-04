<?php
// Start session
session_start();

// Include database connection
include '../login.php';

// Check if the user is logged in
if(!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("location: ../index.html");
    exit; // Ensure script stops here
}

// Retrieve user data from the database using session user_id
$user_id = $_SESSION['user_id'];
$query = mysqli_query($con, "SELECT * FROM student_register WHERE id = '$user_id'");
$row = mysqli_fetch_array($query);
$name = $row['name']; // Retrieve the name of the student

// Query the cv_detail table to retrieve user details
$email = $row['email'];
$cv_query = mysqli_query($con, "SELECT * FROM cv_detail WHERE email = '$email'");
$cv_row = mysqli_fetch_array($cv_query);

$cv_id = ($cv_row) ? $cv_row['id'] : null;



// Retrieve user details
$name_cv = $cv_row['name'];
$email_cv = $cv_row['email'];
$birth = $cv_row['birth'];
$gender = $cv_row['gender'];
$number = $cv_row['number'];
$address = $cv_row['address'];
$course = $cv_row['course']; // Retrieve course from cv_detail
$sem = $cv_row['sem']; // Retrieve semester from cv_detail


$profile_query = mysqli_query($con, "SELECT * FROM profile_detail WHERE user_id = '$user_id'");
$profile_count = mysqli_num_rows($profile_query);

if ($profile_count == 0) {
    // If no record exists, insert user details into profile_detail table
    mysqli_query($con, "INSERT INTO profile_detail (user_id, name, email, birth, gender, number, address, course, sem) 
                    VALUES ('$user_id', '$name_cv', '$email_cv', '$birth', '$gender', '$number', '$address','$course','$sem')");
}
$update_profile_query = mysqli_query($con, "UPDATE profile_detail SET name = '$name_cv', email = '$email_cv', birth = '$birth', gender = '$gender', number = '$number', address = '$address', course = '$course', sem = '$sem' WHERE user_id = '$user_id'");


?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/b4c3b57203.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./student-dashboard.css">
<title>Student Dashboard</title>
<style>

  nav {
 background-color:rgb(65, 64, 64);
 height:5rem;
}
.menu {
  background-color:rgb(84, 83, 83);
}


.menu .items a.active,
.menu .items a:hover {
    color: lightblue;
}
/* profile form */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}



.user-details {
    display: flex;
    justify-content: center;
    margin-top: 50px;
}

.profile-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 30px;
    width: 550px;
}

.profile-card h2 {
    color: #333;
    margin-bottom: 20px;
    font-size:30px;
}

.profile-card p {
    color: #555;
    margin-bottom: 15px;
    font-size:20px;
}

.profile-card span {
    font-weight: bold;
}

.profile-card .icon {
    margin-right: 10px;
}

</style>
</head>
<body>
<nav>
 <div class="nav-bar">
   <div class="heading">
     <h1>Student Dashboard</h1>
   </div>

   <div class="logout-button" style="display:flex;flex-direction:row;justify-content:space-around">
   <div><h1 style="color:white;padding-right:20px;">Welcome, <?php echo $email; ?></h1></div>
   </div>
 </div>
</nav>  

<!--side-bar-->
<div class="menu">
 
  <div class="items"><a href="./student-dashboard.php">Dashboard</a></div><hr/>
  <div class="items"><a class="active" href="./profile.php">Profile</a></div><hr>
  <div class="items"><a href="./view-cv.php">View PDF File</a></div><hr>
  <div class="items"><a href="update-cv.php?cv_id=<?php echo $cv_id; ?>">Update CV</a></div><hr>
  <div class="items"><a href="../index.html">LogOut</a></div><hr>
  <div class="items"><a href="./delete-account.php">Delete Account</a></div><hr>
</div>
<!--details-->
<div class="container">
    <div class="user-details">
        <div class="profile-card">
            <h2>User Profile</h2>
            <p><span class="icon"><i class="fas fa-user"></i></span><span>Name:</span> <?php echo $name_cv; ?></p>
            <p><span class="icon"><i class="fas fa-envelope"></i></span><span>Email:</span> <?php echo $email_cv; ?></p>
            <p><span class="icon"><i class="fas fa-birthday-cake"></i></span><span>Birth:</span> <?php echo $birth; ?></p>
            <p><span class="icon"><i class="fas fa-venus-mars"></i></span><span>Gender:</span> <?php echo $gender; ?></p>
            <p><span class="icon"><i class="fas fa-phone"></i></span><span>Number:</span> <?php echo $number; ?></p>
            <p><span class="icon"><i class="fas fa-map-marker-alt"></i></span><span>Address:</span> <?php echo $address; ?></p>
            <p><span class="icon"><i class="fas fa-graduation-cap"></i></span><span>Course:</span> <?php echo $course; ?></p> <!-- Display course -->
            <p><span class="icon"><i class="fas fa-chalkboard-teacher"></i></span><span>Semester:</span> <?php echo $sem; ?></p> <!-- Display semester -->
        </div>
    </div>
</div>
</body>
</html>