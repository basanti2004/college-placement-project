
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Get Gmail Address</title>
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
  .form-group input[type="email"] {
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
  <h2>Reset Your Gmail Password</h2>
  <form id="gmailForm" action="./resend-password.php" method="post">
    <div class="form-group">
      <label for="gmail">Gmail Address:</label>
      <input type="email" id="gmail" name="gmail" placeholder="example@gmail.com" required>
    </div>
    <button type="submit" name="password_reset_link" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
