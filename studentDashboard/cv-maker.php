
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./cv-maker.css">
    <title>CV Maker</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3, h4, h5, h6 {
            margin: 10px 0;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
        .input-group span{
           color:brown;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>CV Maker Details</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Basic Details -->
        <fieldset>
            <legend>Basic Details</legend>
            <div class="row">
                <div class="col-6">
                    <div class="input-group">
                        <label for="name">Full Name<span>*</span>:</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="input-group">
                        <label for="course">Course<span>*</span>:</label>
                        <select name="course" id="course" required>
                            <option value="0"></option>
                         
                            <option value="BBA-CA-2">BBA-CA-2</option>
                            <option value="BBA-CA-3">BBA-CA-3</option>
                          
                            <option value="BBA-2">BBA-2</option>
                            <option value="BBA-3">BBA-3</option>
                           
                            <option value="BSC-2">BSC-2</option>
                            <option value="BSC-3">BSC-3</option>
                          
                            <option value="BA-2">BA-2</option>
                            <option value="BA-3">BA-3</option>
                           
                            <option value="B-COM-2">B-COM-2</option>
                            <option value="B-COM-3">B-COM-3</option>
                            <option value="M-COM-1">M-COM-1</option>
                            <option value="M-COM-2">M-COM-2</option>
                            <option value="MCA-1">MCA-1</option>
                            <option value="MCA-2">MCA-2</option>
                            <option value="MBA-1">MBA-1</option>
                            <option value="MBA-2">MBA-2</option>
                            <option value="BA-2">MSC-1</option>
                            <option value="BA-3">MSC-2</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="sem">Current Sem<span>*</span>:</label>
                        <select name="sem" id="sem" required>
                            <option value="0"></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group">
                        <label for="gender">Gender<span>*</span>:</label>
                        <select name="gender" id="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                  <div class="col-6">
                    <div class="input-group">
                        <label for="birth">Date Of Birth<span>*</span>:</label>
                        <input type="date" name="birth" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group">
                        <label for="language">Language<span>*</span>:</label>
                        <input type="text" name="language" required>
                    </div>
                  </div>
                    <fieldset>
            <legend>Objective  <span style="color:brown;">*</span>  </legend>
            <div class="input-group">
                <textarea name="objective" cols="60" rows="5" required></textarea>
            </div>
        </fieldset>
             <fieldset>
                    <div class="input-group">
                        <label for="File">upload File<span>*</span>:</label>
                        <input type="file" name="uploadfile" required>
                    </div>
                    </fieldset>
       
                    
                </div>
            </div>

            <!-- Add other basic details fields here -->
        </fieldset>

        <!-- Contact Details -->
        <fieldset>
            <legend>Contact Details</legend>
            <div class="row">
                <div class="col-6">
                    <div class="input-group">
                        <label for="email">Active Email<span>*</span>:</label>
                        <input type="email" name="email" required>
                        <p>Which email you use while register type only this
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group">
                        <label for="number">Mobile Number<span>*</span>:</label>
                        <input type="text" name="number" required>
                    </div>
                </div>
            </div>
            <div class="input-group">
                <label for="address">Current Address<span>*</span>:</label>
                <input type="text" name="address" required>
            </div>
        </fieldset>

        <!-- Education -->
        <fieldset>
            
            <div class="input-group">
                <label for="certificate">Certificates/ Awards:</label>
                <textarea name="certificate" cols="60" rows="5"></textarea>
            </div>
        </fieldset>

        <!-- Project -->
        <fieldset>
            <legend>Project</legend>
            <div class="input-group">
                <label for="project"> Project Details:</label>
                <textarea name="project" cols="60" rows="5"></textarea>
            </div>
        </fieldset>

        <!-- Skills -->
        <fieldset>
            <legend>Skills</legend>
            <div class="input-group">
                <textarea name="skills" cols="60" rows="5"></textarea>
            </div>
        </fieldset>

        <!-- Work Experience / Internships -->
        <fieldset>
            <legend>Work Experience / Internships</legend>
            <div class="input-group">
                <textarea name="experience" cols="60" rows="5"></textarea>
            </div>
        </fieldset>


        <!-- Submit Button -->
        <div class="input-group">
            <button type="submit" name="submit" style="color:white" >Submit</button>
        </div>
    </form>
</div>
<script>
    function redirectToLogin() {
        // Alert message for successful registration
        alert("Registration done successfully! Login with your details.");
        // Redirect to login page
        window.location.href = "../index.html";
    }
</script>
  </div>
 </form>
</div>
<!--<script src="./script.js"></script>-->
<?php
// Start session

include '../login.php';

// Check if form is submitted
if(isset($_POST["submit"])) {
    // Get the email from the form
    $email = mysqli_real_escape_string($con, $_POST["email"]);

    // Check if the email exists in the student_register table
    $check_query = "SELECT * FROM student_register WHERE email = '$email'";
    $result = mysqli_query($con, $check_query);

    

    // If email exists, process the form data
    if(mysqli_num_rows($result) > 0) {
        $email = mysqli_real_escape_string($con, $_POST["email"]);

        // Check if the email exists in the student_register table
        $check_query = "SELECT * FROM student_register WHERE email = '$email'";
        $result = mysqli_query($con, $check_query);
        
        $name = mysqli_real_escape_string($con, nl2br($_POST["name"]));
        $course = mysqli_real_escape_string($con, nl2br($_POST["course"]));
        $sem = mysqli_real_escape_string($con, $_POST["sem"]);
        $gender = mysqli_real_escape_string($con, $_POST["gender"]);
        $birth = mysqli_real_escape_string($con, $_POST["birth"]);
        $language = mysqli_real_escape_string($con, nl2br($_POST["language"]));
        $objective = mysqli_real_escape_string($con, nl2br($_POST["objective"]));
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $number = mysqli_real_escape_string($con, $_POST["number"]);
        $address = mysqli_real_escape_string($con, $_POST["address"]);
        $certificate = mysqli_real_escape_string($con, nl2br($_POST["certificate"]));
        $project = mysqli_real_escape_string($con, nl2br($_POST["project"]));
        $skills = mysqli_real_escape_string($con, nl2br($_POST["skills"]));
        $experience = mysqli_real_escape_string($con, nl2br($_POST["experience"]));

        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./uploads/" . $filename;
  
        // Database connection and insert query here
        $insertquery = "INSERT INTO cv_detail(name,course,sem,gender,birth,language,objective,image,
        email,number,address,certificate,project,skills,experience) VALUES ('$name','$course','$sem','$gender','$birth',
        '$language','$objective','$filename','$email','$number','$address','$certificate','$project','$skills','$experience')";
        mysqli_query($con, $insertquery);

        if (mysqli_query($con, $insertquery)) {
            echo "<script>
            alert('Registration done successfully! Login with your details.');
             window.location.href = '../index.html';
             </script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }

        // Move uploaded file
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>Image uploaded successfully!</h3>";
        } else {
            echo "<h3>Failed to upload image!</h3>";
        }
    }  else {
      // Set error message in session variable
      echo '<script>alert("Email does not exist. Please use a registered email.");</script>';
  }
}
?>


</body>
</html>