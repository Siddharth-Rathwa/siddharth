<?php
$conn = mysqli_connect("localhost", "root", "", "dbimage");
if ($conn->connect_error) {
    echo "Oops something went wrong";
} else {
    echo "connection successfully";
}
?>
<!DOCTYPE html>

<head>
    <title>Product</title>
</head>

<body>
    <form name="form" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Product Id</td>
                <td><input type="text" name="Productid" multiple></td>
            </tr>
            <tr>
                <td>Product Image</td>
                <td><input type="file" name="filetoupload"></td>
            </tr>
            <tr>
                <td>Product Image</td>
                <td><input type="file" name="angaltoupload"></td>
            </tr>
            <tr>
                <td>Product Image</td>
                <td><input type="file" name="sidetoupload"></td>
            </tr>
            <tr>
                <td>Product Name</td>
                <td><input type="text" name="Productname"></td>
            </tr>
            <tr>
                <td>Company Price</td>
                <td><input type="text" name="Companyprice"></td>
            </tr>
            <tr>
                <td>Offer price</td>
                <td><input type="text" name="Offerprice"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea rows="3" cols="20" name="Description"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="submit" name="submit"></td>
            </tr>
        </table>
    </form>
</body>
<?php
    if(isset($_POST['submit'])){
        $indexno=$_POST['Productid'];
        $Productname=$_POST['Productname'];
        $Comprice=$_POST['Companyprice'];
        $offprice=$_POST['Offerprice'];
        $des=$_POST['Description'];

        $filename=$_FILES["filetoupload"]["name"];
        $tmpname=$_FILES["filetoupload"]["tmp_name"];
        $folder="products/". $filename;
        move_uploaded_file($tmpname, $folder);
        echo "<pre>";

        $angalimage=$_FILES["angaltoupload"]["name"];
        $angaltmpname=$_FILES["angaltoupload"]["tmp_name"];
        $angalfloder="products/". $angalimage;
        move_uploaded_file($angaltmpname, $angalfloder);

        // image2
        $side_name=$_FILES["sidetoupload"]["name"];
        $sidetmp_name=$_FILES["sidetoupload"]["tmp_name"];
        $sidefolder="products/". $side_name;
        move_uploaded_file($sidetmp_name, $sidefolder);

        $sql="INSERT INTO tblitem(Indexno, Imageupload, Imageangal1, Imageangal2, Productname, Companyprice, Offerprice, Decproduct) VALUES ($indexno, '$folder','$angalfloder', '$sidefolder','$Productname', '$Comprice', '$offprice', '$des')";
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Record submit successfully')</script>";
        }
        else{
            echo "Error ". mysqli_errno($conn);
        }
        mysqli_close($conn);
        
    }
?>
<a href="49_iamge.php">Show Record</a>