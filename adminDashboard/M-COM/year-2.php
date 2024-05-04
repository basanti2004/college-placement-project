<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/b4c3b57203.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../admin-dashboard.css">
<title>Student register data</title>
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
/*table*/
.row h1 {
  padding:1rem 3rem;
  font-size:32px;
  letter-spacing:1px;
  color:black;
  margin-left:9rem;
}
.row .table th {
  padding:10px 20px;
  font-size:23px;
  margin-left:1rem;
  border:1px solid black;
}
.row .table td {
  align-items:center;
  text-align:center;
  font-size:20px;
  padding:1rem 0.5rem;
  border:1px solid black;
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
.row .table .delete {
  background-color:brown;
  padding:10px 20px;
  border:none;
  margin-right:15px;
  border-radius:5px;
  margin-left:25px;
}
.row .table .delete a{
  text-decoration:none;
  color:white;
  font-size:20px;
}
.search-container {
  margin-left: 320px;
  margin-top: 20px;
}
.search-container input[type=text] {
  padding: 10px;
  margin-top: 10px;
  font-size: 17px;
  border: none;
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
     <a href="../../index.html">LogOut</a>
   </div>
 </div>
</nav>  

<!--side-bar-->
<div class="menu">
 
  <div class="items"><a href="../admin-dashboard.php">Dashboard</a></div><hr/>
  <div class="items"><a href="../student-register.php">StudentRegister</a></div><hr/>
  <div class="second-menu">
  <div class="items"><a class="sub-btn" style="cursor:pointer;">BBA(CA) 
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
            
                <a href="../BBA(CA)/year-2.php" class="sub-items">year 2</a><hr />
                <a href="../BBA(CA)/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">BBA
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
          
                <a href="../BBA/year-2.php" class="sub-items">year 2</a><hr />
                <a href="../BBA/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        
        <div class="items"><a class="sub-btn" style="cursor:pointer;">BSC 
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
       
                <a href="../BSC/year-2.php" class="sub-items">year 2</a><hr />
                <a href="../BSC/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">BA
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
         
                <a href="../BA/year-2.php" class="sub-items">year 2</a><hr />
                <a href="../BA/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">B-COM
            <i class="fa-solid fa-angle-right dropdown"></i></a>
            <div class="sub-menu">
             
                <a href="../B-COM/year-2.php" class="sub-items">year 2</a><hr />
                <a href="../B-COM/year-3.php" class="sub-items">year 3</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">MCA 
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
                <a href="../MCA/year-1.php" class="sub-items">year 1</a><hr />
                <a href="../MCA/year-2.php" class="sub-items">year 2</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">MBA
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
                <a href="../MBA/year-1.php" class="sub-items">year 1</a><hr />
                <a href="../MBA/year-2.php" class="sub-items">year 2</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn" style="cursor:pointer;">MSC
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
                <a href="../MSC/year-1.php" class="sub-items">year 1</a><hr />
                <a href="../MSC/year-2.php" class="sub-items">year 2</a><hr />
            </div>
        </div><hr />
        <div class="items"><a class="sub-btn active" style="cursor:pointer;">M-COM 
            <i class="fa-solid fa-angle-right dropdown" ></i></a>
            <div class="sub-menu">
                <a href="../M-COM/year-1.php" class="sub-items">year 1</a><hr />
                <a href="../M-COM/year-2.php" class="sub-items active">year 2</a><hr />
            </div>
        </div>
</div><hr />
  <div class="items"><a href="../company.php">Company</a></div><hr />
  <div class="items"><a href="../student-job-application.php">student-job-application</a></div><hr />
</div>
<!-- Search bar -->
<div class="search-container">
  <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for students...">
</div>

           
<!--table-->
<div class="row" style="margin-left:260px;margin-top:50px;margin-right:10px">
      <h1>M-COM 2nd year Student Details</h1>
      <table class="table text-center mt-5 pt-3 table-bordered" id="studentTable">
         <thead style="background-color:gray;color:white">
         <tr>
               <th>id</th>
               <th>name</th>
               <th>email</th>
               <th>gender</th>
               <th>number</th>
               <th>address</th>
               <th>course</th>
               <th>Semester</th>
               <th>Operation</th>
            </tr>
            </thead>
            <?php
        // Include database connection
        $con = mysqli_connect("localhost","root","","campus_placement_project");
       if(mysqli_connect_error())
          {
             echo "can't connect";
          }  

        // Query to fetch details from profile_detail table where course is BBA-CA
        $query = mysqli_query($con, "SELECT * FROM cv_detail WHERE course = 'M-COM-2'");
        
        // Loop through the fetched data and display it in the table
        while($row = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['number']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['course']."</td>";
            echo "<td>".$row['sem']."</td>";
            ?> <td class="combo">
            <button class="delete"><a href="../delete-record.php?deleteid=<?php echo $row['id']; ?>">Delete</a></button>
          </td><?php
            echo "</tr>";
        }
        ?>
      </table>
   </div>
   <!--Jquery CDN Link-->   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 

<script>
// JavaScript function for searching
function searchTable() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("studentTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td");
    for (var j = 0; j < td.length; j++) {
      if (td[j]) {
        txtValue = td[j].textContent || td[j].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          break;
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
}
</script>
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