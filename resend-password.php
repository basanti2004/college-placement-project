<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password_reset_link'])) {
    // Retrieve the submitted email
    $email = $_POST['gmail'];

    // Validate and sanitize the email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Check if the email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email
        echo "Invalid email address";
        exit; // Stop further execution
    }

    // Check if the email exists in the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "campus_placement_project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to check if the email exists
    $sql = "SELECT * FROM student_register WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Email does not exist in the database
        echo "Email not found in our records";
        $stmt->close();
        $conn->close();
        exit;
    }

    // Now, the email exists in the database
    // Redirect to the reset password page with the email as a query parameter
    header("Location: reset-password.php?email=" . urlencode($email));
    exit;
}
?>
