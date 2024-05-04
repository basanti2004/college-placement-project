

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login Form</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
  * {
  font-family: 'Poppins', sans-serif;
}
 .admin {
  background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url("./images/bg-forms.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  height:98vh;
  width:100%; 
  }
  .register {
    padding: 30px;
    border-radius: 10px;
    background-color: transparent;
    backdrop-filter : blur(20px);
    background-color: rgba(255, 255, 255, 0.7);
    box-shadow: 0 1px 12px rgba(0,0,0,0.25);
    border:1px solid rgba(255, 255, 255, 0.3);
    position: absolute;
    top: 8rem;
    left: 34rem;
  }
  .register h1 {
    font-size: 27px;
    letter-spacing: 2px;
    color: white;
    text-align: center;
    align-items: center;
  }
  .input-box {
    display: flex;
    flex-direction: column;
    
  }
  .input-box label {
    font-size: 20px;
    color: gray;
  }
  .input-box input {
    width: 20rem;
    font-size: 20px;
    border: none;
    outline: none;
    border-bottom: 2px solid white;
    margin-bottom: 10px;
    background-color: transparent;
    color: white;
  }
  button {
    padding: 10px 20px;
    border: none;
    outline: none;
    align-items: center;
    text-align: center;
    position: relative;
    left: 5rem;
    margin-top: 10px;
    background-color: transparent;
    font-weight: 600;
    font-size: 24px;
    color: white;
    letter-spacing: 2px;
    cursor: pointer;
    
  }
  button:hover {
    background-color: white;
    border-radius: 4rem;
    color: rgb(2, 24, 33); 
  }
  
  

</style>
</head>
<body>
<div class="admin">

  <form method="post">
 <div class="register">
   <h1>Student Register</h1>
   <div class="input-box">
     <label>Full Name</label>
     <input type="text" name="name" required>
   </div>
   <div class="input-box">
     <label>Email</label>
     <input type="Email" name="email" required>
   </div>
   <div class="input-box">
     <label>Password</label> 
     <input type="password" name="password"  required>
    
   </div>
   <button type="submit" name="submit" value="submit">Register</button>
 </div>
 </form>
</div>  
</body>
</html>

<?php
include 'login.php';

 
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $checkUser = "SELECT * from student_register where email = '$email'";
  $result = mysqli_query($con, $checkUser);
  $count = mysqli_num_rows($result);
  if($count>0){
    ?>
    <script>
        alert("Email Already Exist");
    </script>
    <?php
  }
  else{

  $insertquery = " insert into student_register(name,email,password) values('$name','$email','$password') ";

  $res = mysqli_query($con,$insertquery);

  if($res){
    ?>
      <script>
        alert("Registration Successfully, Now Fill the CV details.");
        window.location.href='./studentDashboard/cv-maker.php';
      </script>
      <?php
  }else{
    ?>
    <script>
        alert("data not inserted.");
    </script>
    <?php
  }
}
}
?>