<?php include '../partial/_config.php';
session_start();
if ($_SESSION['a_loggedin'] != true || !isset($_SESSION['a_loggedin'])) {
    header("location:login.php");
}
$cat_name = "";
$inserted = false;
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "select * from books_category_tbl where id = " . $id;
    $result = $conn->query($sql);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $cat_name  = $row['cat_name'];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['edit_category']) && isset($_GET['update'])) {
    $id = $_GET['edit_id'];
    $edit_category = $_GET['edit_category'];
    $sql = "update books_category_tbl set cat_name = '$edit_category' where id ='$id'";
    $result = $conn->query($sql);
    if ($result) {
        header("location:add_category.php");
    } else {
        echo "Error :" . $conn->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add'])) {
    $category = $_POST['category'];
    $sql = "INSERT INTO books_category_tbl (`cat_name`) VALUES ('$category')";
    $result = $conn->query($sql);
    if ($result) {
        $inserted  = true;
    } else {
        $inserted = false;
        echo "Error :" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Category</title>
    <!-- Bootstrap CSS -->
    <?php include 'partial/_link.php'; ?>
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

    <div class="main container mt-3">

        <div class="row">

            <div class="col-12 col-md-5">
                <div class="card">
                    <div class="card-header"><h2>Add Category</h2></div>
                    <div class="card-body">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) { ?>
                            <form action="add_category.php" method="GET">
                                <div class="form-group">
                                    <label for="category">Book Category</label>
                                    <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $id; ?>">
                                    <input type="text" name="edit_category" id="edit_category" class="form-control" value="<?php echo $cat_name; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="update" id="update" value="Update" class="btn btn-primary btn-sm">
                                </div>
                            </form>
                        <?php
                        } else {

                        ?>
                            <form action="add_category.php" method="POST">
                                <div class="form-group">
                                    <label for="category">Book Category</label>
                                    <input type="text" name="category" id="category" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="add" id="add" value="Add" class="btn btn-primary btn-sm">
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <table id="myTable" class="table">
                            <thead>
                                <th>Sno</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "select * from books_category_tbl";
                                $result = $conn->query($sql);
                                if ($result) {
                                    $sno = 0;
                                    while ($rows = $result->fetch_assoc()) {
                                        echo '<tr>
                                                <td>' . ++$sno . '</td>
                                                <td>' . $rows['cat_name'] . '</td>
                                                <td><a href="add_category.php?id=' . $rows['id'] . '" class="btn btn-success btn-sm">Edit</a> <a class="btn btn-danger btn-sm deletes" href="#" id="' . $rows['id'] . '">Delete</a></td>
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

    <?php include 'partial/_script.php'; ?>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });


        deletes = document.getElementsByClassName('deletes');
        Array.from(deletes).forEach((element) => {
            element.addEventListener('click', (e) => {
                id = e.target.id;
                if (confirm("Are you sure you want to delete this category....?")) {
                    window.location = `category_delete.php?id=${id}`;
                }
            })
        });
    </script>
</body>

</html>