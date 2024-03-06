<?php
session_start();
    echo "<script>alert('welcome to the Display page ')</script>". $_SESSION["user_name"]. "<br>";
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
        table a {
            text-decoration: none;
            padding: 5px 2px;
            display: block;
            background-color: red;
            color: white;
            border-radius: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <table width="70%" bgcolor="whitesmoke">
        <tr bgcolor="grey">
            <td>Employee Id</td>
            <td>Employee image</td>
            <td>Employee Name</td>
            <td>User Name</td>
            <td>Password</td>
            <td>Gender</td>
            <td>Contact Number</td>
            <td colspan="2">Edit</td>
        </tr>
        <!-- user log in session -->
        <?php
        $userprofile=$_SESSION['user_name'];
        if($userprofile==true){

        }
        else{
            header("location:62_login.php");
        }
        $result = mysqli_query($conn, "select * from tblemployee");
        while ($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>" . $row['Empid'] . "</td>
                    <td> <img src=". $row['Empimage']." height='190px' width='150px'></td>
                    <td>" . $row['Empname'] . "</td>
                    <td>" . $row['Empuser'] . "</td>
                    <td>" . $row['Emppass'] . "</td>
                    <td>" . $row['Empgender'] . "</td>
                    <td>" . $row['Empcontact'] . "</td>
                    <td><a href='64_emp.php? eid=$row[Empid]'>Edit</a></td>
                    <td><a href='64_emp.php? did=$row[Empid]'>Delete</a></td>
               </tr>
                ";
        }
        ?>
    </table>
    <a href="63_emp.php">insert Record</a>
    <a href="65_logout.php"><input type="submit" name="submit" value="logout"></a>
</body>
</html>
<?php
// creat the delete query
if (isset($_GET['did'])) {
    $did = $_GET['did'];
    $sql = "DELETE FROM tblemployee WHERE Empid=$did";
    if (mysqli_query($conn, $sql)) {
        echo "Delete successfully";
        header("location:64_emp.php");
    } else {
        echo "Error " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
// creat the update query
if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $result = mysqli_query($conn, "select * from tblemployee WHERE Empid='$eid'");
    while ($row = $result->fetch_assoc()) {
?>
        <html>

        <body>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Employee Id</td>
                        <td><input type="text" name="Empid" required value="<?php echo $row['Empid'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="Empname" required value="<?php echo $row['Empname'] ?>"></td>
                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td><input type="text" name="Empuser" required value="<?php echo $row['Empuser'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="Emppass" required value="<?php echo $row['Emppass'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><input type="radio" name="gender" value="male" <?php if ($row['Empgender'] == "male") {
                                                                                echo 'checked';
                                                                            } ?> required><label>male</label>
                            <input type="radio" name="gender" value="female" <?php if ($row['Empgender'] == "female") {
                                                                                    echo 'checked';
                                                                                } ?> required><label>female</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Num</td>
                        <td><input type="text" name="contact" required value="<?php echo $row['Empcontact'] ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="submit"></td>
                    </tr>
                </table>
            </form>
        </body>

        </html>
<?php
    }
}
if (isset($_POST['submit'])) {
    $Empid = $_POST['Empid'];
    $Empname = $_POST['Empname'];
    $Empuser = $_POST['Empuser'];
    $Emppass = $_POST['Emppass'];
    $Empgender = $_POST['gender'];
    $Empcontact = $_POST['contact'];
    // set the query
    $sql = "UPDATE tblemployee SET Empid=$Empid, Empname='$Empname', Empuser='$Empuser', Emppass=$Emppass, Empgender='$Empgender', Empcontact=$Empcontact WHERE Empid=$eid";
    if (mysqli_query($conn, $sql)) {
        echo "Record update successfully";
        // header("location:64_emp.php");
        ?>
            <meta http-equiv="refresh" content="1; url= http://localhost/siddharth/64_emp.php" />
        <?php
    } else {
        echo "Error " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>