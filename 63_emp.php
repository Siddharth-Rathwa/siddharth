<?php 
    $conn=mysqli_connect("localhost", "root","", "dbemp");
    if(!$conn){
        echo "connection failed". mysqli_connect_error();
    }
    else{
        echo "connection successfully ";
    }
?>
<html>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Employee Id</td>
                    <td><input type="text" name="Empid" required value="$row[empid]"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="Empname" required></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="Empuser" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="Emppass" required></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><input type="radio" name="gender" value="male" required>Male<input type="radio" name="gender" value="female" required>Female</td>
                </tr>
                <tr>
                    <td>Contact Num</td>
                    <td><input type="text" name="contact" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php 
    // set the event
    if(isset($_POST['submit'])){
        $Empid=$_POST['Empid'];
        $Empname=$_POST['Empname'];
        $Empuser=$_POST['Empuser'];
        $Emppass=$_POST['Emppass'];
        $Empgender=$_POST['gender'];
        $Empcontact=$_POST['contact'];
        // set the query
       $sql="INSERT INTO tblemployee(Empid, Empname, Empuser, Emppass, Empgender, Empcontact) VALUES($Empid, '$Empname', '$Empuser', $Emppass, '$Empgender', $Empcontact)";
        // run the query
        if(mysqli_query($conn, $sql)){
            echo "<script> alert('Record submit successfully')</script>";
            header("location:64_emp.php");
        }
        else{
            echo "Error ". mysqli_error($conn);
        }
        mysqli_close($conn);

    }

?>
