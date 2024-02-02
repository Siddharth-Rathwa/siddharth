<?php
$conn = mysqli_connect("localhost", "root", "", "dbbank"); //database connection...
if ($conn->connect_error) {
    echo "Oops...something went wrong";
} else {
    echo "connection successfully";
}
?>
<table width="30%">
    <tr>
        <th>INDEXNO</th>
        <th>CUSTOMER NAME</th>
        <th>ACCOUNT</th>
        <th>TYPE</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "select * from tblcustomer"); //query connection...
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
        <td>$row[indexno]</td>
        <td>$row[customername]</td>
        <td>$row[account]</td>
        <td>$row[typeaccount]</td>
        <td><a href='30 bank.php? eid=$row[indexno]'>Edit</a></td>
        <td><a href='30 bank.php? did=$row[indexno]'>Delete</a></td>
        </tr>
        ";
    }


    ?>
</table>
<a href="31 bankdisplay.php">insert record</a>

<?php

// set the delete code
if (isset($_GET['did'])) {
    $did = $_GET['did'];
    $sql = "DELETE FROM tblcustomer WHERE indexno=$did";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted sucessfully";
        header("location:30 bank.php");
    } else {
        echo "Error deleting record " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

// set the edit code
if (isset($_GET["eid"])) {
    $eid = $_GET['eid'];
    $result = mysqli_query($conn, "select * from tblcustomer where indexno=$eid");
    // get the form as fillup value 
    while ($row = $result->fetch_assoc()) {
        echo "
        <form method='post' name='form'> 
        <table>
        <tr>
            <td>Index no</td>
            <td>:</td>
            <td><input type='text' name='index' value='$row[indexno]' readonly></td>
        </tr>
        <tr>
            <td>customer name</td>
            <td>:</td>
            <td><input type='text' name='customer'  value='$row[customername]'></td>
        </tr>
        <tr>
            <td>Account number</td>
            <td>:</td>
            <td><input type='text' name='account'  value='$row[account]'></td>
        </tr>
        <tr>
            <td>Type</td>
            <td>:</td>
            <td><input type='text' name='type'  value='$row[typeaccount]'></td>
        </tr>
        <tr>
            <td><input type='submit' name='update' value='Update'></td>
        </tr>
         </table>
        </form>
        
        ";
    }
}

// set the event of edit 
if(isset($_POST["update"])){
    $index=$_POST['index'];
    $customer=$_POST['customer'];
    $account=$_POST['account'];
    $type=$_POST['type'];

    $sql="UPDATE tblcustomer SET customername='$customer', account=$account, typeaccount='$type' WHERE indexno=$eid";

    if(mysqli_query($conn, $sql)){
        echo "Edit Record successfully";
        header("location:30 bank.php");
    }
    else{
        echo "Error ". mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>