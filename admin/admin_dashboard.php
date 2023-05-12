<?php 
include '../components/connection.php';
session_start();

$username = $_SESSION['username'];
if(!isset($username)){
    header('location:admin_login.php');
}
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
            <h4 class="mt-2">Admin Dashboard</h4>
            <div class="profile">
                <i class="fa fa-user"></i>
                <div class="dropdown">
                  <a href="admin_profile.php">Profile</a>
                  <a href="admin_logout.php">Logout</a>
                </div>
              </div>              
            </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Total Students
                        <?php 
                            $stmt = $conn->prepare("SELECT COUNT(*) AS total_students FROM students");
                            $stmt->execute();
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            $total_student = $row['total_students'];
                        ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $total_student; ?></h5>
                            <a href="admin_managestudent.php" class="card-text text-decoration-none">View Users.</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Total Orders
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">1,500</h5>
                            <a href="" class="card-text text-decoration-none">View Orders.</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Total Reports
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">0</h5>
                            <a href="" class="card-text text-decoration-none">View Users.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Registered Students
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>RussCVS</td>
                                        <td>russel123</td>
                                        <td>7110eda4d09e062aa5e4a390b0a572ac0d2c0220</td>
                                    </tr>
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