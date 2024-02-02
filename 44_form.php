<?php
$conn = mysqli_connect("localhost", "root", "", "dbform");
if ($conn->connect_error) {
    echo "Oops something went wrong";
} else {
    echo "connection successfully";
}
?>
<DOCTYPE html>
    <!-- creat the table about the database value -->
    <body>
        <table cellspacing="10" cellpadding="20" border="1">
            <tr bgcolor="yellow">
                <th>Indexno</th>
                <th>Upload Image</th>
                <th>First Name</th>
                <th>Gender</th>
                <th>Hobbies</th>
                <th>Caste</th>
                <th>State</th>
                <th colspan="2">correction</th>
            </tr>
            <?php
            $result = mysqli_query($conn, "select * from tblform");
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>$row[Indexno]</td>
                    <td><img src='$row[Uploadimg]' height='150px' width='150px'></td>
                    <td>$row[Firstname]</td>
                    <td>$row[Gender]</td>
                    <td>$row[Hobbies]</td>
                    <td>$row[Caste]</td>
                    <td>$row[Region]</td>
                    <td><a href='44_form.php? did=$row[Indexno]'>Delete</a></td>
                    <td><a href='44_form.php? eid=$row[Indexno]'>Edit</a></td>
                </tr>
                ";
            }
            ?>
        </table>
        <a href="43 form.php">Insert Record</a>
        <!-- Set the delete value -->
        <?php
        if (isset($_GET['did'])) {
            $did = $_GET["did"];
            $sql = "DELETE FROM tblform where Indexno=$did";
            if (mysqli_query($conn, $sql)) {
                echo "Record delete successfully";
                header("location:44_form.php");
            } else {
                echo "Error" . mysqli_errno($conn);
            }
            mysqli_close($conn);
        }
        // Set the update value
        if (isset($_GET["eid"])) {
            $eid = $_GET["eid"];
            $result = mysqli_query($conn, "select * from tblform where Indexno=$eid");
            while ($row = $result->fetch_assoc()) {
        ?>
                <form method="post" name="form" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Index.no</td>
                            <td>:</td>
                            <td><input type="text" name="Indexno" value="<?php echo $row['Indexno']?>"></td>
                        </tr>
                        <tr>
                            <td>Upload Image</td>
                            <td>:</td>
                            <td><input type="file" name="phototoupload"></td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>:</td>
                            <td><input type="text" name="Firstname" value="<?php echo $row['Firstname']?>"></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td>
                                <input type="radio" name="male" value="Male" <?php if($row['Gender']=="Male"){echo "checked";}?>><label>Male</label>
                                <input type="radio" name="male" value="Female"  <?php if($row['Gender']=="Female"){echo "checked";}?>><label>Female</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Hobbies</td>
                            <td>:</td>
                            <td><input type="checkbox" name="hobbies" value="Cricket" <?php if($row['Hobbies']=="Cricket"){echo "checked";}?>>
                                <lable>Cricket</lable>
                                <input type="checkbox" name="hobbies" value="Football" <?php if($row['Hobbies']=="Football"){echo "checked";}?>>
                                <lable>Football</lable>
                                <input type="checkbox" name="hobbies" value="Vollyball" <?php if($row['Hobbies']=="Vollyball"){echo "checked";}?>>
                                <lable>Vollyball</lable>
                                <input type="checkbox" name="hobbies" value="Basketball" <?php if($row['Hobbies']=="Basketball"){echo "checked";}?>>
                                <lable>Basketball</lable>
                            </td>
                        </tr>
                        <tr>
                            <td>Caste</td>
                            <td>:</td>
                            <td><input type="radio" name="Caste" value="Open" <?php if($row["Caste"]=="Open"){echo "checked";}?>><label>open</label>
                                <input type="radio" name="Caste" value="OBC" <?php if($row["Caste"]=="OBC"){echo "checked";}?>><label>OBC</label>
                                <input type="radio" name="Caste" value="SC" <?php if($row["Caste"]=="SC"){echo "checked";}?>><label>SC</label>
                                <input type="radio" name="Caste" value="ST" <?php if($row["Caste"]=="ST"){echo "checked";}?>><label>ST</label>
                            </td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>:</td>
                            <td><select name="state">
                                    <option value="-1">Select state</option>
                                    <option value="Jamu and kashmir" <?php if($row["Region"]=="Jamu and kashmir"){echo "selected";}?>>Jamu and kashmir</option>
                                    <option value="Panjab"<?php if($row["Region"]=="Panjab"){echo "selected";}?>>Panjab</option>
                                    <option value="Uttrakhand" <?php if($row["Region"]=="Uttrakhand"){echo "selected";}?>>Uttrakhand</option>
                                    <option value="Hariyana" <?php if($row["Region"]=="Hariyana"){echo "selected";}?>>Hariyana</option>
                                    <option value="Uttar pradesh" <?php if($row["Region"]=="Uttar pradesh"){echo "selected";}?>>Uttar pradesh</option>
                                    <option value=" Madhya pradesh" <?php if($row["Region"]=="Madhya pradesh"){echo "selected";}?>>Madhya pradesh</option>
                                    <option value="Rajesthan" <?php if($row["Region"]=="Rajesthan"){echo "selected";}?>>Rajesthan</option>
                                    <option value="Gujarat" <?php if($row["Region"]=="Gujarat"){echo "selected";}?>>Gujarat</option>
                                    <option value="Maharashtra" <?php if($row["Region"]=="Maharashtra"){echo "selected";}?>>Maharashtra</option>
                                    <option value="Goa" <?php if($row["Region"]=="Goa"){echo "selected";}?>>Goa</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="submit"></td>
                        </tr>
                    </table>
                </form>
        <?php
            }
        }
        // set the update query
        if(isset($_POST["submit"])){
            $Indexno=$_POST["Indexno"];
            $Firstname=$_POST["Firstname"];
            $Gender=$_POST["male"];
            $Hobbies=$_POST["hobbies"];
            $caste=$_POST["Caste"];
            $Region=$_POST["state"];
            $filename = $_FILES["phototoupload"]["name"];
            $tmpname = $_FILES["phototoupload"]["tmp_name"];
            $folder = "photos/" . $filename;
            move_uploaded_file($tmpname, $folder);
            $sql="UPDATE tblform SET Indexno=$Indexno, Uploadimg='$folder', Firstname='$Firstname', Gender='$Gender', Hobbies='$Hobbies', Caste='$caste', Region='$Region' WHERE Indexno=$eid";
            if(mysqli_query($conn, $sql)){
                echo "Update record successfully";
                header("location:44_form.php");

            }
            else{
                echo "Error". mysqli_error($conn);
            }
            mysqli_close($conn);
        }
        ?>
    </body>
</DOCTYPE>