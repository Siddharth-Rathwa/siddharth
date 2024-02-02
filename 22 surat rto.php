<?php
$conn = new mysqli("localhost", "root", "", "dbrtosurat");
if ($conn->connect_error) {
    echo "<b><center>Oops...something else!</center></b>";
} else {
    echo "<b><center>connection successfully</center></b>";
}
?>
<table width="35%" cellpadding="10px">
    <tr>
        <th>index</th>
        <th>Name</th>
        <th>license no</th>
        <th>valid thru</th>
        <th>valid expiry</th>
    </tr>
    <?php
    $result = $conn->query("select * from tbllicence");
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
        <td>$row[index]</td>
        <td>$row[Name]</td>
        <td>$row[licenceno]</td>
        <td>$row[validthru]</td>
        <td>$row[validexpiry]</td>
        </tr>
        ";
    }
    ?>
</table>