<?php include '../partial/_config.php';
$inserted = false;

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
    if ($inserted) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success !</strong> Book category has been added successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    ?>

    <!-- Button trigger modal -->


    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="book_upload.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="bookname">Book Image</label>
                            <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" value="">
                        </div>
                        <div class="form-group">
                            <label for="bookname">Book Name</label>
                            <input type="text" class="form-control" id="bookname" name="bookname" value="">
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
                                        echo '<option value="' . $rows['authorid'] . '">' . $rows['author_name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ISBN">ISBN</label>
                            <input type="number" class="form-control" id="ISBN" name="ISBN" value="">
                        </div>
                        <div class="form-group">
                            <label for="pyear">Publisher Year</label>
                            <input type="number" class="form-control" id="pyear" name="pyear" value="">
                        </div>
                        <div class="form-group">
                            <label for="booktype">Type of Book</label>
                            <select name="booktype" id="booktype" class="form-control">
                                <option disabled selected>Select type of book</option>
                                <option value="Paperback">Paperback</option>
                                <option value="Hardcover">Hardcover</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bookpage">Book Pages</label>
                            <input type="number" class="form-control" id="bookpage" name="bookpage" value="">
                        </div>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <input type="text" class="form-control" id="language" name="language" value="">
                        </div>
                        <div class="form-group">
                            <label for="booksize">Book Size</label>
                            <select name="booksize" id="booksize" class="form-control">
                                <option disabled selected>Select Book Size</option>
                                <option value="216 X 280 mm">216 X 280 mm</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bookrights">Territorial Rights</label>
                            <select name="bookrights" id="bookrights" class="form-control">
                                <option disabled selected>Select Rights</option>
                                <option value="World">World</option>
                                <option value="Restricted">Restricted</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bookprice">Book Price</label>
                            <input type="number" class="form-control" id="bookprice" name="bookprice" value="">
                        </div>
                        <div class="form-group">
                            <label for="aboutbook">About the Book</label>
                            <textarea class="form-control" id="aboutbook" name="aboutbook"></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <input type="submit" name="add" id="add" value="Add" class="btn btn-primary btn-sm">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                <h4>Book Lists</h4>

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                    <i class="fa fa-plus"></i> News
                </button>
            </div>
            <div class="card-body">
                <div class="row">

                    <!--div class="col-12 col-md-6">
                        <form action="book_upload.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="bookname">Book Image</label>
                                <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" value="">
                            </div>
                            <div class="form-group">
                                <label for="bookname">Book Name</label>
                                <input type="text" class="form-control" id="bookname" name="bookname" value="">
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
                                            echo '<option value="' . $rows['authorid'] . '">' . $rows['author_name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ISBN">ISBN</label>
                                <input type="number" class="form-control" id="ISBN" name="ISBN" value="">
                            </div>
                            <div class="form-group">
                                <label for="pyear">Publisher Year</label>
                                <input type="number" class="form-control" id="pyear" name="pyear" value="">
                            </div>
                            <div class="form-group">
                                <label for="booktype">Type of Book</label>
                                <select name="booktype" id="booktype" class="form-control">
                                    <option disabled selected>Select type of book</option>
                                    <option value="Paperback">Paperback</option>
                                    <option value="Hardcover">Hardcover</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bookpage">Book Pages</label>
                                <input type="number" class="form-control" id="bookpage" name="bookpage" value="">
                            </div>
                            <div class="form-group">
                                <label for="language">Language</label>
                                <input type="text" class="form-control" id="language" name="language" value="">
                            </div>
                            <div class="form-group">
                                <label for="booksize">Book Size</label>
                                <select name="booksize" id="booksize" class="form-control">
                                    <option disabled selected>Select Book Size</option>
                                    <option value="216 X 280 mm">216 X 280 mm</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bookrights">Territorial Rights</label>
                                <select name="bookrights" id="bookrights" class="form-control">
                                    <option disabled selected>Select Rights</option>
                                    <option value="World">World</option>
                                    <option value="Restricted">Restricted</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bookprice">Book Price</label>
                                <input type="number" class="form-control" id="bookprice" name="bookprice" value="">
                            </div>
                            <div class="form-group">
                                <label for="aboutbook">About the Book</label>
                                <textarea class="form-control" id="aboutbook" name="aboutbook"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="add" id="add" value="Add" class="btn btn-primary btn-sm">
                            </div>
                        </form>
                    </div-->

                    <div class="col-12">
                        <table id="myTable" class="table">
                            <thead>
                                <th>Sno</th>
                                <th>Book Name</th>
                                <th>Author Name</th>
                                <th>ISBN</th>
                                <th>Publisher Year</th>
                                <th>Book Pages</th>
                                <th>Book Price</th>
                                <th>About Image</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "select * from booksinfo_tbl b, author_tbl a where b.authorid=a.authorid";
                                $result = $conn->query($sql);
                                if ($result) {
                                    $sno = 0;
                                    while ($rows = $result->fetch_assoc()) {
                                        echo '<tr>
                                                <td>' . ++$sno . '</td>
                                                <td>' . $rows['bookname'] . '</td>
                                                <td>' . $rows['author_name'] . '</td>
                                                <td>' . $rows['ISBN'] . '</td>
                                                <td>' . $rows['pyear'] . '</td>
                                                <td>' . $rows['bookpage'] . '</td>
                                                <td>' . $rows['bookprice'] . '</td>
                                                <td> <img class="img-fluid" width="50px" src="' . $rows['bookurl'] . '" /></td>
                                                <td><a href="edit_book.php?id=' . $rows['id'] . '" class="btn btn-info btn-sm">Edit</a> <a class="btn btn-danger btn-sm deletes" href="#" id="' . $rows['id'] . '">Delete</a></td>
                                             </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
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
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });


        deletes = document.getElementsByClassName('deletes');
        Array.from(deletes).forEach((element) => {
            element.addEventListener('click', (e) => {
                id = e.target.id;
                if (confirm("Are you sure you want to delete this book ?")) {
                    window.location = `book_delete.php?id=${id}`;
                }
            })
        });
    </script>
</body>

</html>