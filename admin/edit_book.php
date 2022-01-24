<?php include '../partial/_config.php';
$inserted = false;

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    echo "get";
    $id = $_GET['id'];
    $sql = "select * from booksinfo_tbl where id='$id'";
    $result = $conn->query($sql);
    if ($result) {
        while ($rows = $result->fetch_assoc()) {
            $bookname = $rows['bookname'];
            $authorid = $rows['authorid'];
            $ISBN = $rows['ISBN'];
            $pyear = $rows['pyear'];
            $booktype = $rows['booktype'];
            $bookpage = $rows['bookpage'];
            $language = $rows['language'];
            $booksize = $rows['booksize'];
            $bookrights = $rows['bookrights'];
            $bookprice = $rows['bookprice'];
            $aboutbook = $rows['aboutbook'];
        }
    }
}

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['update']))
{
    $id = $_POST['id'];
    $bookname  = $_POST['bookname'];
    $authorname = $_POST['authorname'];
    $ISBN = $_POST['ISBN'];
    $pyear = $_POST['pyear'];
    $booktype = $_POST['booktype'];
    $bookpage = $_POST['bookpage'];
    $language = $_POST['language'];
    $booksize = $_POST['booksize'];
    $bookrights = $_POST['bookrights'];
    $bookprice = $_POST['bookprice'];
    $aboutbook = $_POST['aboutbook'];

    $sql = "UPDATE `booksinfo_tbl` SET `bookname`='$bookname',`authorid`='$authorname',`ISBN`='$ISBN',`pyear`='$pyear',`booktype`='$booktype',`bookpage`='$bookpage',`language`='$language',`booksize`='$booksize',`bookrights`='$bookrights',`bookprice`='$bookprice',`aboutbook`='$aboutbook' WHERE `id`='$id' ";
    $result = $conn->query($sql);
    if($result)
    {
        header("location:add_book.php");
    }else{
        echo "Error :".$conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <style>
        body {
            background-color: #9f9da7;
        }
    </style>
</head>

<body>
    <?php include 'partial/_nav.php';
    ?>


    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                <h4>Edit Book</h4>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-12 col-md-6 mx-auto">
                        <form action="edit_book.php" method="POST">
                            <div class="form-group">
                                <label for="bookname">Book Name</label>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="text" class="form-control" id="bookname" name="bookname" value="<?php echo $bookname; ?>">
                            </div>
                            <div class="form-group">
                                <label for="authorname">Author Name</label>
                                <select name="authorname" id="authorname" class="form-control">
                                    <option selected disabled>Select author</option>
                                    <?php
                                    $sql = "SELECT * FROM `author_tbl`";
                                    $author_result = $conn->query($sql);
                                    if ($author_result) {
                                        while ($rows = $author_result->fetch_array()) {

                                            if ($rows['authorid'] == $authorid) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            echo '<option ' . $selected . ' value="' . $rows['authorid'] . '">' . $rows['author_name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ISBN">ISBN</label>
                                <input type="number" class="form-control" id="ISBN" name="ISBN" value="<?php echo $ISBN; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pyear">Publisher Year</label>
                                <input type="number" class="form-control" id="pyear" name="pyear" value="<?php echo $pyear; ?>">
                            </div>
                            <div class="form-group">
                                <label for="booktype">Type of Book</label>
                                <select name="booktype" id="booktype" class="form-control">
                                    <option disabled selected>Select type of book</option>
                                    <?php
                                    if ($booktype == "Paperback") {

                                        echo '<option selected value="Paperback">Paperback</option>
                                            <option value="Hardcover">Hardcover</option>';
                                    } else if ($booktype == "Hardcover") {
                                        echo '<option value="Paperback">Paperback</option>
                                            <option selected value="Hardcover">Hardcover</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bookpage">Book Pages</label>
                                <input type="number" class="form-control" id="bookpage" name="bookpage" value="<?php echo $bookpage; ?>">
                            </div>
                            <div class="form-group">
                                <label for="language">Language</label>
                                <input type="text" class="form-control" id="language" name="language" value="<?php echo $language; ?>">
                            </div>
                            <div class="form-group">
                                <label for="booksize">Book Size</label>
                                <select name="booksize" id="booksize" class="form-control">
                                    <option disabled selected>Select Book Size</option>
                                    <option selected value="216 X 280 mm">216 X 280 mm</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bookrights">Territorial Rights</label>
                                <select name="bookrights" id="bookrights" class="form-control">
                                    <option disabled selected>Select Rights</option>
                                    <?php
                                    if ($bookrights == "World") {
                                        echo '<option selected value="World">World</option>
                                                <option value="Restricted">Restricted</option>';
                                    } else if ($bookrights == "Restricted") {
                                        echo '<option value="World">World</option>
                                                <option selected value="Restricted">Restricted</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bookprice">Book Price</label>
                                <input type="number" class="form-control" id="bookprice" name="bookprice" value="<?php echo $bookprice; ?>">
                            </div>
                            <div class="form-group">
                                <label for="aboutbook">About the Book</label>
                                <textarea class="form-control" id="aboutbook" name="aboutbook"><?php echo $aboutbook; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update" id="update" value="Update" class="btn btn-primary btn-sm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>