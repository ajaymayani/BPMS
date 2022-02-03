<?php

include 'partial/_config.php';
$submiting=false;
if (isset($_POST['submit'])) {
   
    $name = $_POST['name'];
    $book_category = $_POST['book_category'];
    $book_name = $_POST['book_name'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
   
    $sql ="INSERT INTO `specimen_req_tbl` ( `name`, `book_category_id`, `book_name`, `telephone`, `email`, `address`, `dt`) VALUES ('$name', '$book_category', '$book_name', '$telephone', '$email', '$address', current_timestamp())";

    $result = $conn->query($sql);
    if ($result) {
        $submiting = true;
    } else {
        echo '<script>alert(' . $conn->error . ')</script>';
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

        h1 {
            font-weight: 500;
            font-size: 1.5rem;
            text-transform: uppercase;
            display: block;
            letter-spacing: 1px;
        }

        label {
            font-size: 16px;
            margin-bottom: 5px;
            display: inline-block;
            color: #607d8b;
            font-weight: 300;
            letter-spacing: 1px;
        }

        input {
            padding: 10px 20px;
            outline: none;
            font-weight: 400;
            border: 1px solid #607d8b;
            font-size: 16px;
            letter-spacing: 1px;
        }
    </style>
    <title>Request</title>
</head>

<body>
    <?php 
    
    session_start();
    include 'partial/_nav.php'; 
    
    if($submiting)
    {
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success !</strong> Thank you for reuqest
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
                    <h1 class="text-light text-center">Submit a Specimen Request</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-5">
                        <div class="box">

                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Your Name</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Book Category</label>
                                    </div>
                                    <div class="col-6">
                                        <select name="book_category" class="form-control book_cate">
                                            <option selected disabled>Select book category</option>
                                            <?php
                                            $sql = "select * from books_category_tbl";
                                            $result = $conn->query($sql);
                                            if ($result) {
                                                while ($rows = $result->fetch_assoc()) {
                                                    // echo '<a class="dropdown-item" href="books.php?id=' . $rows['id'] . '">' . $rows['cat_name'] . '</a>';
                                                    echo '<option value=' . $rows['id'] . '>' . $rows['cat_name'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Book Name</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="book_name" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="">Address (Max 200 characters)</label>
                                    </div>
                                    <div class="col-6">
                                        <textarea class="form-control address" name="address" id="" rows="5"></textarea>
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
                                        <input type="number" name="telephone" class="form-control">
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