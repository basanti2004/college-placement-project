<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['email'])) {
    // Retrieve the email from the query parameter
    $email = $_GET['email'];

    // Sanitize the email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }
  .container {
    width: 50%;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  .form-group {
    margin-bottom: 20px;
  }
  .form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }
  .form-group input[type="password"] {
    width: 95%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  .btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
  }
  .btn:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>

<div class="container">
  <h2>Reset Your Password</h2>
  <form id="resetForm" method="post" action="#">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <div class="form-group">
      <label for="new_password">New Password:</label>
      <input type="password" id="new_password" name="new_password" required>
    </div>
    <div class="form-group">
      <label for="confirm_password">Confirm Password:</label>
      <input type="password" id="confirm_password" name="confirm_password" required>
    </div>
    <button type="submit" class="btn" name="reset_password">Reset Password</button>
  </form>
</div>

</body>
</html>
<?php
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset_password'])) {
    // Retrieve the submitted passwords and email
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate passwords
    $errors = [];
    if (empty($newPassword)) {
        $errors[] = "New password is required";
    }
    if (empty($confirmPassword)) {
        $errors[] = "Confirm password is required";
    }
    if ($newPassword !== $confirmPassword) {
        $errors[] = "Passwords do not match";
    }

    // If there are no errors, proceed to update password
    if (empty($errors)) {
        // Update password in the student_register table
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

        // Sanitize the new password
        $newPassword = mysqli_real_escape_string($conn, $newPassword);

        // Prepare SQL statement to update the password
        $sql = "UPDATE student_register SET password = '$newPassword' WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);

        // Execute the statement
        if ($stmt->execute()) {
            // Password updated successfully
            ?>
      <script>
        alert("Password Updated Successfully");
        window.location.href='./index.html';
      </script>
      <?php
        } else {
            // Error occurred while updating password
            echo "Error updating password: " . $conn->error;
        }

        // Close connection
        $stmt->close();
        $conn->close();
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
