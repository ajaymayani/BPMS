<?php include 'partial/_config.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php include 'partial/_link.php';?>

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

        .content-div {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .white {
            color: white;
            text-align: left;
        }

        h2 {
            color: #607d8b;
            font-weight: 600;
            font-size: 1.4rem;
            text-transform: uppercase;
            margin-bottom: 20px;
            border-bottom: 2px solid #0073e6;
            display: inline-block;
            letter-spacing: 1px;
        }

        h5{
            font-weight: 400;
            font-size: 1rem;
            letter-spacing: 1px;
        }

        p{
            letter-spacing: 1px;
            font-weight: 300;
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
                    <img class="rounded mx-auto d-block" src="admin/' . $row['bookurl'] . '" width="350px" alt="book image">
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
    <?php include 'partial/_footer.php'; 
        include 'partial/_script.php';
    ?>
    
</body>

</html>