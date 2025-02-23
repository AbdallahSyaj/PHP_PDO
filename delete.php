<?php 
include('dbcon.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM student WHERE id = :id";
    $statement = $conn->prepare($query);

    if($statement->execute([':id' => $id])) {
        header(header: "Location: index.php");
        
    } else {
        echo "Failed to delete record.";
    }
    
}
?>
