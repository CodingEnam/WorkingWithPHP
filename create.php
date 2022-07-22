<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataSaver</title>
</head>
<body>
    <style type="text/css">
        #box{
            background-color: lightblue;
            margin: auto;
            width: 480px;
            padding: 20px;
            border-radius: 20px;
        }
    </style>

    <?php
        if(isset($_SESSION['status']) && $_SESSION != ''){
            ?>
            <strong>OMG!</strong> <?php echo $_SESSION['status']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times</span></button>
            <?php
            unset($_SESSION['status']);
        }
    ?>
    <div id="box">
    <center><h1>Welcome to Our Website</h1></center>
    <center><h4>Please fill in the form below</h4></center>
        <center><form action="code.php" method="post" enctype="multipart/form-data">

            <label for="">Name</label>
            <input type="text" name="user_name" class = "form-control" placeholder="Enter Name" required><br><br>

            <label for="">Age</label>
            <input type="text" name="user_age" class = "form-control" placeholder="Enter Age" required><br><br>

            <label for="">Email</label>
            <input type="email" name="user_email" class = "form-control" placeholder="Enter Your Email" required><br><br>

            <label for="">Password</label>
            <input type="password" name="user_pass" class = "form-control" placeholder="Enter Your Password" required><br><br>

            <label for="">your Image</label>
            <input type="file" name="user_image" class = "form-control" required><br><br>

            <button type="submit" name="save_stud_image" class="btn btn-primary">SUBMIT - SAVE</button>

        </form></center>
    </div>

</body>
</html>