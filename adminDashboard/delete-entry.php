<?php
// Check if the entry ID is set in the POST request
if (isset($_POST['entry_id'])) {
    // Include the database connection file
    include '../login.php';

    // Sanitize the entry ID to prevent SQL injection
    $entry_id = mysqli_real_escape_string($con, $_POST['entry_id']);

    // Construct the SQL query to delete the entry
    $sql = "DELETE FROM apply_placement_student WHERE id = '$entry_id'";

    // Execute the SQL query
    if (mysqli_query($con, $sql)) {
        // Redirect back to the page where the delete request originated
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        // If deletion fails, display an error message
        echo "Error deleting record: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
} else {
    // If entry ID is not set, redirect to an error page or display an error message
    echo "Entry ID not provided!";
}
?>
