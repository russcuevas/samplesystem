<?php 
include '../components/connection.php';


if (isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->execute([$id]);
    
    header ('location: admin_managestudent.php');
    exit();
}
?>