<?php include 'partial/_config.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .align-center {
            text-align: center;
        }

        .main {
            padding-top: 20px;
            background-image: url(/clg/assignment/bpms/images/women_emp.jpg);
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

        .content-div {

            display: flex;
            justify-content: center;

        }
    </style>
    <title>Events</title>
</head>

<body>
    <?php session_start();
    include 'partial/_nav.php'; ?>

    <div class="main">

        <div class="container">
            <div class="row">
                <h1 class="white mx-auto">Events</h1>
            </div>
            <div class="row content-div">
                <?php
                $sql = "SELECT * FROM `events_tbl`";
                $result = $conn->query($sql);
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                        echo '<div class="col-3 box align-center">
                        <div class="img align-center">
                            <a href="display_events.php?id='.$rows['eventid'].'"><img src="admin/' . $rows['eventimg'] . '" width="100px" alt="eventimage"></a>
                        </div>
                        <div class="title align-center mt-1">
                            <h6>' . $rows['eventtitle'] . '</h6>
                        </div>
                    </div>';
                    }
                } else {
                    echo $conn->error;
                }
                ?>
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