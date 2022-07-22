<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collected Data</title>
</head>
<body>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "phpprac");

        $query = "SELECT * FROM user";
        $query_run = mysqli_query($conn, $query);

    ?>
    <table>
        <thead>

            <tr>

                <th>ID</th>
                <th>User Name</th>
                <th>User Age</th>
                <th>User Email</th>
                <th>User Password</th>
                <th>User Image</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(mysqli_num_rows($query_run)>0){
                    foreach($query_run as $row){
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['user_name']; ?></td>
                            <td><?php echo $row['user_age']; ?></td>
                            <td><?php echo $row['user_email']; ?></td>
                            <td><?php echo $row['user_pass']; ?></td>
                            <td>
                                <img src="<?php echo "upload/" .$row['user_image']; ?>" width="100px" alt="image">
                            </td>
                            <td>
                                <form action="code.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="del_user_image" value="<?php echo $row['user_image']; ?>">
                                    <button type="submit" name="delete_user_image">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                }
                else{

                    ?>
                    <tr>
                        <td>No Record Available!</td>
                    </tr>
                    <?php
                }
            ?>
            <tr>
                <td></td>
            </tr>
        </tbody>

    </table>
</body>
</html>