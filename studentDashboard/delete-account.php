<?php
// Start the session
session_start();

// Establish a connection to the database
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "campus_placement_project"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the email is stored in the session
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Delete records from profile_detail table based on email
    $sql_delete_profile_detail = "DELETE FROM profile_detail WHERE user_id IN (SELECT id FROM student_register WHERE email = '$email')";

    // Delete records from cv_detail table based on email
    $sql_delete_cv_detail = "DELETE FROM cv_detail WHERE email IN (SELECT email FROM student_register WHERE email = '$email')";

    // Delete records from student_register table based on email
    $sql_delete_student_register = "DELETE FROM student_register WHERE email = '$email'";

    if ($conn->query($sql_delete_profile_detail) === TRUE &&
        $conn->query($sql_delete_cv_detail) === TRUE &&
        $conn->query($sql_delete_student_register) === TRUE) {
        ?>
        <script>
            alert("Account Deleted Successfully.");
            window.location.href='../index.html';
        </script>
        <?php
    } else {
        echo "Error deleting records: " . $conn->error;
    }
} else {
    echo "No email found in the session.";
}

// Close the database connection
$conn->close();
?>
