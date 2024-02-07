<?php
    // error_reporting(0);
    $conn=mysqli_connect("localhost", "root","", "dbstudentrecord");
    if(!$conn){
        die ("connection failed". mysqli_connect_error());
    }
    echo "connection successfully";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" name="form" method="post">
        <table>
            <tr>
                <td>Student Id</td>
                <td><input type="text" name="Studentid" required></td>
            </tr>
            <tr>
                <td>Student Image</td>
                <td><input type="file" name="StudentToupload" required></td>
            </tr>
            <tr>
                <td>Student Name</td>
                <td><input type="text" name="Studentname" required></td>
            </tr>
            <tr>
                <td>Student Gr.no</td>
                <td><input type="text" name="Studentgrno" required></td>
            </tr>
            <tr>
                <td>Standard</td>
                <td><input type="text" name="Studentstandard" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $Studentid=$_POST['Studentid'];
        $Studentname=$_POST['Studentname'];
        $Studentgrno=$_POST['Studentgrno'];
        $Standard=$_POST['Studentstandard'];
        // set the image
        $Studentimg=$_FILES["StudentToupload"]["name"];
        $tmpname=$_FILES["StudentToupload"]["tmp_name"];
        $Student="student/". $Studentimg;
        move_uploaded_file($tmpname, $Student);
        // set the query
        $query="INSERT INTO tblrecord(Studentid, Studentimg, Studentname, Grnumber, standerd) VALUES($Studentid, '$Student', '$Studentname', $Studentgrno, $Standard)";
        if(mysqli_query($conn, $query)){
            echo"<script>alert('Record submit successfully')</script>";
            header("location:57_studentdisplay.php");
        }
        else{
            echo "Error". mysqli_error($conn);
        }
        
    }
?>
