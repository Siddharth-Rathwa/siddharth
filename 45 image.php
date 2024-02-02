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

    <title>File upload</title>
</head>

<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Indexno</td>
                <td>:</td>
                <td><input type="text" name="Indexno"></td>
            </tr>
            <tr>
                <td>File upload</td>
                <td>:</td>
                <td><input type="file" name="fileupload"></td>
            </tr>
            <tr>
                <td><input type="submit" value="uploaded" name="submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>
<!-- start the php coading  -->
<?php
if (isset($_POST["submit"])) {
    $imagename = $_FILES["fileupload"]["name"];
    $tmpname = $_FILES["fileupload"]["tmp_name"];
    $folder = "images/" . $imagename;
    move_uploaded_file($tmpname, $folder);
    echo " <img src='$folder' height='200px' width='200px'>";
    // echo $tmpname;
    // print_r($_FILES["fileupload"]) // show the array value
    $Indexno=$_POST['Indexno'];
    $sql = "INSERT INTO tblupload(Indexno, Uploadimg) VALUES ( $Indexno, '$folder')";
    if (mysqli_query($conn, $sql)) {
        echo "image uploaded";
        header("location:46 image.php");
    } else {
        echo "Error " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>