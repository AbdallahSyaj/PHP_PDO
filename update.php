<?php 
include('dbcon.php');

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $query = "UPDATE student SET fullname = :fullname, email = :email, phone = :phone, course = :course WHERE id = :id";
    $statement = $conn->prepare($query);

    if($statement->execute([':fullname' => $fullname, ':email' => $email, ':phone' => $phone, ':course' => $course, ':id' => $id])) {
        header(header: "Location: index.php");
    } else {
        echo "Failed to update record.";
    }
}
?>
