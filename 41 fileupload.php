<?php
$conn = mysqli_connect("localhost", "root", "", "dbstudent");
if ($conn->connect_error) {
    echo "Somethng went wrong";
} else {
    echo "connection sucessfully";
}
?>
<!DOCTYPE html>

<body>
    <form name="form" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Roll Numbers</td>
                <td>:</td>
                <td><input type="text" name="Rollnumbers"></td>
            </tr>
            <tr>
                <td>Firstname</td>
                <td>:</td>
                <td><input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td>Select image</td>
                <td>:</td>
                <td> <input type="file" name="fileToUpload" id="fileToUpload"></td>
            </tr>
            <tr>
                <td><input type="submit" value="submit" name="submit"></td>
            </tr>
        </table>
    </form>
    <?php
    // creat the uplod query
    if (isset($_POST["submit"])) {
        $target_dir = "uploads/";
        $target_file = $_FILES["fileToUpload"]["name"];
        $uploadok = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // CHECK IF IMAGE FILE IS A ACTUAL IMAGE OR FAKE IMAGE

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo " file is an image " . $check["mime"] . ".";
            $uploadok = 1;
        } else {
            echo "file is not an image.";
            $uploadok = 0;
        }

        $Rollnumber = $_POST['Rollnumbers'];
        $Firstname = $_POST['firstname'];
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . '/' . $target_file);
        $sql = "INSERT INTO tblstudents(Rollnumber, Firstname, Photo) VALUES($Rollnumber, '$Firstname', '$target_file')";
        if (mysqli_query($conn, $sql)) {
            echo "insert sucessfully";
        } else {
            echo "Error " . mysqli_error($conn);
        }
    }
    ?>

</body>