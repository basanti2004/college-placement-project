<?php

include '../login.php';
if(isset($_GET['deleteid'])){
  $id=$_GET['deleteid'];

  $sql="delete from `company` where id=$id";
  $result=mysqli_query($con,$sql);
  if($result){
    header('location:company.php');
  }else{
   echo "not deleted";
  }
}

?>