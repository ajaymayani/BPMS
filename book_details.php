<?php include 'partial/_config.php';
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

        .card {
            background-color: #f7f7f7;
            padding: 30px;
            width: 80%;
            margin: auto;
        }

        .box {
            background-color: #ffffff;
            padding: 20px;
        }

        #footer {
            background-color: #2e2e2e;
        }

        .content-div {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .white {
            color: white;
            text-align: left;
        }
    </style>
    <title>Books Details</title>
</head>

<body>
    <?php session_start();
    include 'partial/_nav.php'; ?>

    <div class="container box">
        <div class="row">
            <?php
            $bookid = $_GET['id'];
            $sql = "select * from booksinfo_tbl b , author_tbl a where b.id='$bookid' and b.authorid = a.authorid";
            $result = $conn->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4">
                    <img src="admin/' . $row['bookurl'] . '" width="350px" alt="book image">
                </div>
                <div class="col-md-8">
                    <h2>' . $row['bookname'] . '</h2>
                    <h5><em>' . $row['author_name'] . '</em></h5>
                    <h5>ISBN : ' . $row['ISBN'] . ' | Year : ' . $row['pyear'] . ' | ' . $row['booktype'] . ' | Pages : ' . $row['bookpage'] . ' | Language : ' . $row['language'] . '</h5>
                    <h5>Book Size : ' . $row['booksize'] . ' | Territorial Rights : ' . $row['bookrights'] . '</h5>
                    <h5>Price : 1050</h5>
                    <h5 class="mt-5">About the book</h5>
                    <p>' . $row['aboutbook'] . '</p>
                </div>';
                }
            } else {
                echo "error :" . $conn->error;
            }
            ?>

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