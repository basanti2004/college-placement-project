<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/b4c3b57203.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./admin-dashboard.css">
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
  padding:10px 70px;
  font-size:23px;
  margin-left:1rem;
  border:1px solid black;
}
.row .table td {
  align-items:center;
  text-align:center;
  font-size:23px;
  padding:1rem 2rem;
  border:1px solid black;
}
.menu .items a:active {
    color: lightblue;
}
.menu .items a.active,
.menu .items a:hover {
    color: lightblue;
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
.btn {
   padding:10px 20px;
   font-size:20px;
   outline:none;
   border:none;
   border-radius:4px;
}
.btn-danger {
  background-color:brown;
  color:white;
}
.btn-primary {
   background-color:cadetblue;
  
}
.btn-primary a {
  color:white;
  text-decoration:none;
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
  <div class="items"><a  href="./company.php">Company</a></div><hr />
  <div class="items"><a class="active" href="./student-job-application.php">student-job-application</a></div><hr />
</div>  

 
<!-- Search bar -->
<div class="search-container">
  <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for students...">
</div>

<!--table-->
<div class="row" style="margin-left:230px;margin-top:10px;margin-right:10px">
      <h1>Student Register Details</h1>
      <table id="studentTable" class="table text-center mt-5 pt-3 table-bordered">
    <thead style="background-color: gray; color: white">
        <tr>
            <th style="padding:0px;">Id</th>
            <th>Name</th>
            <th>Company Name</th>
            <th>Apply For</th>
            <th>Student CV</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "campus_placement_project");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM apply_placement_student";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['student_name']; ?></td>
                    <td><?php echo $row['company_name']; ?></td>
                    <td><?php echo $row['post_name']; ?></td>
                    <td>
                          
                           <button class="btn btn-primary"><a href="../studentDashboard/<?php echo $row['pdf_file'];  ?>" Download>Download CV</a></button> 
                    </td>
                    <td>
                        <form action="delete-entry.php" method="post">
                            <input type="hidden" name="entry_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
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
