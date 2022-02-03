<?php

include 'partial/_config.php';

$showError = false;

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    $emailid = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from users_tbl where emailid = '$emailid'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while ($rows = $result->fetch_assoc()) {
            if (password_verify($password, $rows['password'])) {
                session_start();
                $_SESSION['userid'] = $rows['userid'];
                $_SESSION['name'] = $rows['name'];
                $_SESSION['loggedin'] = true;
                header("location:index.php");
            } else {
                $showError = "Invalid password";
            }
        }
    } else {
        $showError = "Email does not exists";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include 'partial/_link.php'; ?>
    <title>Login</title>
</head>

<body>
    <?php include 'partial/_nav.php'; ?>

    <section>
        <div class="img-box">
            <img src="images/bg-01.jpg" alt="">
        </div>
        <div class="content-box">
            <div class="form-box">
                <h2>Login</h2>
                <?php
                if ($showError) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error !</strong> ' . $showError . '
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>';
                }
                ?>
                <form action="login.php" method="post">
                    <div class="input-box">
                        <span>Email</span>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="input-box">
                        <span>Password</span>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="remember">
                        <label for=""><input type="checkbox" name="" id="">Remember me</label>
                    </div>
                    <div class="input-box">
                        <input type="submit" id="submit" name="submit" value="Sign in">
                    </div>
                    <div class="input-box">
                        <p>Don't have an account? <a href="register.php">Sign up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include 'partial/_script.php'; ?>
</body>

</html>