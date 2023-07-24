<?php 
    function SignIn() {
        session_start();
        if(isset($_POST['submit'])) {
            if(!empty($_POST['username']) && !empty($_POST['user_password'])) {
                $username = $_POST['username'];
                $password = $_POST['user_password'];

                if($username == $_SESSION['username'] && password_verify($password, $_SESSION['password'])) {
                    header('Location: profile.php');
                }

                else {
                    return "<p style='font-size: 30px; color: red;'>Account Doesn't Exist</p>";
                }
            }
            else {
                return "<p style='font-size: 30px; color: red;'>Please Type Your Name and password</p>";
            }
        }
    }

    $message = SignIn()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="login">
        <h1>Sign In to Your Account</h1>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <input type="text" name="username" placeholder="Your Name">
            <input type="password" name="user_password" placeholder="Your Password">
            <button name="submit">Submit</button>
            <?php echo $message ?>
            <p>Don't have an Account? <a href="signup.php">SignUp</a></p>
        </form>
    </section>
</body>
</html>