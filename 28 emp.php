<?php
$conn=mysqli_connect("localhost", "root", "", "dbemp");
if($conn->connect_error){
    echo "Oops...something else wrong";
}
else{
    echo "connection sucessfully";
}
?>
<table width="30%">
    <tr>
        <th>INDEXNO</th>
        <th>FIRST NAME</th>
        <th>POST</th>
        <th>PH.NO</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    $result=mysqli_query($conn,"select * from tblemployee");
    while($row=$result->fetch_assoc()){
        echo "
        <tr>
            <td>$row[indexno]</td>
            <td>$row[firstname]</td>
            <td>$row[Post]</td>
            <td>$row[phno]</td>
            <td><a href='28 emp.php?eid=$row[indexno]'>Edit</a></td>
            <td><a href='28 emp.php?did=$row[indexno]'>Delete</a></td>
        </tr>
        ";
    }
    ?>
</table>
<a href="29 empinsert.php">insert record </a>

<?php
    if(isset($_GET["did"])){
        $did=$_GET['did'];
        $sql="DELETE FROM tblemployee WHERE indexno=$did";

        if(mysqli_query($conn, $sql)){
            echo "Record deleted sucessfully";
            header("location:28 emp.php");
        }
        else{
            echo "Error deleting record: ". mysqli_error($conn);
        }
    }

?>