<!-- When you work with an application, you open it, do some changes, and then you close it. This is much like a Session. -->
<?php 
    session_start()
?>
<html>
    <body>
        <?php 
            $_SESSION ["favcar"]="rolls royce";
            $_SESSION ["color"]="black";
            echo "session is set"
        
        ?>
    </body>
</html>