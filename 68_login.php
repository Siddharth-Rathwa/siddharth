<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "studentrecord");
if (!$conn) {
    echo "login failed";
} else {
    echo "<script>alert('connection successfully')</script>";
}
?>
<html>

<head>
    <style>
        body {
            background-color: chartreuse;
        }

        .container {
            background-color: whitesmoke;
            margin: 20px auto;
            max-width: 550px;
            margin-top: 200px;
            align-items: center;
            box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.5);
            border: 1px solid black;
            padding: 30px;
        }

        p {
            text-align: center;
            font-weight: 1000;
            color: chartreuse;
            font-size: x-large;
        }

        input {
            width: 100%;
            padding: 7px 10px;
            margin: 5px 1px;
            outline: none;
            border: 1px solid chartreuse;
        }

        input[type="submit"] {
            background-color: chartreuse;
            padding: 10px 12px;
            display: flex;
            border-radius: 2px;
            color: white;

        }

        input[type="submit"]:hover {
            background-color: greenyellow;
            display: flex;
        }
        a{
            text-decoration: none;
        }
        a input[type="submit"]{
            width: 20%;
            float: right;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <P>LOG IN BY USER</P>
            <label for="user">Enter a user Name</label>
            <input type="text" name="user">
            <label for="password">Enter a password</label>
            <input type="password" name="password">
            <input type="submit" name="submit" value="Login">
            <a href="66_studentfrom.php">if you have don't account please click the link ?</a>
        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['password'];
        // crea the query
        $query = "SELECT * FROM studentdata WHERE Studentuser='$username' && Studentpass='$password' ";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        if ($total == 1) {
            header("location:67_studentdisplay.php");
            $_SESSION['user_name'] = $username;
        } else {
            echo "log in failed";
        }
    }
    ?>
</body>

</html>