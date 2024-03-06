<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dbemp");
if (!$conn) {
    echo "connection failed" . mysqli_connect_error();
} else {
    echo "connection successfully ";
}
?>
<html>
    <head>
        <style>
            input[type="submit"]{
                width: 100%;
                color: white;
                background-color: chartreuse;
            }
            input[type="submit"]:hover{
                background-color: greenyellow;
            }
        </style>
    </head>
    <body>
        <form action="" name="form" method="post">
            <table>
                <tr>
                    <td>user name</td>
                    <td><input type="text" name="Empuser"></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><input type="text" name="Emppass"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="log in"></td>
                    <td><a href="63_emp.php">Registered now</a></td>
                    
                </tr>
            </table>
        </form>
        <?php 
            if(isset($_POST['submit'])){
                $username=$_POST['Empuser'];
                $password=$_POST['Emppass'];
                // crea the query
                $query="SELECT * FROM tblemployee WHERE Empuser='$username' && Emppass='$password'";
                $data=mysqli_query($conn, $query);
                $total=mysqli_num_rows($data);
                if($total==1){
                    header("location:64_emp.php");
                    $_SESSION['user_name']=$username;
                }
                else{
                    echo "<script>alert('invalid username or password')</script>";
                }
            }
        ?>
    </body>
</html>
<!-- if(isset($_POST['submit'])){
                $username=$_POST['Empuser'];
                $password=$_POST['emppass'];
                $query="SELECT * FROM tblemployee WHERE Empuser='$username' && Emppass='$password'";
                $data=mysqli_query($conn, $query);
                $total=mysqli_num_rows($data);
                if($total==1){
                    header('location:64_emp.php');
                    $_SESSION['user_name']=$username;
                    // echo "log in ok";
                }
                else{
                    echo "login failed";
                }
            } -->