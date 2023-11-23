<?php
session_start();

if (isset($_POST['reset'])) {
  $conn = mysqli_connect("localhost", "root", "", "customers");
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  
  if ($password === $cpassword) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "UPDATE customerdata SET password = ? WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $email);
    mysqli_stmt_execute($stmt);
    
    if (mysqli_stmt_affected_rows($stmt) > 0) {
      echo "<div class='alert alert-success'>Password reset successful. You can now log in with your new password.</div>";
    } else {
      echo "<div class='alert alert-danger'>Password reset failed. Please check your email and try again.</div>";
    }
  } else {
    echo "<div class='alert alert-danger'>Passwords do not match.</div>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin control</title>
<link rel="stylesheet" href="main.css?v=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="fevicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="main.css?v=1">
    <link rel="stylesheet" href="/css/all.min.css">
    <script src="jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    /* Style for the h2 heading */


</style>

<body>


<div class="add">
<a href="index.php">Home</a>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <h2 style="text-align: center; background-color: chartreuse;border: 1px solid black; size: 100%;">Reset password</h2>
                      <div class="input_box">
                        <input type="email" name="email" placeholder="Enter your email" class="form-control" required />
                        <i class="uil uil-envelope-alt email"></i>
                      </div>
                      <div class="input_box">
                        <input type="password" name="password" placeholder="Create password" class="form-control" minlength="4" maxlength="10" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                      </div>
                      <div class="input_box">
                        <input type="password" name="cpassword" placeholder="Confirm password" class="form-control" minlength="4" maxlength="10" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                      </div>
    <button class="button" name="submit" class="form-open btn btn-success" value="reset" >Reset</button>
    </form>
</div> 
</body>
</html>