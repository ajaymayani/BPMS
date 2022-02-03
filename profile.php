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

    <?php include 'partial/_link.php'; ?>

    <style>
        #main::before {
            content: '';
            position: absolute;
            background-color: black;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.3;
        }

        #main {
            position: relative;
            background: url('images/invtauthors.jpg') no-repeat center center/cover;
            z-index: 1;
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

        .input-box {
            margin-bottom: 20px;
        }

        .input-box span {
            font-size: 16px;
            margin-bottom: 5px;
            display: inline-block;
            color: #607d8b;
            font-weight: 300;
            letter-spacing: 1px;
        }

        .input-box input {
            width: 100%;
            padding: 10px 20px;
            outline: none;
            font-weight: 400;
            border: 1px solid #607d8b;
            font-size: 16px;
            letter-spacing: 1px;
            color: #607d8b;
            background: transparent;
            border-radius: 30px;
        }

        .input-box input[type="submit"] {
            background: #0073e6;
            color: #fff;
            outline: none;
            border: none;
            font-weight: 500;
            cursor: pointer;
        }

        .input-box input[type="submit"]:hover {
            background: #0480fd;
        }
    </style>
    <title>Profile</title>
</head>

<body>
    <?php include 'partial/_nav.php'; ?>

    <div id="main">
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

                                <div class="input-box">
                                    <span>Name</span>
                                    <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['userid']; ?>">
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?php echo $name ?>">
                                </div>
                                <div class="input-box">
                                    <span>Email</span>
                                    <input type="email" class="form-control" placeholder="Email" name="emailid" id="emailid" value="<?php echo $emailid ?>">
                                </div>
                                <div class="input-box">
                                    <span>Mobile Number</span>
                                    <input type="text" class="form-control" placeholder="Mobile Number" name="mobilenumber" id="mobilenumber" value="<?php echo $mobilenumber ?>">
                                </div>
                                <div class="input-box">
                                    <input type="submit" class="btn btn-primary btn-block" name="submit" id="submit" value="Update">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'partial/_footer.php';
    include 'partial/_script.php';
    ?>
</body>

</html>