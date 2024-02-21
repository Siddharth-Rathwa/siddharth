<?php
    // error_reporting(0);
    $conn=mysqli_connect("localhost", "root","", "dbstudentrecord");
    if(!$conn){
        die ("connection failed". mysqli_connect_error());
    }
    echo "connection successfully";

?>
    <table width="50%">
        <tr bgcolor="whitesmoke">
            <td>Student Id</td>
            <td>Student Image</td>
            <td>Student Name</td>
            <td>Gr Number</td>
            <td>Standard</td>
        </tr>
        <!-- set the query -->
        <?php
        $result=mysqli_query($conn, "select * from tblrecord1");
        while($row=$result->fetch_assoc()){
            $Studentid=$row['Studentid'];
            $Studentimage=$row['Studentimg'];
            $Studentname=$row['Studentname'];
            $Grno=$row['Grnumber'];
            $standard=$row['standerd'];
            ?>
            <!-- display the value -->
            <tr>
                <td><?php echo $Studentid ?></td>               
                <td> <img src="<?php echo $Studentimage?>" height="100px" width="100px"></td>                                
                <td><?php echo $Studentname ?></td>                        
                <td><?php echo $Grno ?></td>
                <td><?php echo $standard?></td>
            </tr>
            <?php
        }
    ?>
    </table>
<!-- <?php
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
    ?> -->
    <a href="56_studentrecord.php">insert the record</a>
   