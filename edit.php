<?php 
include('dbcon.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM student WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([':id' => $id]);
    $student = $statement->fetch(PDO::FETCH_OBJ);

    if($student) {
        ?>
        <!doctype html>
        <html lang="en">
          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <title>Edit Student</title>
          </head>
          <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Student</h3>
                            </div>
                            <div class="card-body">
                                <form action="update.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $student->id; ?>">
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">FullName</label>
                                        <input type="text" name="fullname" class="form-control" value="<?= $student->fullname; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= $student->email; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="<?= $student->phone; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="course" class="form-label">Course</label>
                                        <input type="text" name="course" class="form-control" value="<?= $student->course; ?>" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </body>
        </html>
        <?php
    } else {
        echo "Record not found.";
    }
}
?>
