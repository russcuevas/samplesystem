<?php
include '../components/connection.php';

session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    header('location:student_dashboard.php');
 }else{
    $user_id = '';
 };

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM students WHERE username = ?");
    $stmt->execute([$username]);
    $row = $stmt->fetch();

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        header('Location: student_dashboard.php');
        exit();
    } else {
        $error_message = "Wrong credentials";
    }
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
    <title>Student | Login</title>
  </head>
  <body>
    <div class="title">
        <h1 class="text-center bg-info text-danger p-3 mb-5">Hello!</h1>
    </div>
    <div class="container border p-5 col-5">
      <div class="row mt-5">
        <form action="" method="POST">
          <h1 class="text-center">Student | Login</h1>
          <?php if (isset($error_message)): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
          <?php endif ?>
          <label for="">Username : </label>
          <input type="text" name="username" class="form-control">
          <label for="">Password : </label>
          <input type="password" name="password" class="form-control">
          <input type="submit" class="btn btn-primary mt-2" name="submit">
        </form>
      </div>
    </div>
    <!--BOOTSTRAP JS BUNDLE  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>