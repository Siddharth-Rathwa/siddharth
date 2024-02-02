<?php
    // error_reporting(0);
    $conn=mysqli_connect("localhost", "root","", "dbstudentrecord");
    if(!$conn){
        die ("connection failed". mysqli_connect_error());
    }
    echo "connection successfully";

?>
<?php
    // set the query
    $query=$conn->query("select * from tblrecord");
    if($query->num_rows>0){
        while($row=$query->fetch_assoc()){
            $Studentid=$row['Studentid'];
            $Studentimage=$row['Studentimg'];
            $Studentname=$row['Studentname'];
            $Grno=$row['Grnumber'];
            $standard=$row['standerd'];
            ?>
            <table width="50%" bgcolor="whitesmoke">
                <tr>
                <td>Student Id</td>
                <td>Student Image</td>
                <td>Student Name</td>
                <td>Gr No</td>
                <td>Standard</td>
                </tr>
                <tr>
                    <td><?php echo $Studentid ?></td>               
                    <td> <img src="<?php echo $Studentimage?>" height="100px" width="100px"></td>                                
                    <td><?php echo $Studentname ?></td>                        
                    <td><?php echo $Grno ?></td>
                    <td><?php echo $standard?></td>
                </tr>
            
            </table>
            <?php 
        }
    }
    ?>