<?php
$conn = mysqli_connect("localhost", "root", "", "dbregistration");
if ($conn->connect_error) {
    echo "Oops something went wrong";
} else {
    echo "conncection sucessfully";
}
?>
<DOCTYPE html>

    <body>
        <table width="70%" border="1">
            <tr>
                <th>Index.no</th>
                <th>First name</th>
                <th>Caste</th>
                <th>Hobbies</th>
                <th>State</th>
                <th colspan="2">Update</th>
            </tr>

            <?php
            $result = mysqli_query($conn, "select * from tblregistration");
            while ($row = $result->fetch_assoc()) {
                echo "
                    <tr>
                        <td>$row[Indexno]</td>
                        <td>$row[Firstname]</td>
                        <td>$row[Caste]</td>
                        <td>$row[Hobbies]</td>
                        <td>$row[Country]</td>
                        <td><a href='40 registration.php? eid=$row[Indexno]'>Edit</a></td>
                        <td><a href='40 registration.php? did=$row[Indexno]'>Delete</a></td>
                    </tr>
                ";
            }
            ?>
        </table>
        <a href="39 registration.php">Insert Record</a>
        <?php
        // creat the delete query

        if(isset($_GET["did"])){
            $did=$_GET['did'];

            $sql="DELETE FROM tblregistration where Indexno=$did";
            if(mysqli_query($conn, $sql)){
                echo "Delete sucessfully";
            }
            else{
                echo "Error". mysqli_error($conn);
            }
        }
        if(isset($_GET['eid'])){
            $eid=$_GET['eid'];
            $result = mysqli_query($conn, "select * from tblregistration where Indexno=$eid");
            while($row=$result->fetch_assoc()){
        ?>
                <form name='form' method='post'>
                <table>
                    <tr>
                        <td>Index.no</td>
                        <td>:</td>
                        <td><input type='text' name='index' value="<?php echo $row['Indexno'];?>"></td>
                    </tr>
                    <tr>
                        <td>First name</td>
                        <td>:</td>
                        <td><input type='text' name='firstname' value="<?php echo $row['Firstname']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Caste</td>
                        <td>:</td>
                        <td><label><input type='radio' name='radio' value='OBC' <?php if($row['Caste']=="OBC"){ echo "checked";} ?> >
                        OBC</label>
                        <input type='radio' name='radio' value='Sc' <?php if($row['Caste']=="Sc"){ echo "checked";} ?>><label>SC</label>
                        <input type='radio' name='radio' value='St' <?php if($row['Caste']=="St"){ echo "checked";} ?>><label>ST</label>
                        <input type='radio' name='radio' value='Others' <?php if($row['Caste']=="Others"){ echo "checked";} ?>><label>Others</label></td>
                    </tr>
                    <tr>
                        <td>Hobbies</td>
                        <td>:</td>
                        <td><input type='checkbox' name='hobbies' value='cricket' <?php if($row['Hobbies']=='cricket'){echo "checked";}?> ><lable>Cricket</lable>
                        <input type='checkbox' name='hobbies' value='football' <?php if($row['Hobbies']=='football'){echo "checked";}?>><lable>Football</lable>
                        <input type='checkbox' name='hobbies' value='basketball' <?php if($row['Hobbies']=='basketball'){echo "checked";}?>><lable>Basketball</lable></td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td>:</td>
                        <td><select name='country'>
                                <option value='-1' <?php if($row['Country']=='-1'){echo "selected";}?>>Select State</option>
                                <option value='Gujarat' <?php if($row['Country']=='Gujarat'){echo "selected";}?>>Gujarat</option>
                                <option value='Rajesthan' <?php if($row['Country']=='Rajesthan'){echo "selected";}?>>Rajesthan</option>
                                <option value='goa' <?php if($row['Country']=='goa'){echo "selected";}?>>goa</option>
                                <option value='maharashtra' <?php if($row['Country']=='maharashtra'){echo "selected";}?>>maharashtra</option>
                                <option value='Delhi' <?php if($row['Country']=='Delhi'){echo "selected";}?>>Delhi</option>
                        </select></td>
                    </tr>
                    <tr><td><input type='submit' name='submit' value='registration'></td></tr>
                </table>
            </form>
            
            <?php 
            }
        }

        if(isset($_POST['submit'])){
            $Index=$_POST["index"];
            $firstname=$_POST["firstname"];
            $caste=$_POST["radio"];
            $hobbies=$_POST["hobbies"];
            $state=$_POST["country"];

            $sql="UPDATE tblregistration SET Indexno=$Index, Firstname='$firstname', Caste='$caste', Hobbies='$hobbies', Country='$state' WHERE Indexno=$eid";
            if(mysqli_query($conn, $sql)){
                echo "Recorded edit sucessfully";
                
            }
            else{
                echo "Error". mysqli_error($conn);
            }
            mysqli_close($conn);

        }
        ?>
    </body>
</DOCTYPE>