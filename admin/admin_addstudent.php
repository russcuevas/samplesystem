<?php 
include '../components/connection.php';

if (isset($_POST['submit'])){
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $year = $_POST['year'];
    $course = $_POST['course'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $number = $_POST['number'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO students (student_id, student_name, year, course, username, password, number, email) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$student_id, $student_name, $year, $course, $username, $password_hash, $number, $email]);

    header ('location: admin_managestudent.php');
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
    <title>Admin | Manage Student</title>
  </head>
  <body>
    <div class="title">
        <h1 class="bg-info text-white p-5">Admin Panel</h1>
    </div>
    <div class="container border p-5 col-6">
        <div class="row">
            <form action="" method="POST">
                <h2>Add Students</h2>
                <label for="">Student ID : </label>
                <input type="text" name="student_id" class="form-control">
                <label for="">Student Name : </label>
                <input type="text" name="student_name" class="form-control">
                <label for="">Year : </label>
                <select class="form-control" name="year" id="">
                    <option value="">-- SELECT YEAR --</option>
                    <option value="I - Year"> I - Year</option>
                    <option value="II - Year">II - Year</option>
                    <option value="III - Year">III - Year</option>
                    <option value="IV - Year">IV - Year</option>
                </select>
                <label for="">Course : </label>
                <select class="form-control" name="course" id="">
                    <option value="">-- SELECT COURSE --</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSED">BSED</option>
                    <option value="BSBA">BSBA</option>
                </select>
                <label for="">Username : </label>
                <input type="text" name="username" class="form-control">
                <label for="">Password : </label>
                <input type="password" name="password" class="form-control">
                <label for="">Phone Number : </label>
                <input type="text" name="number" maxlength="11" class="form-control">
                <label for="">Email : </label>
                <input type="email" name="email" class="form-control">
                <input type="submit" name="submit" class="btn btn-success mt-2">
            </form>
        </div>
    </div>
    <!--BOOTSTRAP JS BUNDLE  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>    