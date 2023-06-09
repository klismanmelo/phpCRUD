<?php
    include "db_connect.php";
    $id = $_GET['id'];
    if(isset($_POST['submit'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
    

        $sql = "UPDATE `list_user` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gener`='$gender' 
        WHERE id=$id";

        $result = mysqli_query($connect,$sql);

        if($result){
            header("Location: index.php?msg=Data updated succesfully");
        }else
            echo "Failed: " . mysqli_error($connect);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Add User</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" 
    style="background-color: #00ff5573;">
        <h1>Users for cont</h1>
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">Complete the form below to add a new user</p>
        </div>

        <?php 
            include 'db_connect.php';
            
            $sql = "SELECT * FROM `list_user` WHERE id = $id LIMIT 1";
            $result = mysqli_query($connect,$sql);
            $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width: 300px">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name: </label>
                        <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?> ">
                    </div>

                    <div class="col">
                        <label class="form-label">Last Name: </label>
                        <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?> ">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email: </label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?> ">
                </div>
                <div class="form-group mb-3">
                    <label>Gender: </label> &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo ($row['gener']=='male')? "checked":""; ?>>
                    <label for="male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo ($row['gener']=='female')? "checked":""; ?>>
                    <label for="female" class="form-input-label">Female</label>
                </div>
                <div>
                    <button type="submit" name="submit" class="btn btn-success">Updated</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>



    <!-- Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>