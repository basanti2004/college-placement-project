<?php
include '../login.php';

// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("location: ../index.html");
    exit; // Ensure script stops here
}

// Retrieve user data from the database using session user_id
$user_id = $_SESSION['user_id'];
$query = mysqli_prepare($con, "SELECT * FROM student_register WHERE id = ?");
mysqli_stmt_bind_param($query, 'i', $user_id);
mysqli_stmt_execute($query);
$result = mysqli_stmt_get_result($query);
$row = mysqli_fetch_array($result);
$email = $row['email']; // Retrieve the email of the student

// Retrieve CV data for the current user
$cv_query = mysqli_prepare($con, "SELECT * FROM cv_detail WHERE email = ?");
mysqli_stmt_bind_param($cv_query, 's', $email);
mysqli_stmt_execute($cv_query);
$cv_result = mysqli_stmt_get_result($cv_query);
$cv_row = mysqli_fetch_array($cv_result);
$cv_id = ($cv_row) ? $cv_row['id'] : null;
$pdf_file = ($cv_row) ? $cv_row['pdf_file'] : null;
$_SESSION['pdf_file'] = $pdf_file;

// Fetch companies whose job requirements match student's courses
$sql = "SELECT * FROM company";
$result = mysqli_query($con, $sql);
$matching_companies = [];

// Iterate over the companies
while ($row = mysqli_fetch_assoc($result)) {
    $requirements = explode(', ', $row['requirement']); // Split requirement string into an array
    $course_matched = false;

    // Iterate over the courses in the CV
    foreach ($cv_result as $cv_row) {
        $cv_courses = explode(', ', $cv_row['course']); // Split course string into an array

        // Check if any course from the CV matches the requirements of the company
        if (array_intersect($cv_courses, $requirements)) {
            $course_matched = true;
            break; // Exit the loop if a match is found
        }
    }

    // If a match is found, add the company to the list of matching companies
    if ($course_matched) {
        $matching_companies[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="./student-dashboard.css">
    <style>

  nav {
 background-color:rgb(65, 64, 64);
}
.menu {
  background-color:rgb(84, 83, 83);
}
.all-data {
margin-left: 16rem;
margin-right: 1rem;
display: grid;
grid-template-columns: repeat(auto-fit,minmax(350px,1fr));
grid-gap: 20px;
margin-top: 50px;
}
.all-data .item {
  background-color: rgb(140, 164, 163);
  color: black;
  padding: 30px 20px 10px 20px;
  border-radius: 10px;
  margin-top: 3rem;
}
.all-data span .top {
  position: absolute;
  top: 9.5rem;
  background-color: whitesmoke;
  border: 2px solid black;
  padding: 15px;
  border-radius: 10px;
}
.all-data span .middle {
  position: absolute;
  top: 26.5rem;
  background-color: whitesmoke;
  border: 2px solid black;
  padding: 15px;
  border-radius: 10px;
}
.all-data span .bottom {
  position: absolute;
  top: 43.5rem;
  background-color: whitesmoke;
  border: 2px solid black;
  padding: 15px;
  border-radius: 10px;
}
.all-data span .last {
  position: absolute;
  top: 60rem;
  background-color: whitesmoke;
  border: 2px solid black;
  padding: 15px;
  border-radius: 10px;
}
.all-data span i {
  font-size: 20px;
}
.item h1 {
  font-size: 23px;
  color: white;
  padding: 1rem;
}
.item p {
  font-size: 30px;
  color: white;
  padding: 0.5rem 2.5rem;

}
.form {
  padding: 30px 10px;
  margin-top: 20px;
}
.form h1 {
  align-items: center;
  text-align: center;
  color: brown;
  letter-spacing: 1px;
  margin-bottom: 1rem;
}
.courses {
  border: 1px solid black;
  padding: 20px 30px;
  margin-right: 7rem;
  margin-left: 7rem;
}
.courses h2 {
  font-size: 30px;
  color: black;
  text-align: center;
}
.courses ul {
  padding-left: 23rem;
  color: grey;
}
.courses ul .fa-paperclip {
  padding: 0px 5px;
}
.courses ul li a {
 text-decoration: none;
 font-size: 25px;
 color: grey;
}
.courses ul li {
 list-style: none;
}
.courses ul li:hover {
  color: black;
}
.courses ul li a:hover {
  color: black;
}
.menu .items a:active {
    color: lightblue;
}
.menu .items a.active,
.menu .items a:hover {
    color: lightblue;
}
/*job notification */
.notification {
  margin-top:3rem;
  margin-left:20rem;
  background-color: rgb(171, 210, 171);
  width:45rem;
  padding:30px;
  box-shadow: 0 2px 1px -1px rgba(0,0,0,.4), 0 1px 1px 0 rgba(0,0,0,.20), 0 1px 3px 0 rgba(0,0,0,.20);
}
.notification .job-portal .rows {
  display:flex;
  flex-direction:row;
  justify-content:space-between;
}
.notification .job-portal .rows h1 {
  color:brown;
  font-size:30px;
  letter-spacing:1px;
  padding-bottom:8px;
}
.notification .job-portal p {
  font-size:20px;
  padding-bottom:10px;
}
.notification .job-portal b {
  font-size: 24px;
  color:black;
}
.notification .job-portal .rows button{
 margin-top:0px;
 margin-left:1px;
  padding:10px 25px;
  background-color:black;
  border:none;
  outline:none;
  border-radius:5px;
}
.notification .job-portal .rows button {
  color:white;
  text-decoration:none;
  font-size:20px;
  letter-spacing:1px
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

    <div class="menu">
        <div class="items"><a class="active" href="./student-dashboard.php">Dashboard</a></div><hr/>
        <div class="items"><a href="./profile.php">Profile</a></div><hr>
        <div class="items"><a href="view-cv.php">View PDF File</a></div><hr>
        <div class="items"><a href="update-cv.php?cv_id=<?php echo $cv_id; ?>">Update CV</a></div><hr>
        <div class="items"><a href="../index.html">LogOut</a></div><hr>
        <div class="items"><a href="./delete-account.php">Delete Account</a></div><hr>
    </div>

    <!-- Job notifications -->
    <?php
    if (!empty($matching_companies)) {
        foreach ($matching_companies as $company) {
    ?>
            <div class="notification">
                <form action="./job-details.php" method="post">
                    <div class="job-portal">
                        <div class="rows">
                            <input type="hidden" name="company_id" value="<?php echo $company['id']; ?>">
                            <h1><?php echo $company['name']; ?></h1>
                            <button type="submit">View</button>
                        </div>
                        <p><?php echo $company['location']; ?></p>
                        <b>Post For:<br><?php echo $company['position']; ?></b>
                    </div>
                </form>
            </div>
    <?php
        }
    } else {
        // No matching companies found
        echo "<p style='margin-left:20rem;margin-top:3rem;font-size:30px;'>No job notifications available for your course.</p>";
    }
    ?>
    <!-- End of job notifications -->
</body>
</html>
