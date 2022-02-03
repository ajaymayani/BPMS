<?php include 'partial/_config.php'; 
    $eventid = $_GET['id'];
    $sql = "select * from events_tbl where eventid = '$eventid'";
    $result = $conn->query($sql);
    if($result)
    {
        if($result->num_rows>0)
        {
            while($rows = $result->fetch_assoc())
            {
                $eventtitle = $rows['eventtitle'];
                $eventauthor = $rows['eventauthor'];
                $launchdate =$rows['launchdate'];
                $eventvenue = $rows['eventvenue'];
                $eventimg = $rows['eventimg'];
            }
        }else{
            echo "event not available";
        }
    }else{

    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include 'partial/_link.php';?>

    <style>
        .align-center {
            text-align: center;
        }
        .main::before {
            content: '';
            background-color: black;
            position: absolute;
            width :100%;
            height : 100%;
            z-index: -1;
            opacity: 0.3;
        }
        .main {
            background: url('images/bg-03.jpg') no-repeat center center/cover;
            position: relative;
            z-index: 1;
        }
        .white {
            color: white;
            text-align: left;
        }
        h6 {
            color: #607d8b;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        h5 {
            color: #607d8b;
            font-weight: 400;
            text-transform: uppercase;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

    </style>
    <title>Events</title>
</head>

<body>
    <?php session_start();
    include 'partial/_nav.php'; ?>

    <div class="main">

        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <h4 class="white text-center"><?php echo $eventtitle; ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h6 class="white text-center">BOOK LAUNCH EVENT</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h6 class="white text-center">Author :</h6>
                    <h5 class="white text-center"><?php echo $eventauthor; ?></h5>
                </div>
                <div class="col-md-4">
                    <h6 class="white text-center">Launch Date:</h6>
                    <h5 class="white text-center"><?php echo $launchdate; ?></h5>
                </div>
                <div class="col-md-4">
                    <h6 class="white text-center">Venue</h6>
                    <h5 class="white text-center"><?php echo $eventvenue; ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 align-center my-2">
                    <img src="admin/<?php echo $eventimg; ?>" width="400px" alt="">
                </div>
            </div>
        </div>

    </div>
    <?php include 'partial/_footer.php'; 
        include 'partial/_script.php';
    ?>
    
</body>

</html>