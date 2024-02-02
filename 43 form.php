<?php
$conn = mysqli_connect("localhost", "root", "", "dbform");
if ($conn->connect_error) {
    echo "Oops something went wrong";
} else {
    echo "connection successfully";
}
?>
<DOCTYPE html>
    <form method="post" name="form" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Index.no</td>
                <td>:</td>
                <td><input type="text" name="Indexno"></td>
            </tr>
            <tr>
                <td>Upload Image</td>
                <td>:</td>
                <td><input type="file" name="phototoupload"></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td>:</td>
                <td><input type="text" name="Firstname"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>
                    <input type="radio" name="male" value="Male"><label>Male</label>
                    <input type="radio" name="male" value="Female"><label>Female</label>
                </td>
            </tr>
            <tr>
                <td>Hobbies</td>
                <td>:</td>
                <td><input type="checkbox" name="hobbies" value="Cricket">
                    <lable>Cricket</lable>
                    <input type="checkbox" name="hobbies" value="Football">
                    <lable>Football</lable>
                    <input type="checkbox" name="hobbies" value="Vollyball">
                    <lable>Vollyball</lable>
                    <input type="checkbox" name="hobbies" value="Basketball">
                    <lable>Basketball</lable>
                </td>
            </tr>
            <tr>
                <td>Caste</td>
                <td>:</td>
                <td><input type="radio" name="radio" value="Open"><label>open</label>
                    <input type="radio" name="radio" value="OBC"><label>OBC</label>
                    <input type="radio" name="radio" value="SC"><label>SC</label>
                    <input type="radio" name="radio" value="ST"><label>ST</label>
                </td>
            </tr>
            <tr>
                <td>State</td>
                <td>:</td>
                <td><select name="state">
                        <option value="-1">Select state</option>
                        <option value="Jamu and kashmir">Jamu and kashmir</option>
                        <option value="Panjab">Panjab</option>
                        <option value="Uttrakhand">Uttrakhand</option>
                        <option value="Hariyana">Hariyana</option>
                        <option value="Utar pradesh">Uter pradesh</option>
                        <option value=" Madhya pradesh">Madhya pradesh</option>
                        <option value="Rajesthan">Rajesthan</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Goa">Goa</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</DOCTYPE>
<?php
if (isset($_POST["submit"])) {
    $filename = $_FILES["phototoupload"]["name"];
    $tmpname = $_FILES["phototoupload"]["tmp_name"];
    $folder = "photos/" . $filename;
    move_uploaded_file($tmpname, $folder);
    $index = $_POST["Indexno"];
    $firstname = $_POST["Firstname"];
    $gender = $_POST["male"];
    $hobbies = $_POST["hobbies"];
    $caste = $_POST["radio"];
    $state = $_POST["state"];

    $sql = "INSERT INTO tblform(Indexno, Uploadimg, Firstname, Gender, Hobbies, Caste, Region) VALUES ($index, '$folder', '$firstname', '$gender', '$hobbies', '$caste', '$state')";
    if (mysqli_query($conn, $sql)) {
        echo " Recorded insert successfully";
    } else {
        echo "Error" . mysqli_error($conn);
        header("location:44_form.php");
    }
    mysqli_close($conn);
}
?>
<a href="44_form.php">Show record</a>