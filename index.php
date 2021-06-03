<?php 
    // include('config/config.php');
    include('config/database.php');
    $db = new Database();
    $sql = "SELECT * FROM tbl_user";
    $read_user = $db->select($sql);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>OOP PHP CRUD</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="card main_body">
                <?php include('./view/header.php'); ?>
                <div class="card-body">
                    <a href="create.php" class="">
                        <button type="button" class="btn btn-dark mb-3 text-uppercase">Create</button>
                    </a>
                    <?php if (isset($_GET['msg'])) { ?>
                        <div class="alert bg-success text-light font-weight-bold alert-dismissible fade show" role="alert">
                            <?php echo $_GET['msg']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                    <?php  } ?>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Department</th>
                                <th scope="col">Skill</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($read_user) {  $i = 1;?>   
                                <?php while ($row = $read_user-> fetch_assoc()) { ?>

                                    <tr>
                                        <td> <?php echo $i++; ?> </td>
                                        <td> <?php echo $row['name'] ?> </td>
                                        <td> <?php echo $row['email'] ?> </td>
                                        <td> <?php echo $row['department'] ?> </td>
                                        <td> <?php echo $row['skill'] ?> </td>
                                        <td> 
                                            <a href="update.php?id=<?php echo $row['id'] ;?>">
                                                <button type="button" class="btn btn-success">Update</button>
                                            </a>
                                            <a href="delete.php?id=<?php echo $row['id'] ;?>">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a> 
                                        </td>
                                        
                                    </tr>

                                <?php } ?>        
                            <?php } else { ?> 
                                <span>Data Is NoT available!!</span>             
                            <?php }  ?>              
                        </tbody>
                    </table>
                </div>
                <?php include('./view/footer.php'); ?>
            </div>
            
        </div>
    </div>
    <?php include('./view/script.php'); ?>
</body>
</html>