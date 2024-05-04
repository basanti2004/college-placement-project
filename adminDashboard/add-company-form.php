<?php
include '../login.php';
if(isset($_POST['submit'])){
  $name = $_POST["name"];
$number = $_POST["number"];
$email = $_POST["email"];
$location = $_POST["location"];
$position = $_POST["position"];
$requirement = implode(', ', $_POST['requirement']);
$jobtype = $_POST["jobtype"];
$jobdetails = nl2br($_POST["jobdetails"]);
$expirationTime = $_POST['expiration_time'];

  // SQL Injection Prevention: Using Prepared Statements
  $stmt = $con->prepare("INSERT INTO `company` (name, number, email, location, position,requirement, jobtype, jobdetails,expiration_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssssss", $name, $number, $email, $location, $position,$requirement, $jobtype, $jobdetails, $expirationTime);
  $stmt->execute();
  $stmt->close();

  // Redirect after successful submission
  header("location: ./company.php");
  exit(); // Make sure to exit after redirection
}
  $stmt = $con->prepare("DELETE FROM `company` WHERE expiration_time < NOW()");
  $stmt->execute();
  $stmt->close(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/b4c3b57203.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./admin-dashboard.css">
<link rel="stylesheet" href="./company.css">

<title>Admin Dashboard</title>
<style>
/* Your CSS styles here */
nav {
 background-color: rgb(65, 64, 64);
}

.menu {
  background-color:rgb(84, 83, 83);
}

.all-data {
margin-left: 16rem;
margin-right: 1rem;
display: grid;
grid-template-columns: repeat(auto-fit,minmax(350px,1fr));
grid-gap: 20px;
margin-top: 50px;
}

.all-data .item {
  background-color: rgb(140, 164, 163);
  color: black;
  padding: 30px 20px 10px 20px;
  border-radius: 10px;
  margin-top: 3rem;
}

.all-data span .top {
  position: absolute;
  top: 9.5rem;
  background-color: whitesmoke;
  border: 2px solid black;
  padding: 15px;
  border-radius: 10px;
}

.all-data span .middle {
  position: absolute;
  top: 26.5rem;
  background-color: whitesmoke;
  border: 2px solid black;
  padding: 15px;
  border-radius: 10px;
}

.all-data span .bottom {
  position: absolute;
  top: 43.5rem;
  background-color: whitesmoke;
  border: 2px solid black;
  padding: 15px;
  border-radius: 10px;
}

.all-data span .last {
  position: absolute;
  top: 60rem;
  background-color: whitesmoke;
  border: 2px solid black;
  padding: 15px;
  border-radius: 10px;
}

.all-data span i {
  font-size: 20px;
}

.item h1 {
  font-size: 23px;
  color: white;
  padding: 1rem;
}

.item p {
  font-size: 30px;
  color: white;
  padding: 0.5rem 2.5rem;
}

.menu .items a:active {
    color: lightblue;
}

.menu .items a.active,
.menu .items a:hover {
    color: lightblue;
}

.input-box textarea {
  position: relative;
  font-size: 1.4rem;
  padding: 20px 20px 30px 20px;
  bottom: 1.2rem;
  width: 100%;
  height: 80%;
  background: transparent;
  border: none;
  outline: none;
  color: #162938;
  font-weight: 500;
}
.course-list {
  border-bottom:none;
  height:17rem;
}
.course-list .course {
  width:1rem;
  height:1rem;
}
.course-list label {
  margin-top:0px;
}
h4 {
  font-size:23px;
}
</style>
</head>
<body>
<nav>
 <div class="nav-bar">
   <div class="heading">
     <h1>Admin Dashboard</h1>
   </div>
   <div class="logout-button">
     <a href="../index.html">LogOut</a>
   </div>
 </div>
</nav>  

<!--side-bar-->
<div class="menu">
 
  <div class="items"><a href="./admin-dashboard.php">Dashboard</a></div><hr/>
  <div class="items"><a href="./student-register.php">StudentRegister</a></div><hr/>
  <div class="second-menu">
  <div class="items"><a class="sub-btn" style="cursor:pointer;">BBA(CA) 
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
                <a href="./BBA(CA)/year-1.php" class="sub-items">year 1</a><hr />
                <a href="./BBA(CA)/year-2.php" class="sub-items">year 2</a><hr />
                <a href="./BBA(CA)/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">BBA
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
                <a href="./BBA/year-1.php" class="sub-items">year 1</a><hr />
                <a href="./BBA/year-2.php" class="sub-items">year 2</a><hr />
                <a href="./BBA/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        
        <div class="items"><a class="sub-btn" style="cursor:pointer;">BSC 
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
                <a href="./BSC/year-1.php" class="sub-items">year 1</a><hr />
                <a href="./BSC/year-2.php" class="sub-items">year 2</a><hr />
                <a href="./BSC/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">BA
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
                <a href="./BA/year-1.php" class="sub-items">year 1</a><hr />
                <a href="./BA/year-2.php" class="sub-items">year 2</a><hr />
                <a href="./BA/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">B-COM
            <i class="fa-solid fa-angle-right dropdown"></i></a>
            <div class="sub-menu">
                <a href="./B-COM/year-1.php" class="sub-items">year 1</a><hr />
                <a href="./B-COM/year-2.php" class="sub-items">year 2</a><hr />
                <a href="./B-COM/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">MCA 
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
                <a href="./MCA/year-1.php" class="sub-items">year 1</a><hr />
                <a href="./MCA/year-2.php" class="sub-items">year 2</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">MBA
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
                <a href="./MBA/year-1.php" class="sub-items">year 1</a><hr />
                <a href="./MBA/year-2.php" class="sub-items">year 2</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">M-COM 
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
                <a href="./M-COM/year-1.php" class="sub-items">year 1</a><hr />
                <a href="./M-COM/year-2.php" class="sub-items">year 2</a><hr />
            </div>
        </div>
</div><hr />
  <div class="items"><a class="active" href="./company.php">Company</a></div><hr />
  <div class="items"><a href="./student-job-application.php">student-job-application</a></div><hr />
</div> 


<!--popup form-->
<div id="add-company" class="wrapper" style="background-color: white; height: 550px;">
  <div class="form-box">
    <h2>Add Company Details</h2>
    <form method="post">
    <div class="input-box">
        <label>Company Name</label><br>
        <input type="text" name="name" required>
        <span class="icon"><i class="fa-solid fa-pen"></i></span>
      </div>
      <div class="input-box">
      <label>Mobile No </label><br>
        <input type="text" name="number" required>
        <span class="icon"><i class="fa-solid fa-phone"></i></span>
      </div>
      <div class="input-box">
        <label>Email</label><br>
        <input type="email" name="email" required>
        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
      </div>
      <div class="input-box">
        <label>Location</label><br>
        <input type="text" name="location" required>
        <span class="icon"><i class="fa-solid fa-map-marker"></i></span>
      </div>
      <div class="input-box">
        <label>Post For</label><br>
        <input type="text" name="position" required>
        <span class="icon"><i class="fa-solid fa-briefcase"></i></span>
      </div>
      <h4>Requirement</h4><br>
<div class=" course-list" style="display:flex;flex-direction:row;">
  
  <div class="left">
  <input class="course"  type="checkbox" id="BBA-CA-1" name="requirement[]" value="BBA-CA-1">
  <label for="BBA-CA-1"> BBA-CA-1</label><br>
  <input class="course"  type="checkbox" id="BBA-CA-2" name="requirement[]" value="BBA-CA-2">
  <label for="BBA-CA-2"> BBA-CA-2</label><br>
  <input class="course"  type="checkbox" id="BBA-CA-3" name="requirement[]" value="BBA-CA-3">
  <label for="BBA-CA-3"> BBA-CA-3</label><br>
  <input class="course" type="checkbox" id="BBA-1" name="requirement[]" value="BBA-1">
  <label for="BBA-1"> BBA-1</label><br>
  <input class="course" type="checkbox" id="BBA-2" name="requirement[]" value="BBA-2">
  <label for="BBA-2"> BBA-2</label><br>
  <input class="course" type="checkbox" id="BBA-3" name="requirement[]" value="BBA-3">
  <label for="BBA-3"> BBA-3</label><br>
  <input class="course" type="checkbox" id="BA-1" name="requirement[]" value="BA-1">
  <label for="BA-1"> BA-1</label><br> 
  <input class="course" type="checkbox" id="BA-2" name="requirement[]" value="BA-2">
  <label for="BA-2"> BA-2</label><br>
  <input class="course" type="checkbox" id="BA-3" name="requirement[]" value="BA-3">
  <label for="BA-3"> BA-3</label><br>
  <input class="course" type="checkbox" id="B-COM-1" name="requirement[]" value="B-COM-1">
  <label for="B-COM-1"> B-COM-1</label><br>
  <input class="course" type="checkbox" id="B-COM-2" name="requirement[]" value="B-COM-2">
  <label for="B-COM-2"> B-COM-2</label><br>
  <input class="course" type="checkbox" id="B-COM-3" name="requirement[]" value="B-COM-3">
  <label for="B-COM-3"> B-COM-3</label><br>
  </div>
  <div class="right" style="padding-left:5rem;">
  <input class="course"  type="checkbox" id="BSC-1" name="requirement[]" value="BSC-1">
  <label for="BSC-1"> BSC-1</label><br>
  <input class="course"  type="checkbox" id="BSC-2" name="requirement[]" value="BSC-2">
  <label for="BSC-2"> BSC-2</label><br>
  <input class="course"  type="checkbox" id="BSC-3" name="requirement[]" value="BSC-3">
  <label for="BSC-3"> BSC-3</label><br>
  <input class="course" type="checkbox" id="M-COM-1" name="requirement[]" value="M-COM-1">
  <label for="M-COM-1"> M-COM-1</label><br>
  <input class="course" type="checkbox" id="M-COM-2" name="requirement[]" value="M-COM-2">
  <label for="M-COM-2"> M-COM-2</label><br>
  <input class="course" type="checkbox" id="MCA-1" name="requirement[]" value="MCA-1">
  <label for="MCA-1"> MCA-1</label><br>
  <input class="course" type="checkbox" id="MCA-2" name="requirement[]" value="MCA-2">
  <label for="MCA-2"> MCA-2</label><br>
  <input class="course"  type="checkbox" id="MBA-1" name="requirement[]" value="MBA-1">
  <label for="MBA-1"> MBA-1</label><br>
  <input class="course"  type="checkbox" id="MBA-2" name="requirement[]" value="MBA-2">
  <label for="MBA-2"> MBA-2</label><br>
  </div>
</div>
      <div class="input-box">
        <label>Job Type</label><br>
        <input type="text" name="jobtype" required>
        <span class="icon"><i class="fa-solid fa-tasks"></i></span>
      </div>
      <div class="input-box">
        <label>Job Description</label><br>
        <textarea name="jobdetails" cols="30" rows="5" required></textarea>
      </div>
      <div class="input-box">
        <label>Expiration Time</label><br>
        <input type="datetime-local" name="expiration_time" required>
        <span class="icon"><i class="fa-solid fa-clock"></i></span>
      </div>
       <button type="cancel" class="btn1" name="cancel"><a href="./company.php">Cancel</a></button>
       <button type="submit" class="btn2" name="submit">submit</button>
       
    </form>
   <!--Jquery CDN Link-->   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 

<script>
  $('.sub-btn').click(function(){
    $(this).next('.sub-menu').slideToggle();
    $(this).find('.dropdown').toggleClass('rotate');
  })

</script>
  </div>
