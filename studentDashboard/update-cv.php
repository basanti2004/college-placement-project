<?php
// Start session
session_start();

// Include database connection
include '../login.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("location: ../index.html");
    exit; // Ensure script stops here
}

// Retrieve user data from the database using session user_id
$user_id = $_SESSION['user_id'];
$query = mysqli_query($con, "SELECT * FROM student_register WHERE id = '$user_id'");
$row = mysqli_fetch_array($query);
$name = $row['name']; // Retrieve the name of the student

// Retrieve user's email
$email = $row['email'];

// Check if cv_id parameter is set and is a valid integer
if(isset($_GET['cv_id']) && is_numeric($_GET['cv_id'])) {
    // Retrieve cv_id from URL parameter
    $id = $_GET['cv_id'];
    
    // Query the cv_detail table to retrieve CV details
    $cv_query = mysqli_query($con, "SELECT * FROM cv_detail WHERE id = '$id'");
    $cv_row = mysqli_fetch_array($cv_query);

    // Check if CV details are found
    if($cv_row) {
        // Retrieve CV details
        $name_cv = $cv_row['name'];
        $email_cv = $cv_row['email'];
        $birth = $cv_row['birth'];
        $gender = $cv_row['gender'];
        $number = $cv_row['number'];
        $address = $cv_row['address'];
        $course = $cv_row['course'];
        $sem = $cv_row['sem'];
        $language = $cv_row['language'];
        $objective = $cv_row['objective'];
        $image = $cv_row['image'];
        $certificate = $cv_row['certificate'];
        $project = $cv_row['project'];
        $skills = $cv_row['skills'];
        $experience = $cv_row['experience'];
    } else {
        // Handle case where CV details are not found
        echo "CV details not found.";
        exit; // Stop script execution
    }
} else {
    // Handle case where cv_id parameter is missing or invalid
    echo "Invalid CV ID.";
    exit; // Stop script execution
}

// Update CV details if the form is submitted
if (isset($_POST['submit'])) {
 
    $name_cv = mysqli_real_escape_string($con, $_POST['name']);
    $email_cv = mysqli_real_escape_string($con, $_POST['email']);
    $birth = mysqli_real_escape_string($con, $_POST['birth']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $sem = mysqli_real_escape_string($con, $_POST['sem']);
    $language = mysqli_real_escape_string($con, $_POST['language']);
    $objective = mysqli_real_escape_string($con, $_POST['objective']);

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "uploads/" . $filename;

    $certificate = mysqli_real_escape_string($con, $_POST['certificate']);
    $project = mysqli_real_escape_string($con, $_POST['project']);
    $skills =  mysqli_real_escape_string($con, $_POST['skills']);
    $experience =  mysqli_real_escape_string($con, $_POST['experience']);
    

    // Move uploaded image to the uploads folder
    move_uploaded_file($tempname, $folder);

    // Update the cv_detail table with new details
    mysqli_query($con, "UPDATE cv_detail SET  name = '$name_cv',email = '$email_cv',birth = '$birth',gender = '$gender',number = '$number',
    address = '$address',course = '$course',sem = '$sem', language = '$language', objective = '$objective',  image = '$image',
     certificate = '$certificate', project = '$project', skills = '$skills', experience = '$experience', image = '$filename'
                    WHERE id = '$id'");

    // Redirect back to the same page after updating
    header("Location: {$_SERVER['PHP_SELF']}?cv_id=$id");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/b4c3b57203.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./student-dashboard.css">
<title>Update CV</title>
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
.form-container {
    margin-top: 50px;
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    max-height: 80vh; /* Set maximum height */
    overflow-y: auto; /* Enable vertical scrolling */

}
.form-group {
    margin-bottom: 20px;
}
.form-group label {
    font-weight: bold;
    display: block;
}
.form-group input[type="text"],
.form-group textarea {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}
.form-group textarea {
    resize: vertical;
    min-height: 100px;
}
.form-group button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
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
 
 <div class="items"><a  href="./student-dashboard.php">Dashboard</a></div><hr/>
 <div class="items"><a  href="./profile.php">Profile</a></div><hr>
 <div class="items"><a href="view-cv.php">View PDF File</a></div><hr>
 <div class="items"><a class="active" href="update-cv.php?cv_id=<?php echo $cv_id; ?>">Update CV</a></div><hr>
 <div class="items"><a href="../index.html">LogOut</a></div><hr>
 <div class="items"><a href="./delete-account.php">Delete Account</a></div><hr>
</div>

<!-- Update CV form -->
<div class="form-container">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name_cv; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $email_cv; ?>" required>
        </div>
        <div class="form-group">
            <label for="birth">Birth Date:</label>
            <input type="date" id="birth" name="birth" value="<?php echo $birth; ?>" required>
        </div>
        <div class="form-group">
         <label for="gender">Gender:</label>
           <select id="gender" name="gender" required style="  width: 100%;padding: 10px;border-radius: 5px;border: 1px solid #ccc;">
             <option value="male" <?php if ($gender === 'male') echo 'selected'; ?>>Male</option>
             <option value="female" <?php if ($gender === 'female') echo 'selected'; ?>>Female</option>
             <option value="other" <?php if ($gender === 'other') echo 'selected'; ?>>Other</option>
           </select>
        </div>
        <div class="form-group">
            <label for="number">Mobile Number:</label>
            <input type="text" id="number" name="number" value="<?php echo $number; ?>" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>
        </div>
        <div class="form-group">
    <label for="course">Course:</label>
    <select id="course" name="course" required style="width: 100%;padding: 10px;border-radius: 5px;border: 1px solid #ccc;">
  
        <option value="BBA-CA-2" <?php if ($course === 'BBA-CA-2') echo 'selected'; ?>>BBA-CA-2</option>
        <option value="BBA-CA-3" <?php if ($course === 'BBA-CA-3') echo 'selected'; ?>>BBA-CA-3</option>
       
        <option value="BBA-2" <?php if ($course === 'BBA-2') echo 'selected'; ?>>BBA-2</option>
        <option value="BBA-3" <?php if ($course === 'BBA-3') echo 'selected'; ?>>BBA-3</option>

        <option value="BSC-2" <?php if ($course === 'BSC-2') echo 'selected'; ?>>BSC-2</option>
        <option value="BSC-3" <?php if ($course === 'BSC-3') echo 'selected'; ?>>BSC-3</option>

        <option value="BA-2" <?php if ($course === 'BA-2') echo 'selected'; ?>>BA-2</option>
        <option value="BA-3" <?php if ($course === 'BA-3') echo 'selected'; ?>>BA-3</option>
   
        <option value="B-COM-2" <?php if ($course === 'B-COM-2') echo 'selected'; ?>>B-COM-2</option>
        <option value="B-COM-3" <?php if ($course === 'B-COM-3') echo 'selected'; ?>>B-COM-3</option>
        <option value="M-COM-1" <?php if ($course === 'M-COM-1') echo 'selected'; ?>>M-COM-1</option>
        <option value="M-COM-2" <?php if ($course === 'M-COM-2') echo 'selected'; ?>>M-COM-2</option>
        <option value="MCA-1" <?php if ($course === 'MCA-1') echo 'selected'; ?>>MCA-1</option>
        <option value="MCA-2" <?php if ($course === 'MCA-2') echo 'selected'; ?>>MCA-2</option>
        <option value="MBA-1" <?php if ($course === 'MBA-1') echo 'selected'; ?>>MBA-1</option>
        <option value="MBA-2" <?php if ($course === 'MBA-2') echo 'selected'; ?>>MBA-2</option>
        <option value="MSC-1" <?php if ($course === 'MSC-1') echo 'selected'; ?>>MSC-1</option>
        <option value="MSC-2" <?php if ($course === 'MSC-2') echo 'selected'; ?>>MSC-2</option>
    </select>

</div>
<div class="form-group">
    <label for="sem">Semester:</label>
    <select id="sem" name="sem" required style="width: 100%;padding: 10px;border-radius: 5px;border: 1px solid #ccc;">
        <option value="1" <?php if ($sem === '1') echo 'selected'; ?>>1</option>
        <option value="2" <?php if ($sem === '2') echo 'selected'; ?>>2</option>
        <option value="3" <?php if ($sem === '3') echo 'selected'; ?>>3</option>
        <option value="4" <?php if ($sem === '4') echo 'selected'; ?>>4</option>
        <option value="5" <?php if ($sem === '5') echo 'selected'; ?>>5</option>
        <option value="6" <?php if ($sem === '6') echo 'selected'; ?>>6</option>
    </select>
</div>
        <div class="form-group">
            <label for="language">Languages:</label>
            <input type="text" id="language" name="language" value="<?php echo $language; ?>" required>
        </div>
        <div class="form-group">
            <label for="objective">Objective:</label>
            <textarea id="objective" name="objective" required><?php echo $objective; ?></textarea>
        </div>
        <div class="form-group">
           <label for="uploadfile">Upload Image:</label>
           <input type="file" id="uploadfile" name="uploadfile" required><?php echo $image; ?>
        </div>

        <div class="form-group">
            <label for="certificate">Certificates/Awards:</label>
            <textarea id="certificate" name="certificate"><?php echo $certificate; ?></textarea>
        </div>
        <div class="form-group">
            <label for="project">Projects:</label>
            <textarea id="project" name="project"><?php echo $project; ?></textarea>
        </div>
        <div class="form-group">
            <label for="skills">Skills:</label>
            <textarea id="skills" name="skills"><?php echo $skills; ?></textarea>
        </div>
        <div class="form-group">
            <label for="experience">Experience/Internship:</label>
            <textarea id="experience" name="experience"><?php echo $experience; ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="submit">Update CV</button>
        </div>
    </form>
</div>

</body>
</html>