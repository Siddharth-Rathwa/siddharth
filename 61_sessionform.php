<?php 
    session_start()
?>
<html>
    <body>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
            username : <input type="text" name="username">
            pssword :  <input type="password" name="password">
            <input type="submit" name="login" value="login">
        </form>
<?php 
        if(isset($_POST["login"])){
            $username=$_POST['username'];
            $password=$_POST['password'];
            if($username=="siddharth"&&$password=="123"){
                $_SESSION['username']=$username;
                $_SESSION["password"]=$password;
               echo "<script>alert('login successfully')</script>";
            }
            else{
                echo "invalid username or password";
            }
        }
?>
    </body>
</html>