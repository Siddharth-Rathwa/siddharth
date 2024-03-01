<?php 
    session_start();
    $conn=mysqli_connect("localhost", "root", "", "dbform");
    if(!$conn){
        echo "connection failed". mysqli_connect_error();
    }
    else{
        echo "connection successfully";
    }
?>
<html>
    <body>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
            <table>
                <tr>
                    <td>Id</td>
                    <td><input type="text" name="Empid"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="Empname"></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="Empuser"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="Emppass"></td>
                </tr>
                <tr>
                    <td>Contact No</td>
                    <td><input type="text" name="Empcontact"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Register"></td>
                </tr>
                
            </table>
    </form>
    </body>
</html>
<?php 
    if(isset($_POST["submit"])){
        $Empid=$_POST['Empid'];
        $Empname=$_POST['Empname'];
        $Empuser=$_POST['Empuser'];
        $Emppass=$_POST['Emppass'];
        $contactnum=$_POST['Empcontact'];
        // set the query
        $sql="INSERT INTO tblsession(Empid, Empname, Empuser, Emppass, Contactnum)VALUES($Empid, '$Empname', '$Empuser', $Emppass, $contactnum)";

        if(mysqli_query($conn, $sql)){
            echo "Registration successfully";
        }
        else{
            echo "Error ". mysqli_error($conn);
        }
    }
?>