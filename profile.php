<?php

session_start();
$showMsg = false;

if (!isset($_SESSION['loggedin'])) {
    header("location:login.php");
}

include 'partial/_config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $emailid = $_POST['emailid'];
    $mobilenumber = $_POST['mobilenumber'];

    $update_sql = "update users_tbl set name='$name' , emailid = '$emailid' , mobilenumber = '$mobilenumber' where userid = '$userid'";
    $update_result = $conn->query($update_sql);
    if ($update_result) {
        $showMsg = "Profile update successfully.";
    }
}

$userid = $_SESSION['userid'];
$sql = "select * from users_tbl where userid = '$userid'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    while ($rows = $result->fetch_assoc()) {
        $name = $rows['name'];
        $emailid = $rows['emailid'];
        $mobilenumber = $rows['mobilenumber'];
    }
} else {
    $showError = "Uset not found";
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
    <title>Profile</title>
</head>

<body>
    <?php include 'partial/_nav.php'; ?>

    <div class="main">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card mb-5">
                        <?php
                        if ($showMsg) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success !</strong> ' . $showMsg . '
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>';
                        }
                        ?>
                        <div class="mx-auto">
                            <img src="images/user.png" class="img-fluid mx-auto" width="100px" alt="img-profile">
                        </div>
                        <div class="box">
                            <form action="profile.php" method="post">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['userid']; ?>">
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?php echo $name ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="emailid" id="emailid" value="<?php echo $emailid ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" placeholder="Mobile Number" name="mobilenumber" id="mobilenumber" value="<?php echo $mobilenumber ?>">
                                </div>
                                <div class="form-group align-center">
                                    <input type="submit" class="btn btn-primary btn-block" name="submit" id="submit" value="Update">
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