<?php 
    // include('config/config.php');
    include('config/database.php');
    $db = new Database();

    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_user WHERE id='$id'";
    $fetch_user = $db->select($sql)->fetch_assoc();;

    if(isset($_POST['submit'])){
        $sql = "DELETE FROM tbl_user WHERE id ='$id'";
        $db->delete($sql);
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
    <title>Delete</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="card main_body">
                <?php include('./view/header.php'); ?>
                <div class="card-body">
                    
                    <?php if (isset($_GET['msg'])) { ?>
                        <div class="alert bg-success text-light alert-dismissible fade show" role="alert">
                            <?php echo $_GET['msg']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                    <?php  } ?>
                    <h1 class="text-center text-danger">This Data Will be Deleted!!</h1>
                    <div class="text-center">
                        <h1><?php echo $fetch_user['name'] ?></h1>
                        <h5>Email: <?php echo $fetch_user['email'] ?></h5>
                        <h5>Department: <?php echo $fetch_user['department'] ?></h5>
                        <h5>Skills: <?php echo $fetch_user['skill'] ?></h5>
                    </div>
                    <form method="POST" action="delete.php?id=<?php echo $id; ?>" class="text-center mt-3">
                        <input type="submit" class="btn btn-danger" name="submit" value="Delete">
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