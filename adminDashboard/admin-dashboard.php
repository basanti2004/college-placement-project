
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/b4c3b57203.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./admin-dashboard.css">
<title>Admin Dashboard</title>
<style>
nav {
 background-color:rgb(65, 64, 64);
}
.menu {
  background-color:rgb(84, 83, 83);
}
.all-data {
margin-left: 16rem;
margin-right: 1rem;
display: grid;
grid-template-columns: repeat(auto-fit,minmax(400px,1fr));
grid-gap: 40px;
margin-top: 50px;
margin-right:3rem;
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
.items .fa-angle-right {
  color: white;
  margin-left: 4.5rem;
  cursor: pointer;
}
.second-menu .sub-menu {
  display: none;
  padding-left: 20px;
}

.second-menu .sub-menu.show {
  display: block;
}

.second-menu .sub-menu a {
  color: white;
  text-decoration: none;
  display: block;
  padding: 10px;
}

.second-menu .fa-angle-right {
  float: right;
}

.second-menu .fa-angle-right.rotated {
  transform: rotate(90deg);
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
 
  <div class="items"><a class="active" href="./admin-dashboard.php">Dashboard</a></div><hr/>
  <div class="items"><a href="./student-register.php">StudentRegister</a></div><hr/>
  <div class="second-menu">
  <div class="items"><a class="sub-btn" style="cursor:pointer;">BBA(CA) 
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
              
                <a href="./BBA(CA)/year-2.php" class="sub-items">year 2</a><hr />
                <a href="./BBA(CA)/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">BBA
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
            
                <a href="./BBA/year-2.php" class="sub-items">year 2</a><hr />
                <a href="./BBA/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        
        <div class="items"><a class="sub-btn" style="cursor:pointer;">BSC 
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
               
                <a href="./BSC/year-2.php" class="sub-items">year 2</a><hr />
                <a href="./BSC/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">BA
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
            
                <a href="./BA/year-2.php" class="sub-items">year 2</a><hr />
                <a href="./BA/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">B-COM
            <i class="fa-solid fa-angle-right dropdown"></i></a>
            <div class="sub-menu">
               
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
        <div class="items"><a class="sub-btn" style="cursor:pointer;">MSC
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
                <a href="../MSC/year-1.php" class="sub-items">year 1</a><hr />
                <a href="../MSC/year-2.php" class="sub-items">year 2</a><hr />
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
  <div class="items"><a  href="./company.php">Company</a></div><hr />
  <div class="items"><a href="./student-job-application.php">student-job-application</a></div><hr />
</div> 




<!--main content-->
<div class="all-data">
  <div class="item" onclick="window.location.href='./student-register.php';">
    <span><i class="fa-solid fa-users top"></i></span>
     <h1> Total Student Registration</h1>
     <hr />
     <p>
      <?php 
      include '../login.php';
        $dash_category_query = "SELECT * FROM student_register";
        $dash_category_query_run = mysqli_query($con,$dash_category_query);
        if($category_total = mysqli_num_rows( $dash_category_query_run))
        {
          echo '<h4 style="color:white;font-size:30px;padding-left:3rem;">'.$category_total.'</h4>';
        }
        else {
          echo '<h4style="color:white;font-size:30px;padding-left:3rem;"> No Data</h4>';
        }
      ?>  
     </p>
  </div>
  
  <div class="item" onclick="window.location.href='./company.php';">
    <span><i class="fa-solid fa-industry top"></i></span>
     <h1>Total Company Job Offers Send To Student</h1>
     <hr /><p>
      <?php 
      include '../login.php';
        $dash_category_query = "SELECT * FROM company";
        $dash_category_query_run = mysqli_query($con,$dash_category_query);
        if($category_total = mysqli_num_rows( $dash_category_query_run))
        {
          echo '<h4 style="color:white;font-size:30px;padding-left:3rem;">'.$category_total.'</h4>';
        }
        else {
          echo '<h4 style="color:white;font-size:30px;padding-left:3rem;"> No Data</h4>';
        }
      ?>
     </p>
  </div>

  <div class="item" onclick="window.location.href='./student-job-application.php';">
    <span><i class="fa-solid fa-road middle"></i></span>
     <h1>Total Student Replay For Jobs</h1>
     <hr /><p>
      <?php 
      include '../login.php';
        $dash_category_query = "SELECT * FROM apply_placement_student";
        $dash_category_query_run = mysqli_query($con,$dash_category_query);
        if($category_total = mysqli_num_rows( $dash_category_query_run))
        {
          echo '<h4 style="color:white;font-size:30px;padding-left:3rem;">'.$category_total.'</h4>';
        }
        else {
          echo '<h4 style="color:white;font-size:30px;padding-left:3rem;"> No Data</h4>';
        }
      ?>
     </p>
  </div>

</div>
<!--Jquery CDN Link-->   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 

<script>
  $('.sub-btn').click(function(){
    $(this).next('.sub-menu').slideToggle();
    $(this).find('.dropdown').toggleClass('rotate');
  })

</script>

</body>
</html>