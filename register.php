<?php

include 'partial/_config.php';
$exists = false;

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    $name = $_POST['name'];
    $mobilenumber = $_POST['phonenumber'];
    $emailid = $_POST['email'];
    $password = $_POST['password'];

    $selectSql = "SELECT * FROM `users_tbl` WHERE `emailid` = '$emailid'";
    $selectResult = $conn->query($selectSql);
    if ($selectResult->num_rows > 0) {
        $exists = true;
    } else {
        $exists = false;
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users_tbl` (`name`, `mobilenumber`, `emailid`, `password`, `dt`) VALUES ( '$name', '$mobilenumber', '$emailid', '$hash', current_timestamp())";

        $result = $conn->query($sql);
        if ($result) {
            //header("location:login.php");
        } else {
            echo '<script>alert(' . $conn->error . ')</script>';
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include 'partial/_link.php';?>

    <title>Register</title>
</head>

<body>
    <?php include 'partial/_nav.php';?>

    <!-- <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4">
                    <h4 class="white text-center">SIGN UP TO UNIVERSITIES PRESS</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-5">
                        <?php if ($exists) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error !</strong>Email id already exists.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
                        } ?>
                        <div class="box">
                            <form action="register.php" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email Id" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="passwrod">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phonenumber" id="phonenumber">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Create account">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <section>
        <div class="img-box">
            <img src="images/bg-01.jpg" alt="">
        </div>
        <div class="content-box">
            <div class="form-box">
                <h2>Register</h2>
                <?php if ($exists) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error !</strong>Email id already exists.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
                        } ?>
                <form action="register.php" method="post">
                    <div class="input-box">
                        <span>Name</span>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="input-box">
                        <span>Mobile No.</span>
                        <input type="text" name="phonenumber" id="phonenumber">
                    </div>
                    <div class="input-box">
                        <span>Email</span>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="input-box">
                        <span>Password</span>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="input-box">
                        <input type="submit" id="submit" name="submit" value="Sign Up">
                    </div>
                    <div class="input-box">
                        <p>Alread have an account? <a href="login.php">Sign in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <?php include 'partial/_script.php';?>
 </body>

</html>