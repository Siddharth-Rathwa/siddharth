<?php 
    session_start();
    $conn=mysqli_connect("localhost", "root", "", "studentrecord");
    if(!$conn){
        echo "login failed";
    }
    else{
        echo "<script>alert('connection successfully')</script>";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <table width="50%" bgcolor="whitesmoke"  cellpadding='5'>
            <tr bgcolor="grey">
                <td>Studentid</td>
                <td>Student Name</td>
                <td>Image</td>
                <td>User Name</td>
                <td>Password</td>
                <td>Fees</td>
                <!-- set the query -->
                <?php
                    $username=$_SESSION['user_name'];
                    if($username==true){

                    }
                    else{
                        header("location:68_login.php");
                    }
                    $result=mysqli_query($conn, "select * from studentdata");
                    while($row=$result->fetch_assoc()){
                        echo "
                            <tr>
                                <td>". $row['Studentid']."</td>
                                <td>". $row['Studentname']."</td>
                                <td><img src=".$row['Studentimage']." height='150px' width='150px'</td>
                                <td>". $row['Studentuser']."</td>
                                <td>". $row['Studentpass']."</td>
                                <td>". $row['Studentfees']."</td>
                            </tr>
                        ";
                    }
                ?>
            </tr>
        </table>
        <a href="68_login.php"><input type="submit" name="submit" value="logout" style="padding: 7px 10px; background-color:red;"></a>
        <?php 
            // session_unset();
            session_destroy();
        ?>
</body>
</html>