<?php

include '../partial/_config.php';

$showError = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from admin_tbl where `username` = '$username' and `password` = '$password'";
    $result = $conn->query($sql);
    if ($result) {

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                session_start();
                $_SESSION['a_loggedin'] = true;
                $_SESSION['a_username'] = $row['username'];
                
                header("location:index.php");
            }
        } else {
            $showError = "Invalid credential";
            echo "" . $conn->error;
        }
    } else {
        $showError = "Something went to wrong";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div id="login-form-wrap">
        <div>
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
        </div>
        <h2>Login</h2>
        <form id="login-form" method="POST" action="login.php">
            <p>
                <input type="text" id="username" name="username" placeholder="Usename" required>
            </p>
            <p>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </p>
            <p>
                <input type="submit" name="login" id="login" value="Login">
            </p>
        </form>
        <div id="create-account-wrap">
            <!--p>Forget Password ? <a href="forget_password.php">click</a-->

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>