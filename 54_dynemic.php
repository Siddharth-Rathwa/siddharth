<?php 
    // error_reporting(0);
    $conn=mysqli_connect("localhost", "root", "", "dbdynemic");
    if($conn){
        echo "conncection successfully";
    }
    else{
        echo "connection Failed". mysqli_connect_error();
    }
?>
<html>
    <body>
        <form action="#" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>product id</td>
                    <td><input type="text" name="Productid"></td>
                </tr>
                <tr>
                    <td>Image 1</td>
                    <td><input type="file" name="Fronttoupload"></td>
                </tr>
                <tr>
                    <td>Image 2</td>
                    <td><input type="file" name="Sidetoupload"></td>
                </tr>
                <tr>
                    <td>Image 3</td>
                    <td><input type="file" name="Behindtoupload"></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="Title"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php 
    if(isset($_POST['submit'])){
        $Productid=$_POST["Productid"];
        $Title=$_POST["Title"];
        // iamge 1
        $Frontname=$_FILES["Fronttoupload"]["name"];
        $tmpfront=$_FILES["Fronttoupload"]["tmp_name"];
        $Front="dynemic/". $Frontname;
        move_uploaded_file($tmpfront, $Front);
        // iamge 2
        $sidename=$_FILES["Sidetoupload"]["name"];
        $sidetmp=$_FILES["Sidetoupload"]["tmp_name"];
        $side="dynemic/". $sidename;
        move_uploaded_file($sidetmp, $side);
        // image 3
        $Behindname=$_FILES["Behindtoupload"]["name"];
        $Behindtmp=$_FILES["Behindtoupload"]["tmp_name"];
        $Behind="dynemic/". $Behindname;
        move_uploaded_file($Behindtmp, $Behind);

        $sql="INSERT INTO tbdynemic(Productid, Frontimg, Sideimg, Behindimg, Titleimg) VALUES($Productid, '$Front', '$side', '$Behind', '$Title')";
        if(mysqli_query($conn, $sql)){
            echo "Record submit successfully";
        }
        else{
            echo "<pre>";
            echo "Error". mysqli_errno($conn);
        }
    }

?>