<?php
    $conn=mysqli_connect("localhost", "root","", "dbregistration");
    if($conn->connect_error){
        echo "Oops something went wrong";
    }
    else{
        echo "conncection sucessfully";
    }
?>
<DOCTYPE html>
    <form name="form" method="post">
        <table>
            <tr>
                <td>Index.no</td>
                <td>:</td>
                <td><input type="text" name="index"></td>
            </tr>
            <tr>
                <td>First name</td>
                <td>:</td>
                <td><input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td>Caste</td>
                <td>:</td>
                <td><input type="radio" name="radio" value="OBC"><label>OBC</label>
                <input type="radio" name="radio" value="Sc"><label>SC</label>
                <input type="radio" name="radio" value="St"><label>ST</label>
                <input type="radio" name="radio" value="Others"><label>Others</label></td>
            </tr>
            <tr>
                <td>Hobbies</td>
                <td>:</td>
                <td><input type="checkbox" name="hobbies" value="cricket"><lable>Cricket</lable>
                <input type="checkbox" name="hobbies" value="football"><lable>Football</lable>
                <input type="checkbox" name="hobbies" value="basketball"><lable>Basketball</lable></td>
            </tr>
            <tr>
                <td>State</td>
                <td>:</td>
                <td><select name="country">
                        <option value="-1">Select State</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Rajesthan">Rajesthan</option>
                        <option value="Madhya pradesh">Madhya pradesh</option>
                        <option value="maharashtra">maharashtra</option>
                        <option value="Delhi">Delhi</option>
                </select></td>
            </tr>
            <tr><td><input type="submit" name="submit" value="registration"></td></tr>
        </table>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $index=$_POST['index'];
        $first=$_POST['firstname'];
        $caste=$_POST['radio'];
        $hobbies=$_POST['hobbies'];
        $select=$_POST['country'];

        $sql="INSERT INTO tblregistration(Indexno, Firstname, Caste, Hobbies, Country) VALUES ($index, '$first','$caste', '$hobbies', '$select')";
        if(mysqli_query($conn, $sql)){
            echo " Record registrated sucessfullly";
        }
        else{
            echo " Error". mysqli_errno($conn);
        }
    }
    
    ?>
    <a href="40 registration.php">Show Record</a>
</DOCTYPE>