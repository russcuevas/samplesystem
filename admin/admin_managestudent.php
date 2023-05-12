<?php
include '../components/connection.php';


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
    <div class="d-flex justify-content-between">
        <div class="add">
            <a href="admin_addstudent.php" class="btn btn-success float-start">Add Student</a>
        </div>
    <div class="logout">
            <a href="admin_logout.php" class="btn btn-danger float-end">Logout</a>
    </div>
</div>
    <div class="back">
        <a href="admin_dashboard.php" class="btn btn-warning text-white mt-1">Go back</a>
    </div>
    <div class="right">
        <table class="table">
        <?php 
            $select_students = $conn->prepare("SELECT * FROM students");
            $select_students->execute();
            if ($select_students->rowCount() > 0){
                while ($fetch_students = $select_students->fetch(PDO::FETCH_ASSOC)){
        ?>
        <thead>
            <tr>
            <th scope="col">Student ID</th>
            <th scope="col">Student Name</th>
            <th scope="col">Student Year</th>
            <th scope="col">Student Course</th>
            <th scope="col">Student Number</th>
            <th scope="col">Student Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?=$fetch_students['student_id']; ?></td>
            <td><?=$fetch_students['student_name']; ?></td>
            <td><?=$fetch_students['year']; ?></td>
            <td><?=$fetch_students['course']; ?></td>
            <td><?=$fetch_students['number']; ?></td>
            <td><?=$fetch_students['email']; ?></td>
            </tr>
            <?php 
            }
        }else{
            echo "<h1 class='text-center mt-5'>No Student Found</h1>";
        }
            ?>
        </tbody>
        </table>
    </div>
    <!--BOOTSTRAP JS BUNDLE  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>