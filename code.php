<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "phpprac");

    if(isset($_POST['save_stud_image'])){
        $name = $_POST['user_name'];
        $age = $_POST['user_age'];
        $email = $_POST['user_email'];
        $pass = $_POST['user_pass'];
        $image = $_POST['user_image']['name'];

        if(file_exists("upload/" .$_POST['user_image']['name'])){
            $filename = $_FILES['user_name']['name'];
            $_SESSION['status'] = "Image already exists" .$filename;
            header('location: create.php');
        }

        $query = "INSERT INTO user (user_name, user_age, user_email, user_pass, user_image) VALUES ('$name', '$age', '$email', '$pass', '$image')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            move_uploaded_file($_FILES["user_image"]["tmp_name"], "upload/".$_FILES["user_image"]["name"]);

            $_SESSION['status'] = "Image Stored Successfully";
            header('location: create.php');
        } else {
            $_SESSION['status'] = "Image Not Inserted.!";
            header('location: create.php');
        }
        

    }

    if(isset($_POST['delete_user_image'])){

            $id = $_POST['delete_id'];
            $user_image = $_POST['del_user_image'];

            $query = "DELETE FROM user WHERE id='$id'";
            $query_run = mysqli_query($conn, $query);

            if($query_run){
                unlink("upload/" .$user_image);
                $_SESSION['status'] = "Data Removed Successfully";
                header('Location: index.php');

            }
            else{
                $_SESSION['status']="Data Delete Failed";
                header('Location: index.php');
            }
    }
?>