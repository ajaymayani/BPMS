<?php include 'partial/_config.php'; ?>
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
            display: block;
            margin: auto;
        }
        .main::before {
            background-color: black;
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.3;
        }

        .main {
            background: url('images/bg-03.jpg') no-repeat center center/cover;
            position: relative;
            z-index: 1;
        }

        .content-div {
            display: flex;
            justify-content: center;
        }

        .content {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 5px 4px 10px black;
        }

        .card {
            height: 500px;
            letter-spacing: 1px;
        }

        /* .content img {
            display: block;
            width: 150px;
            margin: 10px auto;
        } */

        p {
            font-size: 16px;
            display: inline-block;
            font-weight: 400;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }

        h6  {
            color: #607d8b;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 20px;
            display: inline-block;
            letter-spacing: 1px;
        }
        
        h1  {
            font-weight: 500;
            font-size: 1.5rem;
            text-transform: uppercase;
            display: inline-block;
            letter-spacing: 1px;
        }

        .book-detail {
            display: block;
            width: 50%;
            padding-top: 20px;
            margin: auto;
        }

        .book-img {
            width: 150px;
        }


       
    </style>
    <title>Books</title>
</head>

<body>
    <?php session_start();
    include 'partial/_nav.php'; ?>

    <div class="main py-4">

        <div class="container">
            <div class="row">
                <?php
                $sql = "select cat_name from books_category_tbl where id =" . $_GET['id'];
                $result = $conn->query($sql);
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<h1 class="text-light mx-auto">' . $row['cat_name'] . '</h1>';
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

                        //             echo '<div class="col-3 box align-center">
                        //     <div class="img align-center">
                        //         <a href="book_details.php?id=' . $rows['id'] . '"><img src="admin/' . $rows['bookurl'] . '" width="100px" alt="eventimage"></a>
                        //     </div>
                        //     <div class="title align-center mt-1">
                        //         <h5>' . $rows['bookname'] . '</h5>
                        //     </div>
                        //     <div class="title align-center">
                        //         <strong><p>' . $rows['author_name'] . '</p></strong>
                        //     </div>
                        //     <div class="title align-center">
                        //         <strong><p style="font-size:15px">Year : ' . $rows['pyear'] . '|' . $rows['booktype'] . '| Pages : ' . $rows['bookpage'] . '</p></strong>
                        //     </div>
                        //     <div class="title align-center">
                        //         <strong><p>Price : ' . $rows['bookprice'] . '</p></strong>
                        //     </div>                        
                        // </div>';
                        // echo '<div class="row mt-3 content-div">
                        //         <div class="col-12">
                        //             <div class="row content">
                        //                 <div class="col-8">
                        //                     <div class="mt-1 book-detail">
                        //                         <h5>' . $rows['bookname'] . '</h5>
                        //                         <p>' . $rows['author_name'] . '</p>
                        //                         <p>Year : ' . $rows['pyear'] . '|' . $rows['booktype'] . '<br> Pages : ' . $rows['bookpage'] . '</p>
                        //                         <p>Price : ' . $rows['bookprice'] . '</p>
                        //                     </div>
                        //                 </div>
                        //                 <div class="col-4">
                        //                 <a href="book_details.php?id=' . $rows['id'] . '"><img src="admin/' . $rows['bookurl'] . '" width="100px" alt="eventimage"></a>
                        //                 </div>
                        //             </div>
                        //         </div>
                        //     </div>';
                        echo '<div class="col-3 ml-3 mt-3"><div class="card" style="width: 18rem;">
                            <img class="card-img-top rounded mx-auto d-block book-img mt-3" src="admin/' . $rows['bookurl'] . '" alt="book image">
                            <div class="card-body">
                              <h6 class="card-title">' . $rows['bookname'] . '</h6>
                              <p class="card-text">
                              <p>' . $rows['author_name'] . '</p>
                                                 <p>Year : ' . $rows['pyear'] . '|' . $rows['booktype'] . '<br> Pages : ' . $rows['bookpage'] . '</p>
                                                 <p>Price : ' . $rows['bookprice'] . '</p>
                              </p>
                              <br><a href="book_details.php?id=' . $rows['id'] . '" class="btn btn-primary mt-1">More</a>
                            </div>
                          </div></div>';
                    }
                }
                ?>

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