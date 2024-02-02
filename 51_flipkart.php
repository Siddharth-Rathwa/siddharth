<?php 
    $conn= mysqli_connect("localhost", "root", "", "dbflipkart");
    if(!$conn){
        die ("Oops something went wrong". mysqli_connect_error());
    }
    else{
        echo "Database connect successfully";
    }
?>
<!DOCTYPE html>
<head>
    <title>Display</title>
</head>
<body>
    <table width="50%"  cellspacing="5" cellpadding="5" bgcolor="whitesmoke"> 

        <?php 
            $result=mysqli_query($conn, "select * from tblflipkart");
            while($row=$result->fetch_assoc()){
                echo "
                    <tr>
                    <th bgcolor='grey'>Product Id</th>
                    <td>$row[Indexno]</td>
                    </tr>
                    <tr>
                    <th bgcolor='grey'>Product Image</th>
                    <td><img src='$row[Frontimage]' height='200px' width='150px'>
                    <img src='$row[Sideimage]' height='200px' width='150px'>
                    <img src='$row[Behindimage]' height='200px' width='150px'></td>
                    </tr>
                    <tr>
                    <th bgcolor='grey'>Product Name</th>
                    <td>$row[Productname]</td>
                    </tr>
                    <tr>
                    <th bgcolor='grey'>Company price</th>
                    <td>$row[Comprice]</td>
                    </tr>
                    <tr>
                    <th bgcolor='grey'>Offer Price</th>
                    <td>$row[Offprice]</td>
                    </tr>
                    <tr>
                    <th bgcolor='grey'>Description</th>
                    <td>$row[Decproduct]</td>
                    </tr>
                ";
            }
        ?>
    </table>
    <a href="50_flipkart.php">Insert Record</a>
</body>
</html>