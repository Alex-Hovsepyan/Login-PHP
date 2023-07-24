<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="profile">
        <?php
            session_start();
            echo "<h1>Hello {$_SESSION['username']}</h1></br>";
            if(isset($_POST['submit'])) {
                session_unset();
                header('LOCATION: signin.php');
            }
            ?>
        <img width="200px" src="<?php echo $_SESSION['profile_img']; ?>" alt="">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <button name="submit">Log Out</button>
        </form>
    </section>
</body>
</html>