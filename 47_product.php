<?php
$conn = mysqli_connect("localhost", "root", "", "dbproduct");
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
                <td><input type="text" name="Productid"></td>
            </tr>
            <tr>
                <td>Product Image</td>
                <td><input type="file" name="filetoupload[]" multiple></td>
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
if (isset($_POST['submit'])) {

    // image1
    foreach ($_FILES['filetoupload']['name'] as $key => $value) {


        $random = rand('11111', '99999');
        $file = $random . '_' . $value;
        move_uploaded_file($_FILES["filetoupload"]["tmp_name"][$key], "products/" . $file);
        echo "<pre>";
        // print_r($_FILES);
        $Productid = $_POST['Productid'];
        $Productname = $_POST['Productname'];
        $Companyprice = $_POST['Companyprice'];
        $Offerprice = $_POST['Offerprice'];
        $Description = $_POST['Description'];
        $sql = "INSERT INTO tblitems(Productid, Productimg, Productname, Companyprice, Offerprice) VALUES($Productid, '$file', '$Productname', $Companyprice, $Offerprice)";

        if (mysqli_query($conn, $sql)) {
            echo "Record submit successfully";
        } else {
            echo "Error " . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}

?>