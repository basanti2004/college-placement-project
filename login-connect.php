<?php
include 'login.php';

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $errors = array(); 
  $query = mysqli_query($con, "select * from student_register where email = '$email'");
  $no = mysqli_num_rows($query); 

  if($no > 0) {
    $row = mysqli_fetch_array($query);
    if($row['password'] == $password) {
      // Start session
      session_start();
      
      // Store user data in session variables
      $_SESSION['user_id'] = $row['id']; // Changed 'id' to 'user_id'
      $_SESSION['email'] = $row['email'];
      $_SESSION['name'] = $row['name'];
      // If you have other columns in student_register, you can add them here

      // Redirect to dashboard after successful login
      header("location: ./studentDashboard/student-dashboard.php");
    } else {
      ?>
      <script>
        alert("Wrong Password");
        window.location.href='./index.html';
      </script>
      <?php
    }
  } else {
    ?>
    <script>
      alert("This Email Does Not Exist. Please register first.");
      window.location.href='./index.html';
    </script>
    <?php
  } 
}
?>
