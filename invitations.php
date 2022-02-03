<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include 'partial/_link.php';?>

    <style>

        #main::before{
            content: '';
            position: absolute;
            background-color: black;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.3;
        }

        #main{
            position: relative;
            background: url('images/invtauthors.jpg') no-repeat center center/cover;
            z-index: 1;
        }

        .card {
            background-color: #f7f7f7;
            padding: 30px;
            width: 70%;
            margin: auto;
            border-radius: 10px;
        }

        h1 {
            color: #ffffff;
            font-weight: 600;
            font-size: 1.5rem;
            text-transform: uppercase;         
            display:block;
            letter-spacing: 1px;
        }
        
        p{
            text-align: center;
            letter-spacing: 1px;
            font-weight: 300;
        }   

    </style>
    <title>Invitation</title>
</head>

<body>
    <?php session_start(); include 'partial/_nav.php'; ?>

    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4">
                    <h1 class="white text-center">Invitation to Authors</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-5">
                        <p>If you have a publishing proposal in your area of specialisation, we will be happy to hear from you. The publication proposal form can be accessed from our website www.universitiespress.com. Alternatively, you may please write to:</p>
                        <p>
                            The Editorial Department<br>
                            Universities Press (India) Private Limited<br>
                            3-6-747/1/A and 3-6-754/1 Himayatnagar<br>
                            Hyderabad 500 029,Telangana, India<br>
                            Phone: (040) 27662849, 27662850<br>
                            Email: <a href="">info@msupress.com</a>
                        </p>
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