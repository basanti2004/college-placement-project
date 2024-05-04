<?php
// Start the session
session_start();

// Include database connection
include '../login.php';

// Include Dompdf library
require_once './dompdf/dompdf/autoload.inc.php';

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page if not logged in
    header("location: ../index.html");
    exit; // Ensure script stops here
}

// Retrieve user's email from session
$email = $_SESSION['email'];

// Fetch user details from cv_detail table
$query = "SELECT * FROM cv_detail WHERE email = '$email'";
$result = mysqli_query($con, $query);

// Check if the query executed successfully
if ($result) {
    // Check if any CV details were found for the user
    if (mysqli_num_rows($result) > 0) {
        // Fetch user details
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $course = $row['course'];
        $sem = $row['sem'];
        $gender = $row['gender'];
        $birth = $row['birth'];
        $language = $row['language'];
        $objective = $row['objective'];

        $folder = "./uploads/" . $row['image'];
        $number = $row['number'];
        $address = $row['address'];
        $certificate = $row['certificate'];
        $project = $row['project'];
        $skills = $row['skills'];
        $experience = $row['experience'];

        // HTML content with user details
        $html = '<!DOCTYPE html>
        <html>
        <head>
        <script src="https://kit.fontawesome.com/b4c3b57203.js" crossorigin="anonymous"></script>
         <title>Generate CV</title>
        <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap");
        * {
         font-family: "Poppins", sans-serif;
         }
         p, h4 {
          font-family: "Poppins", sans-serif;
         }
        .resume {
          font-size: 30px;
          align-items: center;
          text-align: center;
          letter-spacing: 2px;
         }
         .row img {
           padding: 10px;
           padding-top: 30px;
        }
        .row{
           display:flex;
           flex-direction:row;
        }
         .student-detail {
           padding-left: 10px;
         }
        .student-detail h1 {
          font-size: 30px;
          color: black;
          letter-spacing: 1px;
        }
        .student-detail h2 {  
           font-size: 25px;
         }
        .student-detail h3 {
          font-size: 20px;
         }
        .student-detail span {
          padding: 0px 20px;}
         b {
           font-size: 26px;
          letter-spacing: 1px;
          color: rosybrown;
        }
         p {   
          font-size: 23px;
          font-weight: 600;
        }
         h4 {
          font-size: 23px;
          font-weight: 600;
          padding-left: 2.5rem;
         }
         h5 {
          font-size: 21px;
        }
        </style>
        </head>
        
        <body>
           <div class="main">
              <div class="content" style="align-items: center;
              background-color: #fff;">
                  <h1 class="resume">Resume</h1>
                  <div class="row" style="display: flex;flex-direction:row;">
                   <div class="photo">
                     <img src="'.$folder.'" style="width: 25%;
                     height: 21%;padding:30px;" alt="">
                   </div>
                   <div class="student-detail" style="position:absolute;top:5rem;left:15rem;width:60%;">
                      <h1>'.$name.'('.$gender.')</h1>
                      <hr style="border: 1px solid black;">
                      <h2><i class="fa-solid fa-graduation-cap"></i>  student - ('.$course.') sem - '.$sem.'</h2>
                         <h3>Birth - '.$birth.'</h3>
                        <h3> Languages - '.$language.'</h3>
                   </div>
                </div>        
                   <div class="prof-obj">
                       <hr style="border: 1px solid black;">
                       <b>Professional object</b><br>
                      <p>'.$objective.'</p>
                   </div>
                   <div class="contact">
                       
                       <hr style="border: 1px solid black;">
                       <b>Contact</b><br>
                       <h2>Email -'.$email.'</h2>
                       <h2>mobile - '.$number.'</h2>
                       <h2>address - '.$address.'</h2>
                   </div>
                   <div class="education">
                        <h2>Certicates / awards - </h2>
                        <h4>'.$certificate.'</h4> 
                   </div>
                   <div class="project">
                           
                            <hr style="border: 1px solid black;">
                            <b>Project</b><br>
                           <h5>'.$project.'</h5> 
                         
                   </div>
                   <div class="skills">
                           
                            <hr style="border: 1px solid black;">
                            <b>Skills</b><br>
                       <h2> '.$skills.'</h2>
                   </div>
                   <div class="experi-intern">
                           
                            <hr style="border: 1px solid black;">
                            <b>Experience / Internship</b><br>
                        <h2>'.$experience.'</h2>
                   </div>
               </div>
           </div>
        </form>   
        </body>
        </html>';

        // Create Dompdf instance
        $imagePath = $folder;

        // Read image data
        $imageData = base64_encode(file_get_contents($imagePath));

        // Generate the base64 image src
        $imageSrc = 'data:'.mime_content_type($imagePath).';base64,'.$imageData;

        // Replace the image source in the HTML with the base64-encoded image
        $html = str_replace($folder, $imageSrc, $html);

        // Create Dompdf instance
        $dompdf = new Dompdf\Dompdf();
        
        $dompdf->set_option('isRemoteEnabled', true);

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();
        $dompdf->stream("cv_details.pdf", array("Attachment" => false));

        // Get the generated PDF content
        $pdf_content = $dompdf->output();

        // Check if PDF already exists
        if ($row['pdf_file'] != null && file_exists($row['pdf_file'])) {
            // Update existing PDF file with new content
            file_put_contents($row['pdf_file'], $pdf_content);
        } else {
            // Create a folder for PDF files if it doesn't exist
            $pdf_folder = "./pdf_files/";
            if (!is_dir($pdf_folder)) {
                mkdir($pdf_folder, 0777, true);
            }

            // Generate a unique filename for the PDF file
            $pdf_file_path = $pdf_folder . 'cv_' . uniqid() . '.pdf';
            
            // Store PDF content in the folder
            file_put_contents($pdf_file_path, $pdf_content);

            // Update cv_detail table with the PDF file path
            $update_query = "UPDATE cv_detail SET pdf_file = '$pdf_file_path' WHERE email = '$email'";
            $update_result = mysqli_query($con, $update_query);

            // Check if the update query executed successfully
            if (!$update_result) {
                // Failed to update database
                echo "<h3>Failed to update PDF file path in the database.</h3>";
                exit;
            }
        }

        // Output PDF to browser
        $dompdf->stream("cv_details.pdf");
        exit;
    } else {
        // No CV found for the current user
        echo "<h3>No CV found for the current user!</h3>";
    }
} else {
    // Query execution error
    echo "<h3>Failed to fetch CV details. Please try again later.</h3>";
}

// Close database connection
mysqli_close($con);
?>
