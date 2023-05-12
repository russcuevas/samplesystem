<?php
include '../components/connection.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="extension/css/style.css">
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-title">
            <a style="border: none; padding: 0px;" href=""><img src="https://via.placeholder.com/50x50" alt="Sidebar Icon"></a>
            <h3><a style="border: none; font-size: 15px; padding: 0px;" href="">BCAS-Sample System</a></h3>
          </div>
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="admin_managestudent.php">Manage Student</a>
        <!-- <a href="#">Orders</a>
        <a href="#">Customers</a>
        <a href="#">Reports</a> -->
    </div>

    <!-- Main content -->
    <div class="main">
        <div class="header">
            <h4 class="mt-2">Manage Students</h4>
            <div class="profile">
                <i class="fa fa-user"></i>
                <div class="dropdown">
                  <a href="admin_profile.php">Profile</a>
                  <a href="admin_logout.php">Logout</a>
                </div>
              </div>              
            </div>

        <!-- Table -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            All Students
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <a href="admin_addstudent.php" class="btn btn-success mb-2">Add Student</a>
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
                                            <th scope="col">Actions</th>
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
                                                <td>
                                                    <a href="admin_updatestudent.php?id=<?=$fetch_students['id']; ?>"><i class="fas fa-eye"></i></a>
                                                    <a href="admin_deletestudent.php?id=<?=$fetch_students['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php 
                                        }
                                        } else {
                                            echo "<h1 class='text-center mt-5'>No Student Found</h1>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p style="margin-left: 160px;" class="mt-2">Created by: Russel Vincent C. Cuevas 2023</p>
        </div>
    </div>

<script src="extension/js/script.js"></script>
</body>
</html>