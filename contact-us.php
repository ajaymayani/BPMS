<?php

include 'partial/_config.php';
$submited = false;

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "insert into contact_tbl (name,email,message) values ('$name','$email','$message')";
    $result = $conn->query($sql);
    if ($result) {
        $submited = "Message sent successfully....";
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

    <style>
        #main::before {
            content: '';
            background-color: black;
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.3;
        }

        #main {
            position: relative;
            background: url('images/invtauthors.jpg') no-repeat center center/cover;
            z-index: -1;
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

        h1 {
            font-weight: 500;
            font-size: 1.5rem;
            text-transform: uppercase;
            display: block;
            letter-spacing: 1px;
        }

        p {
            font-size: 16px;
            display: inline-block;
            font-weight: 400;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }
    </style>
    <title>Contact Us</title>
</head>

<body>
    <?php session_start();
    include 'partial/_nav.php';

    ?>

    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4">
                    <h4 class="text-light text-center">Contact Us</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-5">
                        <?php if ($submited) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success ! </strong>' . $submited . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
                        } ?>
                        <div class="box">
                            <form action="contact-us.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Message..."></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">
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