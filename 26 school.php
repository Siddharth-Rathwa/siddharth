<?php
$conn=mysqli_connect("localhost", "root", "", "dbschool");
if($conn->connect_error){
    echo "Oops...something else wrong";
}
else{
    echo "connection successfully";
}
?>
<table width="30%">
    <tr>
        <th>INDEX NO</th>
        <th>GR.NO</th>
        <th>FIRST NAME</th>
        <th>FEES</th>
        <th>COMPLETED</th>
    </tr>
    <?php
    $result=mysqli_query($conn,"select * from tblstudent");
    while($row=$result->fetch_assoc()){
        echo "
        <tr>
            <td>$row[indexno]</td>
            <td>$row[grno]</td>
            <td>$row[firstname]</td>
            <td>$row[fees]</td>
            <td>$row[completed]</td>  
        </tr>
        ";
    }
    ?>
</table>
<a href="27 studentdisplay.php">insert record</a>

