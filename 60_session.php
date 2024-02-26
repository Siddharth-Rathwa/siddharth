<?php 
    session_start()?>
<html>
    <body>
        
        <?php 
            echo "Favourite car is ". $_SESSION["favcar"]."<br>";
            echo "Favourite color is ". $_SESSION["color"]. "<br>";
        ?>
    </body>
</html>
<?php 
        print_r($_SESSION)
?>
<?php
    // session_unset();
    // session_destroy();
?>
