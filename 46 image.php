<?php
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "dbimage");
if ($conn->connect_error) {
    echo "Oops something went wrong";
} else {
    echo "Connection successfully";
}
?>
<!DOCTYPE html>

<head>
    <title>Image upload</title>
</head>

<body>
    <table width="30%">
        <tr>
            <th>Indexno</th>
            <th>Image</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "select *from tblupload");
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>$row[Indexno]</td>
                <td><img src='$row[Uploadimg]' height='150px' width='150px'></td>
                <td><a href='46 image.php ?did=$row[Indexno]'>Delete</a></td>
                <td><a href='46 image.php ?eid=$row[Indexno]'>Edit</a></td>
            </tr>
            ";
        }
        ?>

    </table>
    <a href="45 image.php">insert record</a>
</body>

</html>
<?php
if (isset($_GET['did'])) {
    $did = $_GET['did'];
    $sql = "DELETE FROM tblupload WHERE Indexno=$did";

    if (mysqli_query($conn, $sql)) {
        echo "record delete successfully";
    } else {
        echo "Error" . mysqli_error($conn);
    }
}
if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $result = mysqli_query($conn, "select * from tblupload where Indexno=$eid");
    while ($row = $result->fetch_assoc()) {
?>
        <form action="#" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Indexno</td>
                    <td>:</td>
                    <td><input type="text" name="Indexno" value=" <?php echo $row['Indexno']; ?>"></td>
                </tr>
                <tr>
                    <td>File upload</td>
                    <td>:</td>
                    <td><input type="file" name="fileupload"></td>
                    <img src="images/<?php echo $row['Uploadimg']; ?>" height="100px" width="100px">
                    <td><input type="hidden" name="oldimage" value="<?php echo $row['Uploadimg']; ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="uploaded" name="submit"></td>
                </tr>
            </table>
        </form>
<?php
    }
}
if (isset($_POST['submit'])) {
    $Indexno = $_POST['Indexno'];
    if ($_FILES['Uploadimg']['name'] !== "") {
        $imagename = $_FILES['fileupload']['name'];
        $tmpname = $_FILES['fileupload']['tmp_name'];
        $folder = "images/" . $imagename;
        move_uploaded_file($tmpname, $folder);
    } else {
        $imagename = $_POST['oldimage'];
    }
    $sql = "UPDATE tblupload SET Indexno=$Indexno, Uploadimg='$folder' WHERE Indexno=$eid";
    if (mysqli_query($conn, $sql)) {
        echo "Record update successfully";
        header('location:46 image.php');
    } else {
        echo "Error" . mysqli_error($conn);
    }
}



?>