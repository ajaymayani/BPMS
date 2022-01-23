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

        .welcome-div {
            padding-top: 105px;
            background-image: url(/clg/assignment/bpms/images/women_emp.jpg);

        }

        .card {
            background-color: #ffffff;
            padding: 30px;
            margin: 10px;
            border-radius: 10px;
        }

        .white {
            color: white;
            text-align: left;
        }

        #footer {
            background-color: #2e2e2e;
        }
    </style>
    <title>Home Page</title>
</head>

<body>
    <?php include 'partial/_nav.php'; ?>

    <div class="align-center" style="background-color: blueviolet;">
        <div id="carouselExampleIndicators" class="carousel slide py-5" ata-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="margin : 0 150px;">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="images/books/image1.jpg" alt="First slide" width="200px">
                        </div>
                        <div class="col-md-5">
                            <h5 class="white">Mammals of south asia volume 2</h5>
                            <p class="white">This list of mammals of India comprises all the mammal species alive in India today. Some of them are common to the point of being considered vermin while others are exceedingly rare. Many species are known from just a few zoological specimens in museums collected in the 19th and 20th centuries. Many of the carnivores and larger mammals are restricted in their distribution to forests in protected areas, while others live within cities in the close proximity of humans. </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="margin : 0 150px;">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="images/books/image2.jpg" alt="First slide" width="200px">
                        </div>
                        <div class="col-md-5">
                            <h5 class="white">Cloud Computing A Hands-on Approach</h5>
                            <p class="white">Cloud computing is a transformative paradigm that enables scalable, convenient, on-demand access to a shared pool of configurable computing and networking resources, for efficiently delivering applications and services over the internet. This book is written as a textbook on cloud computing for educational programs at colleges and universities, and also for cloud service providers who may be interested in offering a broader perspective of cloud computing to accompany their own customer and developer training programs.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="margin : 0 150px;">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="images/books/image3.jpg" alt="First slide" width="200px">
                        </div>
                        <div class="col-md-5">
                            <h5 class="white">Molecular Biology</h5>
                            <p class="white">Molecular biology is the branch of biology that studies the molecular basis of biological activity. Living things are made of chemicals just as non-living things are, so a molecular biologist studies how molecules interact with one another in living organisms to perform the functions of life.</p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="welcome-div">
        <div class="container">
            <div class="row pb-5">
                <div class="col-12 align-center mb-3">
                    <h5 style="color: white;">Welcome to MSU Library</h5>
                    <h6 style="color:white">MSU focuses on the publication of books in Science,Technology, Medicine and Management.</h6>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-title">We collaborate with reputed organisations</h5>
                        <p class="card-text">In addition to independent publishing, we collaborate with reputed organisations such as:</p>
                        <br>
                        <ul>
                            <li>Indian Academy of Sciences</li>
                            <li>Jawaharlal Nehru Centre for Advanced Scientific Research</li>
                            <li>Indian National Science Academy</li>
                            <li>Indian Space Research Organisation</li>
                            <li>Ramanujan Mathematical Society</li>
                            <li>Indian Association for Research in Computing Sciences</li>
                            <li>American Mathematical Society</li>
                            <li>Indian Institute of Metals/Indira Gandhi Centre for Atomic Research</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-title">Some of our overseas associates</h5>
                        <p class="card-text">Several of our books are co-published for the international market by CRC Press and Springer Verlag.<br>In addition to original publishing, we publish books selectively under license from reputed overseas publishers.</p>
                        <ul>
                            <li>Princeton University Press</li>
                            <li>MIT Press</li>
                            <li>CRC Press</li>
                            <li>Harvard University Press</li>
                            <li>The Institute of Materials</li>
                            <li>Silicon Press</li>
                            <li>American Mathematical Society</li>
                            <li>Chartered Institute of Personnel and Development (CIPD)</li>
                        </ul>
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