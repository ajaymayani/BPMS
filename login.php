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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/fontawesome.css">
    <style>
        .align-center {
            text-align: center;
        }

        .main {
            background-image: url(/clg/assignment/bpms/images/invtauthors.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .card {
            background-color: #f7f7f7;
            padding: 30px;
            width: 80%;
            margin: auto;
        }

        .box {
            background-color: #ffffff;
            margin: 10px;
            padding: 20px;
        }

        .mbr-text {
            font-style: normal;
            line-height: 1.6;
            font-style: bold;
        }

        .white {
            color: white;
            text-align: left;
        }

        #footer {
            background-color: #2e2e2e;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <?php include 'partial/_nav.php'; ?>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4">
                    <h4 class="white text-center">SIGN IN TO UNIVERSITIES PRESS</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card mb-5">
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
                        <div class="mx-auto">
                            <img src="images/img-profile.jpg" class="img-fluid mx-auto" width="100px" alt="img-profile">
                        </div>
                        <div class="box">
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email Id" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="passwrod">
                                    <span style="margin-top:10px;display: block; text-align: right;"> <a href="forget.php">Forget</a></span>
                                </div>
                                <div class="form-group align-center">
                                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Log in">
                                </div>
                                <div class="align-center">
                                    <a href="register.php" class="">Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'partial/_footer.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>