<?php
$conn=mysqli_connect("localhost", "root", "","dbbank");

?>
<!DOCTYPE html>
<head>
    <title>bank dispay</title>
</head>
<body>
    <form method="post" name="form">
        <table >
            <tr>
                <td>Index no</td>
                <td>:</td>
                <td><input type="text" name="index"></td>
            </tr>
            <tr>
                <td>customer name</td>
                <td>:</td>
                <td><input type="text" name="customer"></td>
            </tr>
            <tr>
                <td>Account number</td>
                <td>:</td>
                <td><input type="text" name="account"></td>
            </tr>
            <tr>
                <td>Type</td>
                <td>:</td>
                <td><input type="text" name="type"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>

    <?php 
    if(isset($_POST["submit"])){
        $index=$_POST['index'];
        $customer=$_POST['customer'];
        $account=$_POST['account'];
        $type=$_POST['type'];

        $sql="INSERT INTO tblcustomer(indexno, customername, account, typeaccount) VALUES($index, '$customer', $account, '$type')";
        if(mysqli_query($conn, $sql)){
            echo "record created successfully";
        }
        else{
            echo "Error ". mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    ?>

</body>