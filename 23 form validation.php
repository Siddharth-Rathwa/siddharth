<!DOCTYPE html>

<head>
    <title>form validation</title>
</head>

<body>
    <form method="post" name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Name : <input type="text" name="fname"><br><br>
        Email : <input type="email" name="email"><br><br>
        comment :<textarea name="comment" rows="5" cols="40"></textarea><br><br>
        Gender : <input type="radio" name="gender" value="male">male
        <input type="radio" name="gender" value="female">female
        <input type="radio" name="gender" value="other">other<br><br>
        <input type="submit" value="submit">
    </form>
</body>
<?php
// define variables and set to empty values
$name = $email = $comment = $gender = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = test_input($_POST["fname"]);
    $email = test_input($_POST["email"]);
    $comment = test_input($_POST["comment"]);
    $gender = test_input($_POST["gender"]);
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>