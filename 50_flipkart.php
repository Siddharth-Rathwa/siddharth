<?php 
    $conn=mysqli_connect("localhost", "root", "", "dbflipkart");
    if(!$conn){
        die ("Oops something went wrong". mysqli_connect_errno());
    }
    else{
        echo "Database connect successfully";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product form</title>
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
                <td><input type="file" name="Fronttoupload"></td>
            </tr>
            <tr>
                <td>Product Image</td>
                <td><input type="file" name="Sidetoupload"></td>
            </tr>
            <tr>
                <td>Product Image</td>
                <td><input type="file" name="Behindtoupload"></td>
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
</html>
<?php
    if(isset($_POST["submit"])){
        // define the varible
        $productid=$_POST['Productid'];
        $Productname=$_POST['Productname'];
        $comprrice=$_POST['Companyprice'];
        $offprice=$_POST['Offerprice'];
        $desproduct=$_POST['Description'];
        // iamge 1
        $forntimage=$_FILES["Fronttoupload"]["name"];
        $tmpfront=$_FILES["Fronttoupload"]["tmp_name"];
        $front="Flipkart/". $forntimage;
        move_uploaded_file($tmpfront, $front);
        // image 2
        $sideimage=$_FILES["Sidetoupload"]["name"];
        $sidetmp=$_FILES["Sidetoupload"]["tmp_name"];
        $side="Flipkart/". $sideimage;
        move_uploaded_file($sidetmp,$side);
        // iamge 3
        $behindname=$_FILES["Behindtoupload"]["name"];
        $behindtmp=$_FILES["Behindtoupload"]["tmp_name"];
        $behind="Flipkart/". $behindname;
        move_uploaded_file($behindtmp, $behind);
        // creat the query
        $sql="INSERT INTO tblflipkart(Indexno, Frontimage, Sideimage, Behindimage, Productname, Comprice, Offprice, Decproduct) VALUES($productid, '$front', '$side', '$behind', '$Productname', $comprrice, $offprice, '$desproduct')";
        // Run the query
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Record submit successfully')</script>";
            header("location:51_flipkart.php");
        }
        else{
            echo "Error ". mysqli_error($conn);
        }
        mysqli_close($conn);

    }
?>