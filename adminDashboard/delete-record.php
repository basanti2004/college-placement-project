<?php
// Include database connection
$con = mysqli_connect("localhost","root","","campus_placement_project");
if(mysqli_connect_error()) {
    echo "can't connect";
}  

// Check if the deleteid parameter is set in the URL
if(isset($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];

    // Retrieve the email associated with the deleteid from cv_detail table
    $email_query = mysqli_query($con, "SELECT email FROM cv_detail WHERE id = $deleteid");
    $row = mysqli_fetch_assoc($email_query);
    $email = $row['email'];

    // Delete the record from profile_detail table
    $delete_profile_detail = mysqli_query($con, "DELETE FROM profile_detail WHERE email = '$email'");

    // Delete the record from cv_detail table
    $delete_cv_detail = mysqli_query($con, "DELETE FROM cv_detail WHERE id = $deleteid");

    // Delete the record from student_register table by comparing email
    $delete_student_register = mysqli_query($con, "DELETE FROM student_register WHERE email = '$email'");

    if($delete_profile_detail && $delete_cv_detail && $delete_student_register) {
        // If deletion successful, redirect back to the main page
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        // If deletion failed, display an error message
        echo "Error deleting record: " . mysqli_error($con);
    }
}
?>
