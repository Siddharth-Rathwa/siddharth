<?php
$conn = mysqli_connect("localhost", "root", "", "dblcom");
if ($conn->connect_error) {
    echo "Oops...something went wrong";
} else {
    echo "connection sucessfully";
}
?>
<table>
    <tr>
        <td>number</td>
        <td>name</td>
        <td>psino</td>
        <td>department</td>
    </tr>
    <?php
    $result = mysqli_query($conn, "select * from tblcompany");
       while($row=$result->fetch_assoc()){
         echo "
         <tr>
            <td>$row[number]</td>
            <td>$row[name]</td>
            <td>$row[psino]</td>
            <td>$row[department]</td>
         </tr>
         ";
       }
    ?>
</table>