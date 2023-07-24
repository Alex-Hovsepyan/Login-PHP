<?php
    function SignUp() {
        if(isset($_POST['submit'])) {
            if(!empty($_POST['username']) && !empty($_POST['user_email']) && !empty($_POST['user_password']) && !empty($_FILES['profile_img'])) {
                if(filter_input(INPUT_POST, 'user_email', FILTER_VALIDATE_EMAIL)) {
                    $username = $_POST['username'];
                    $email = $_POST['user_email'];
                    $password = password_hash($_POST['user_password'], PASSWORD_ARGON2I);
                    session_start();
                    $_SESSION["username"] = $username;
                    $_SESSION["email"] = $email;
                    $_SESSION["password"] = $password;
                    $file = $_FILES['profile_img'];
                    $file_name = $file['name'];
                    $file_tmp = $file['tmp_name'];
                    $_SESSION['profile_img'] = "images/$file_name";
                    move_uploaded_file($file_tmp, "./images/$file_name");
                    header("Location: signin.php");
                }

                else {
                    return "<p style='font-size: 30px; color: red;'>Write the correct Email</p>";
                }
            }
            else {
                return "<p style='font-size: 30px; color: red;'>Please Type Your Name and email and password</p>";
            }
        }
    }

    $message = SignUp()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="registration">
        <h1>Sign In to Your Account</h1>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="username" placeholder="Your Name">
            <input type="email" name="user_email" placeholder="Your Email">
            <input type="password" name="user_password" placeholder="Your Password">
            <input type="file" name="profile_img">
            <button name="submit">Submit</button>
            <?php echo $message ?>
            <p>Already have an Account? <a href="signin.php">Sign In</a></p>
        </form>
    </section>
</body>
</html>