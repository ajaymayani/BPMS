<?php include 'partial/_config.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/fontawesome.css">

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
    <title>Books</title>
</head>

<body>
    <?php session_start();
    include 'partial/_nav.php'; ?>

    <div class="main">

        <div class="container">
            <div class="row">
                <?php
                $sql = "select cat_name from books_category_tbl where id =" . $_GET['id'];
                $result = $conn->query($sql);
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<h1 class="white mx-auto">' . $row['cat_name'] . '</h1>';
                    }
                }
                ?>
            </div>
            <div class="row content-div">
                <?php
                $id = $_GET['id'];
                $sql = "select * from booksinfo_tbl b ,author_tbl a where b.book_cate_id = '$id' and b.authorid=a.authorid";
                $result = $conn->query($sql);
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                        echo '<div class="col-3 box align-center">
                        <div class="img align-center">
                            <a href="book_details.php?id=' . $rows['id'] . '"><img src="admin/' . $rows['bookurl'] . '" width="100px" alt="eventimage"></a>
                        </div>
                        <div class="title align-center mt-1">
                            <h5>' . $rows['bookname'] . '</h5>
                        </div>
                        <div class="title align-center">
                            <strong><p>' . $rows['author_name'] . '</p></strong>
                        </div>
                        <div class="title align-center">
                            <strong><p style="font-size:15px">Year : ' . $rows['pyear'] . '|' . $rows['booktype'] . '| Pages : ' . $rows['bookpage'] . '</p></strong>
                        </div>
                        <div class="title align-center">
                            <strong><p>Price : ' . $rows['bookprice'] . '</p></strong>
                        </div>                        
                    </div>';
                    }
                }
                ?>

            </div>
        </div>

        <!--?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM `booksinfo_tbl` where book_cate_id = '$id'";
                $result = $conn->query($sql);
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                        echo '<div class="col-3 box align-center">
                                <div class="row">
                                    <div class="img align-center">
                                        <a href="display_events.php?id='.$rows['id'].'"><img src="admin/' . $rows['bookurl'] . '" width="100px" alt="bookimage"></a>
                                    </div>
                                    <div class="title align-center mt-1">
                                        <h6>' . $rows[''] . '</h6>
                                    </div>
                                </div>
                    <       /div>';
                    }
                } else {
                    echo $conn->error;
                }
                ?-->
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