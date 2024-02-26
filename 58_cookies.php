<!-- A cookie is often used to identify user
syantax: 
    setcookie( name, value, expire , path , domain, secure, httponly); -->

<?php 
    $cookie_name="user";
    $cookie_value="siddharth";
    setcookie($cookie_name, $cookie_value, time()+ (86400*30), "/");
?>
<html>
    <body>
        <?php 
            if(! isset($_COOKIE[$cookie_name])){
                echo "cookie named". $cookie_name. "is not set";
            }
            else{
                echo "value is: ". $_COOKIE[$cookie_name];
            }
        
        ?>
    </body>
</html>
<!-- Deleate a Cookie -->
<?php 
    setcookie("user", "", time()-3600)
?>
<html>
    <body>
        <?php 
            echo "cookie 'user' is deleted";
        ?>
    </body>
</html>
<!-- check if cookies are enabled -->
<?php 
    setcookie("test_cookie", "test", time()+ 3600, "/");

?>
<html>
    <body>
        <?php 
        if(count($_COOKIE)>0){
            echo "cookies are enabled";
        }
        else{
            echo "cookies ate disabled";
        }
        ?>
    </body>
</html>