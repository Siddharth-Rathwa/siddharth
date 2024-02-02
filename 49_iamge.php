<?php
$conn = mysqli_connect("localhost", "root", "", "dbimage");
if ($conn->connect_error) {
    echo "Oops something went wrong";
} else {
    echo "connection successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Display</title>
</head>
<body>
    <table width="80%" border="1" cellspacing="10" cellpadding="5" bgcolor="whitesmoke"> 
        <tr bgcolor="#ffad33">
            <th>Product Id</th>
            <th colspan="3">prouduct Image</th>
            <th>Product Name</th>
            <th>Company price</th>
            <th>Offer Price</th>
            <th>Description</th>
        </tr>
        <?php 
            $result=mysqli_query($conn, "select * from tblitem");
            while($row=$result->fetch_assoc()){
                echo"
                <tr>
                    <td>$row[Indexno]</td>
                    <td><img src='$row[Imageupload]' height 150px width=150px></td>
                    <td><img src='$row[Imageangal1]' height 150px width=150px></td>
                    <td><img src='$row[Imageangal2]' height 150px width=150px></td>
                    <td>$row[Productname]</td>
                    <td>$row[Companyprice]</td>
                    <td>$row[Offerprice]</td>
                    <td>$row[Decproduct]</td>
                </tr>
            ";}
        ?>
    </table>
    <a href="48_image.php">Insert Record</a>
</body>
</html>