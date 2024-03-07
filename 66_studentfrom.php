<?php 
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
    <p>STUDENT REGISTRATION FORM</p>
    <form action="" name="studentform" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>student id</td>
                <td><input type="text" name="Studentid" required></td>
            </tr>
            <tr>
                <td>Student Name</td>
                <td><input type="text" name="Studentname" required></td>
            </tr>
            <tr>
                <td>Student Image</td>
                <td><input type="file" name="Studentimage" required></td>
            </tr>
            <tr>
                <td>Student username</td>
                <td><input type="email" name="Studentemail" required></td>
            </tr>
            <tr>
                <td>Student password</td>
                <td><input type="password" name="Studentpass" required></td>
            </tr>
            <tr>
                <td>Student fees</td>
                <td><input type="text" name="Studentfees"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Register"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php 
    if(isset($_POST['submit'])){
        $Studentid=$_POST['Studentid'];
        $Studentname=$_POST['Studentname'];
        $Studentuser=$_POST['Studentemail'];
        $Studentpass=$_POST['Studentpass'];
        $Studentfees=$_POST['Studentfees'];
        // set the image
        $Studentimage=$_FILES['Studentimage']['name'];  
        $Student_tmp=$_FILES['Studentimage']['tmp_name'];
        $folder="images/". $Studentimage;
        move_uploaded_file($Student_tmp, $folder);
        // start the session
        // set the insert query
        $query="INSERT INTO studentdata (Studentid, Studentname, Studentimage, Studentuser, Studentpass, Studentfees) VALUES ($Studentid, '$Studentname', '$folder', '$Studentuser', $Studentpass, $Studentfees)";
        // Run the query
        if(mysqli_query($conn, $query)){
            echo "<script>alert('Registered successfully')</script>";
            ?>
                <meta http-equiv="refresh" content="2, url=http://localhost/siddharth/68_login.php">
            <?php 
            
        }
        else{
            echo "Error ". mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>