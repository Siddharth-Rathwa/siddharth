<?php
$conn = mysqli_connect("localhost", "root", "", "dbschool");
?>
<!DOCTYPE html>

<head>
    <title>Document</title>
</head>

<body>

    <form method="post" name="form">
        <table>
            <tr>
                <td>index.no</td>
                <td>:</td>
                <td><input type="text" name="indexno"></td>
            </tr>
            <tr>
                <td>Gr.no</td>
                <td>:</td>
                <td><input type="text" name="grno"></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td>:</td>
                <td><input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td>Fees</td>
                <td>:</td>
                <td><input type="text" name="fees"></td>
             </tr>
             <tr>
                <td>completed</td>
                <td>:</td>
                <td><input type="text" name="completed"></td>
            </tr>
            <tr>
                <td><input type="submit" value="submit" name="submit"></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $inddex=$_POST["indexno"];
        $grno=$_POST["grno"];
        $firstname=$_POST["firstname"];
        $fees=$_POST["fees"];
        $completed=$_POST["completed"];

        $sql="INSERT INTO tblstudent(indexno, grno,firstname,fees, completed)VALUES($inddex, $grno, '$firstname', $fees, '$completed')";
        echo $sql;
        if(mysqli_query($conn, $sql)){
            echo "New record created successfully";
        }
        else{
            echo "Error ". mysqli_error($conn);
        }
    }
    ?>
    <a href="26 school.php">Show Record</a>
</body>

</html>