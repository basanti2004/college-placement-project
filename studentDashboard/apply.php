<?php
include '../login.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['company_name']) && isset($_POST['post_name'])) {
        $student_name = $_SESSION['name']; // Assuming you have the student's name

        // Database connection assumed to be in $con variable from included login.php

        // Fetching the PDF file for the current user
        $pdf_query = "SELECT pdf_file FROM cv_detail WHERE name = '$student_name'";
        $pdf_result = $con->query($pdf_query);

        if ($pdf_result->num_rows > 0) {
            $row = $pdf_result->fetch_assoc();
            $pdf_file = $row['pdf_file'];
           

            $company_name = $_POST['company_name'];
            $post_name = $_POST['post_name'];

            // Check if the application already exists
            $check_sql = "SELECT * FROM apply_placement_student WHERE student_name = '$student_name' AND company_name = '$company_name' AND post_name = '$post_name'";
            $result = $con->query($check_sql);

            if ($result->num_rows > 0) {
                // Application already exists, show alert message
                echo "You have already submitted an application for this job.";
            } else {
                // Insert into apply_placement_student table
                $sql = "INSERT INTO apply_placement_student (student_name, pdf_file, company_name, post_name) VALUES ('$student_name', '$pdf_file', '$company_name', '$post_name')";

                if ($con->query($sql) === TRUE) {
                    ?>
                    <script>
                       alert("Application Submitted Successfully");
                       window.location.href='./student-dashboard.php';
                    </script>
                    <?php
                } else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
            }
        } else {
            echo "CV not found for the current user.";
        }
    } else {
        echo "All fields are required!";
    }
} else {
    echo "Invalid request!";
}
?>
