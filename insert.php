<?php 
include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $query = "INSERT INTO student (fullname, email, phone, course) VALUES (?, ?, ?, ?)";
    $statement = $conn->prepare($query);
try {
    if ($statement->execute([$fullname,$email,$phone, $course])) {
        header(header: "Location: index.php");
    }
} catch (PDOException $e) {
    
    $message = "Failed to add record. Please check your input.";
    
    echo "<script type='text/javascript'>alert('$message');</script>";
    
    
    
}
}
?>
