<?php 
include '../components/connection.php';
session_start();

$username = $_SESSION['username'];
if(!isset($username)){
    header('location:admin_login.php');
}
?>


<!DOCTYPE HTML>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin | Panel</title>
  </head>
  <body>
    <div class="title">
        <h1 class="bg-info text-white p-5">Admin Panel</h1>
    </div>
    <nav>
        <a href="admin_managestudent.php">Manage Student</a><br>
        <a href="admin_logout.php" class="btn btn-danger">Logout</a>
    </nav>
    <!--BOOTSTRAP JS BUNDLE  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>