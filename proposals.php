<?php

include 'partial/_config.php';
if(isset($_POST['submit']))
{
    $booknature = $_POST['booknature'];
    $booktitle = $_POST['booktitle'];
    $booksubject = $_POST['booksubject'];
    $bookcourse = $_POST['bookcourse'];
    $bookcurrentstatus = $_POST['bookcurrentstatus'];
    $bookkeyfeatures = $_POST['bookkeyfeatures'];

    $authorname = $_POST['authorname'];
    $designation = $_POST['designation'];
    $insname = $_POST['insname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    
    $sql = "INSERT INTO `author_proposal_tbl` ( `booknature`, `booktitle`, `booksubject`, `bookcourse`, `bookcurrentstatus`, `bookkeyfeatures`, `authorname`, `designation`, `insname`, `address`, `city`, `country`, `pincode`, `telephone`, `email`, `dt`) VALUES ( '$booknature', '$booktitle', '$booksubject', '$bookcourse','$bookcurrentstatus', '$bookkeyfeatures', '$authorname', '$designation', '$insname', '$address', '$city', '$country', '$pincode', '$telephone', '$email', current_timestamp());";

    $result = $conn->query($sql);
    if($result)
    {
        echo '<script>alert("Thank you for Submitting")</script>';
    }else{
        echo '<script>alert('.$conn->error.')</script>';
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
    <title>Invitation</title>
</head>

<body>
    <?php include 'partial/_nav.php'; ?>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4">
                    <h1 class="white text-center">Submit a Proposal</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-5">
                        <div class="box">
                            <p class="black mrb-text">Do you wish to publish a book?</p>
                            <p>Would you like us to publish it?</p>
                            <p>If yes, all that you need to do, is to fill the online form provided below and send it to us. As soon as we receive your proposal, you will receive an automatic acknowledgement confirming the proposal number. You will find this number useful to quote in all the future correspondences that you have with us.</p>
                            <hr>
                            <h6>Proposal for Publishing Book</h6>
                            </br>
                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Nature of Proposed Book (Max 200 characters)</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="booknature">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Title (tentative) of proposed book (Max 200 characters)</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="booktitle">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Discipline/Subject (Max 200 characters)</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="booksubject">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">If textbook, courses for which the proposed book can be used (Max 200 characters</label>
                                    </div>
                                    <div class="col-6">
                                        <textarea class="form-control" name="bookcourse" id="" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Current status of book</label>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bookcurrentstatus" id="bookcurrentstatus" value="Concept">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Concept
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bookcurrentstatus" id="exampleRadios2" value="Manuscript/Typescript">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Manuscript/Typescript
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bookcurrentstatus" id="exampleRadios1" value="Partially ready">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Partially ready
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bookcurrentstatus" id="exampleRadios2" value="Manuscript/Typescript completed">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Manuscript/Typescript completed
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">What are the key features of the book(Max 1000 characters)</label>
                                    </div>
                                    <div class="col-6">
                                        <textarea class="form-control" name="bookkeyfeatures" id="" rows="5"></textarea>
                                    </div>
                                </div>
                                <h6>Contact Infomation</h6>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Your Name</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="authorname" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Designation</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="designation" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Name of Institution</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="insname" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Address (Max 200 characters)</label>
                                    </div>
                                    <div class="col-6">
                                        <textarea class="form-control" name="address" id="" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">City</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Country</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="country" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Pin Code</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="number" name="pincode" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Telephone/Extension</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="numner" name="telephone" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Your email address</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <input type="submit" value="Submit" name="submit" class="btn btn-primary" style="margin-left: 250px;">
                                    </div>
                                    <div class="col-6">
                                        <input type="button" value="Clear" name="clear" class="btn btn-secondary">
                                    </div>
                                </div>
                            </form>
                            <p>If the subject falls within the purview of our publishing programmes, we will get in touch with you.</p>
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