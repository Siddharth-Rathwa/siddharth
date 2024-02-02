<?php 
    // error_reporting(0);
    $conn=mysqli_connect("localhost", "root", "", "dbdynemic");
    if($conn){
        echo "conncection successfully";
    }
    else{
        echo "connection Failed". mysqli_connect_error();
    }
?>
<!-- click slider css library files -->
<link rel="stylesheet" href="slick/slick.css">
<link rel="stylesheet" href="slick/slick-theme.css">
<!-- custom stylesheet files -->
<link rel="stylesheet" href="55_dynemic.css">
<!-- slick slider js library files -->
<link rel="stylesheet" href="slick/slick.min.js">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- initialize slick slider -->
<script>
    $(document).ready(function(){
        $('.product-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            arrows: true
        });
    })
</script>
<div class="product-slider">
    <?php
        $query=$conn->query("select * from tbdynemic");
        if($query->num_rows>0){
            while($row=$query->fetch_assoc()){
                $imageURL= $row['Frontimg'];
                $imageURL1= $row['Sideimg'];
                $imageURL2=$row['Behindimg'];
                $productid=$row['Productid'];
                $title=$row['Titleimg'];
                ?>
                <!-- <?php echo"$productid"?> -->
                <img src="<?php echo $imageURL; ?>" alt="" height="150px" width="200px">
                <img src="<?php echo $imageURL1; ?>" alt="" height="150px" width="200px">
                <img src="<?php echo $imageURL2; ?>" alt="" height="150px" width="200px">
                <!-- <?php echo" $title"?> -->
                <?php
            }
        }
    ?>
</div>