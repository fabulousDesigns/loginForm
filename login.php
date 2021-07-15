<?php
error_reporting(0);
session_start();
include_once('admin/connection.php');
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$err = "";
$sql = "SELECT * FROM tbusers WHERE username = '$username' AND password ='$password'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['user_id'];
    header("location:home.php");
} else {
    $err = "Wrong Username or Password";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>User log-In</title>
</head>

<body>
    <div id="box">
        <div class="red-text">
            <p class="txt"><?php echo $err ?></p>
        </div>
        <form method="post">
            <!--  <img src="img/logo.jpg" class="logo" alt=""> -->
            <h4>user-login</h4>
            <div class="social-icons">
                <img src="fb.png" alt="facebook">
                <img src="ig.png" alt="instagram">
                <img src="tw.png" alt="twitter">
            </div>
            <div class="input-group">
                <input type="text" name="username" placeholder="username" required>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="login-btn">LOGIN</button>
            <a href="#" class="link">forgot-password</a>
        </form>
    </div>
</body>

</html>