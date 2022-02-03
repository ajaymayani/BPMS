<?php include '../partial/_config.php';
$update = false;

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {
    $request_id = $_POST['request_id'];
    $status = $_POST['status'];

    $sql = "UPDATE specimen_req_tbl SET status = '$status' WHERE request_id = '$request_id'";
    $result = $conn->query($sql);
    if ($result) {
        $update = true;
    } else {
        $update = false;
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Specimen Request</title>
    <?php include 'partial/_link.php'; ?>

</head>

<body>
    <?php include 'partial/_nav.php';
    if ($update) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Status has been updated.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
    ?>


    <!-- Add Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">Edit Status</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="specimen_request.php" method="POST">
                        <input type="hidden" name="request_id" id="request_id">
                        <div class="form-group row">
                            <div class="col-4">
                                <label for="">Name</label>
                            </div>
                            <div class="col-6">
                                <input type="text" readonly name="input_name" id="input_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4">
                                <label for="">Status</label>
                            </div>
                            <div class="col-6">

                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="status" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="customRadio1"><span class="badge badge-success">Active</span></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="status" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="customRadio2"><span class="badge badge-warning">Pendding</span></label>
                                </div>

                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <input type="submit" name="update" id="update" value="Change" class="btn btn-primary btn-sm">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="main container mt-3">
        <div class="card">
            <div class="card-header">
                <h2>Author Proposal</h2>
            </div>
            <div class="card-body">
                <table id="myTable">
                    <thead>
                        <th>Sno</th>
                        <th>Name</th>
                        <th>Book Category</th>
                        <th>Book Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM specimen_req_tbl s,books_category_tbl b where s.book_category_id = b.id";

                        $result = $conn->query($sql);
                        if ($result) {
                            $sno = 0;
                            while ($rows = $result->fetch_assoc()) {
                                echo '<tr>
                                  <td>' . ++$sno . '</td>
                                  <td>' . $rows['name'] . '</td>
                                  <td>' . $rows['cat_name'] . '</td>
                                  <td>' . $rows['book_name'] . '</td>
                                  <td>' . $rows['telephone'] . '</td>
                                  <td>' . $rows['email'] . '</td>';
                                if ($rows['status'] == 0) {
                                    echo '<td> <span class="badge badge-warning">Pendding</span> </td>';
                                } else {
                                    echo '<td> <span class="badge badge-success">Active</span> </td>';
                                }
                                echo '<td> <button id="' . $rows['request_id'] . '" class="edits btn btn-sm btn-success">Edit</button> <button id="d' . $rows['request_id'] . '" class="deletes btn btn-sm btn-danger">Delete</button> </td>
                                  </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <?php include 'partial/_script.php'; ?>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        edits = document.getElementsByClassName('edits');
        Array.from(edits).forEach((element) => {
            element.addEventListener('click', (e) => {
                tr = e.target.parentNode.parentNode;
                id = e.target.id;
                authorname1 = tr.getElementsByTagName('td')[1].innerText;
                status = tr.getElementsByTagName('td')[6].innerText;
                request_id.value = id;
                input_name.value = authorname1;
                $('#editModal').modal('toggle');
            })
        })

        deletes = document.getElementsByClassName('deletes');
        Array.from(deletes).forEach((element) => {
            element.addEventListener('click', (e) => {
                request_id = e.target.id.substr(1, );
                if (confirm("Are you sure you want to delete this request ?")) {
                    window.location = `specimen_request_delete.php?request_id=${request_id}`;
                }
            })
        });
    </script>
</body>

</html>