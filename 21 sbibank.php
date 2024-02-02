<?php
$conn = new mysqli("localhost", "root", "", "dblsbibank");
if ($conn->connect_error) {
    echo "<h1> Oops...connection error</h1";
} else {
    echo "<h1>connection successfully</h1>";
}
?>
<table width="30%">
    <tr>
    <td>custormer id</td>
    <td>Name</td>
    <td>Account no</td>
    <td>Type</td>
    <td>Balance</td>
</tr>
    <?php
    $result = $conn->query("select * from tblcustomer");
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
        <td>$row[customerid]</td>
        <td>$row[Name]</td>
        <td>$row[Accountno]</td>
        <td>$row[Type]</td>
        <td>$row[Balance]</td>
        </tr>
        ";
    }
    ?>
</table>