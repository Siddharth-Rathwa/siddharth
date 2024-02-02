<!DOCTYPE html>

<head>
    <title>
        form validation
    </title>
</head>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Name : <input type="text" name="fname"><br><br>
        Email : <input type="email" name="email"><br><br>
        comment : <textarea name="comment" cols="40" rows="5"></textarea><br><br>
        Gender : <input type="radio" name="gender" value="male">male
        <input type="radio" name="gender" value="male">female
        <input type="radio" name="gender" value="male">other<br><br>
        <input type="submit" value="submit">
    </form>
</body>
<?php
// variables define and set the value
$name = $email = $comment = $gender = "";
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $name=test_input($_POST["fname"]);
    $email=test_input($_POST["email"]);
    $comment=test_input($_POST["comment"]);
    $gender=test_input($_POST["gender"]);
}
function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
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