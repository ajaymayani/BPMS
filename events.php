<?php include 'partial/_config.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php include 'partial/_link.php'; ?>
    <style>
        .align-center {
            text-align: center;
        }

        .main::before{
            content: '';
            background-color: black;
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0.3;
            z-index: -1;
        }

        .main {
            position: relative;
            z-index: 1;
            background: url('images/bg-03.jpg') no-repeat center center/cover;
        }

        .white {
            color: white;
            text-align: left;
        }

        .content-div {
            display: flex;
            justify-content: center;

        }

        h6 {
            color: #607d8b;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 20px;
            display: inline-block;
            letter-spacing: 1px;
        }
        .card{
            height: 400px;
        }
.event-img{
    width: 150px;
}
    </style>
    <title>Events</title>
</head>

<body>
    <?php session_start();
    include 'partial/_nav.php'; ?>

    <div class="main">

        <div class="container py-4">
            <div class="row">
                <h1 class="white mx-auto">Events</h1>
            </div>
            <div class="row content-div">
                <?php
                $sql = "SELECT * FROM `events_tbl`";
                $result = $conn->query($sql);
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                       
                    echo '<div class="col-3 ml-3 mt-3"><div class="card" style="width: 18rem;">
                            <img class="card-img-top rounded mx-auto d-block event-img mt-3" src="admin/' . $rows['eventimg'] . '" alt="book image">
                            <div class="card-body">
                              <h6 class="card-title">' .  $rows['eventtitle']. '</h6>
                              <br> <a href="display_events.php?id='.$rows['eventid'].'" class="btn btn-primary mt-1">More</a>
                            </div>
                          </div></div>';
                    }
                } else {
                    echo $conn->error;
                }
                ?>
            </div>
        </div>

    </div>
    <?php include 'partial/_footer.php'; 
        include 'partial/_script.php';
    ?>
   </body>

</html>