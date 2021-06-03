<?php 
    include('config/database.php');
    $error = '';
    $db = new Database();
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $skill = $_POST['skill'];
        if ($name == '' || $email == '' || $department == '' || $skill == '') {
            $error = "Field Can't be empty";
        } else{
            $sql = "INSERT INTO tbl_user (name, email, department, skill) VALUES ('$name', '$email', '$department', '$skill')";
            $db->insert($sql);
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Create</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="card main_body">
                <?php include('./view/header.php'); ?>
                <div class="card-body">
                    <form method="POST" action="create.php">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            <span class="text-danger"><?php echo $error; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            <span class="text-danger"><?php echo $error; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="text" class="form-control" name="department" id="department" placeholder="Department">
                            <span class="text-danger"><?php echo $error; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="skill">Skill</label>
                            <input type="skill" class="form-control" name="skill" id="skill" placeholder="Skill">
                            <span class="text-danger"><?php echo $error; ?></span>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Create</button>
                        <a href="index.php" class="">
                            <button type="button" class="btn btn-dark text-uppercase">Back</button>
                        </a>
                    </form>
                </div>
                <?php include('./view/footer.php'); ?>
            </div>
        </div>
    </div>
    <?php include('./view/script.php'); ?>
</body>
</html>