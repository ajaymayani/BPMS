<?php

include 'partial/_config.php';
$proposal = false;
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
        $proposal = true;
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

    <?php include 'partial/_link.php'; ?>

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

        .mbr-text {
            font-style: normal;
            line-height: 1.6;
            font-style: bold;
        }

        h1  {
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
    <title>Invitation</title>
</head>

<body>
    <?php 
    session_start(); 
    include 'partial/_nav.php'; 
    
    if($proposal)
    {
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success !</strong> Thank you for proposal
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }

    ?>

    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4">
                    <h1 class="text-light text-center">Submit a Proposal</h1>
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

    <?php include 'partial/_footer.php'; 
        include 'partial/_script.php';
    ?>
   </body>

</html>