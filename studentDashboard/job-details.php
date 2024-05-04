<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-nSQOE7F9dgHyO0K0xH1oFIVtO6uSp/QYOzRe5OwhNebntHRyznUMYp+3Fl0XbS8PMe9T+UNFUmU8JjZv1qRE1Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<title>Job Details</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
  }
  .detail-container {
    max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  .content {
    padding: 20px;
  }
  h1 {
    font-size: 28px;
    margin-bottom: 10px;
  }
  p, label {
    font-size: 20px;
    margin-bottom: 15px;
    font-weight:600;
  }
  b {
    font-size:23px;
    font-weight:500;
    color:grey;
  }
  hr {
    border: none;
    border-top: 1px solid #ddd;
    margin: 30px 0;
  }
  .expired-date {
    background-color: #b3e6e6;
    padding: 20px;
    border-radius: 4px;
    text-align: center;
    margin-top: 20px;
  }
  .expired-date h1 {
    font-size: 24px;
    margin-bottom: 10px;
  }
  button {
    padding: 15px 30px;
    background-color: #4caf50;
    border: none;
    border-radius: 4px;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 20px;
   margin-left:18rem;
  }
  button a {
    color: #fff;
    text-decoration: none;
  }
  button:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>
<?php
include '../login.php';

if(isset($_POST['company_id'])) {
    $company_id = $_POST['company_id'];
    
    $sql = "SELECT * FROM `company` WHERE id = $company_id";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
         

    
    //if ($result->num_rows > 0) {
    //    while ($row = $result->fetch_assoc()) {
?>
            <div class="detail-container">
                <div class="content">
                    <h1><i class="far fa-building"></i> <?php echo $row['name']; ?></h1>
                    <p><?php echo $row['location']; ?></p>
                    <hr>

                    <label for="requirement">Job Position:</label><br>
                    <b id="requirement"><?php echo $row['position']; ?></b>
                    <hr>

                    <label for="requirement">Requirement :</label><br>
                    <b id="requirement"><?php echo $row['requirement']; ?></b>
                    <hr>

                    <label for="jobtype">Job Type :</label><br>
                    <b id="jobtype"><?php echo $row['jobtype']; ?></b>
                    <hr>

                    <label for="description">Job Description :</label><br>
                    <b><?php echo $row['jobdetails']; ?></b>
                </div>
                <hr>
                <div class="expired-date">
                    <h1>Expired Date/Time -<br><span><?php echo $row['expiration_time'];?></span></h1>
                    <?php
                $expiration_date = $row['expiration_time'];
          // Check if the expiration date has passed or if all numbers are zero
          if (strtotime($expiration_date) < strtotime('now') || preg_match('/^0+$/', $expiration_date)) {
            ?>
            <style>
              .expired-date h1{
                color:#b3e6e6;
        
              }
              .b1 {
               display:none;
              }
            </style>
            <b style="color:black;font-size:40px;position:relative;top:0.1rem;font-weight:700;">Expired</b>

            <?php
          
          } else {
              $expiration_date = date('Y-m-d H:i:s', strtotime($expiration_date));
          }
          ?>
                </div>
               
                <form action="apply.php" method="post">
                    <input type="hidden" name="company_name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="post_name" value="<?php echo $row['position']; ?>">
                    <button class="b1" type="submit">Apply Now</button>
                </form>
               
            </div>
<?php
        }
    } else {
        echo "No data found!";
    }
} else {
    echo "Company ID not received!";
}
?>
</body>
</html>
