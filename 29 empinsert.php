<?php
    $conn=mysqli_connect("localhost", "root", "","dbemp");
    if($conn->connect_error){
        echo "Oops...something else wrong";
    }
    else{
        echo "connection sucessfully";
    }
?>
<!DOCTYPE html>
<head>
    <title>employee list</title>
</head>
<body>
    <form method="post" name="form">
        <table>
            <tr>
                <td>Index no</td>
                <td>:</td>
                <td><input type="text" name="index"></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td>:</td>
                <td><input type="text" name="firstname"></td>
            </tr>
             <tr>
                <td>Post</td>
                <td>:</td>
                <td><input type="text" name="post"></td>
            </tr>
            <tr>
                <td>Ph.No</td>
                <td>:</td>
                <td><input type="text" name="phno"></td>
            </tr>
            <tr>
                <td><input type="submit" value="submit" name="submit"></td>
            </tr>
        </table>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $index=$_POST["index"];
            $firstname=$_POST["firstname"];
            $post=$_POST["post"];
            $phno=$_POST["phno"];

            $sql="INSERT INTO tblemployee(indexno,firstname, Post, phno) VALUES($index, '$firstname', '$post', $phno)";
            echo $sql;
            if(mysqli_query($conn, $sql)){
                echo "New reccord created sucessfully";
            }
            else{
                echo "Error ". mysqli_error($conn);
            }

        }
    ?>
</body>