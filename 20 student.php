<?php
$conn = new mysqli("localhost", "root", "", "dbsiddharth");
if ($conn->connect_error) {
    echo "Oops...connection error";
} else {
    echo "<h1>connectin successfully</h1>";
}
?>
<table width="30%">
    <tr>
        <th>Roll number</th>
        <th>Name</th>
        <th>Fees</th>
        <th>Result</th>
    </tr>
    <?php
    $result = $conn->query("select * from tblstudent");

    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
        <td>$row[Rollnumber]</td>
        <td>$row[Name]</td>
        <td>$row[Fees]</td>
        <td>$row[Result]</td>
        </tr>
        ";
    }
    ?>
</table>