<?php
include '../partial/_config.php';
$upload = false;
$update = false;

$error = "";
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add'])) {

  $eventtitle = $_POST['eventtitle'];
  $eventauthor = $_POST['eventauthor'];
  $launchdate = $_POST['launchdate'];
  $eventvenue = $_POST['eventvenue'];

  $uploadok = 1;
  $target_dir = "uploads/events/";
  $target_file = $target_dir . basename($_FILES['eventimg']['name']);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (file_exists($target_file)) {
    $error = "Sorry, file already exists";
    $uploadok = 0;
    $upload = false;
  }

  if ($_FILES['eventimg']['size'] > 500000) {
    $error = "Sorry, file is too large";
    $uploadok = 0;
    $upload = false;
  }

  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadok = 0;
    $upload = false;
  }
  if ($uploadok == 0) {
    $error = "Sorry, file was not uploaded.";
    $upload = false;
  } else {
    if (move_uploaded_file($_FILES['eventimg']['tmp_name'], $target_file)) {
      $upload = true;
    } else {
      $error = "Sorry, there was an error uploading your file";
      $upload = false;
    }
  }

  $sql = "insert into events_tbl (eventtitle,eventauthor,launchdate,eventvenue,eventimg) values ('$eventtitle','$eventauthor','$launchdate','$eventvenue','$target_file')";
  $result = $conn->query($sql);
  if ($result) {
    $upload = true;
  } else {
    $upload = false;
    $error = $conn->error;
  }
}else if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['update']))
{
  $eventid = $_POST['eventid'];
  $eventtitle = $_POST['edit_eventtitle'];
  $eventauthor = $_POST['edit_eventauthor'];
  $launchdate = $_POST['edit_launchdate'];
  $eventvenue = $_POST['edit_eventvenue'];

  $sql = "UPDATE `events_tbl` SET `eventtitle`='$eventtitle',`eventauthor`='$eventauthor',`launchdate`='$launchdate',`eventvenue`='$eventvenue' WHERE `eventid`='$eventid'";

  $result = $conn->query($sql);
  if($result)
  {
    $update =true;
  }else{
    $update = false;
    echo "Error ".$conn->error;
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

  <style>
    body {
      background-color: #9f9da7;
    }
  </style>
  <title>Events</title>
</head>

<body>
  <?php include 'partial/_nav.php';
  if ($upload && $uploadok == 1) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success !</strong> Event has been inserted successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  }
  if ($update) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success !</strong> Event has been updated successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  }
  ?>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="events.php" method="POST">
            <div class="form-group">
            <input type="hidden" name="eventid" id="eventid">
                <label for="eventtitle">Event Title</label>
                <input type="text" name="edit_eventtitle" id="edit_eventtitle" class="form-control">
              </div>
              <div class="form-group">
                <label for="eventauthor">Event Author</label>
                <input type="text" name="edit_eventauthor" id="edit_eventauthor" class="form-control">
              </div>
              <div class="form-group">
                <label for="launchdate">Launch Date</label>
                <input type="date" name="edit_launchdate" id="edit_launchdate" class="form-control">
              </div>
              <div class="form-group">
                <label for="eventvenue">Event Venue</label>
                <input type="text" name="edit_eventvenue" id="edit_eventvenue" class="form-control">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <input type="submit" name="update" id="update" value="Update" class="btn btn-primary btn-sm">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container my-3">
    <div class="row">
      <div class="col-4">
        <div class="card">
          <div class="card-header"><strong>Add Event</strong></div>
          <div class="card-body">
            <form action="events.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="eventtitle">Event Title</label>
                <input type="text" name="eventtitle" id="eventtitle" class="form-control">
              </div>
              <div class="form-group">
                <label for="eventauthor">Event Author</label>
                <input type="text" name="eventauthor" id="eventauthor" class="form-control">
              </div>
              <div class="form-group">
                <label for="launchdate">Launch Date</label>
                <input type="date" name="launchdate" id="launchdate" class="form-control">
              </div>
              <div class="form-group">
                <label for="eventvenue">Event Venue</label>
                <input type="text" name="eventvenue" id="eventvenue" class="form-control">
              </div>
              <div class="form-group">
                <label for="eventimg">Choose Image</label>
                <input type="file" name="eventimg" id="eventimg" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" value="Add" name="add" id="add" class="btn btn-primary btn-sm btn-block">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <table id="myTable">
              <thead>
                <th>Sno</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Venue</th>
                <th>Image</th>
                <th>Actions</th>
              </thead>
              <tbody>
                <?php
                $sql = "select * from events_tbl";
                $result = $conn->query($sql);
                if ($result) {
                  $sno = 0;
                  while ($rows = $result->fetch_assoc()) {
                    echo '<tr>
                          <td>' . ++$sno . '</td>
                          <td>' . $rows['eventtitle'] . '</td>
                          <td>' . $rows['eventauthor'] . '</td>
                          <td>' . $rows['launchdate'] . '</td>
                          <td>' . $rows['eventvenue'] . '</td>
                          <td> <img width="50px" src="' . $rows['eventimg'] . '"/></td>
                          <td> <button data-toggle="modal" data-target="#addModal" class="edits btn btn-primary btn-sm" id="' . $rows['eventid'] . '">Edit</button> <button id="d' . $rows['eventid'] . '" class="mt-1 deletes btn btn-danger btn-sm">Delete</button> </td>
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
        id = e.target.id.substr(1, );
        if (confirm("Are you sure you want to delete this event ?")) {
          window.location = `delete_event.php?eventid=${id}`;
        }
      })
    })


    edits = document.getElementsByClassName('edits');
    Array.from(edits).forEach((element)=>{
      element.addEventListener('click',(e)=>{

        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName('td')[1].innerText;
        author = tr.getElementsByTagName('td')[2].innerText;
        launchdate = tr.getElementsByTagName('td')[3].innerText;
        venue = tr.getElementsByTagName('td')[4].innerText;
        
        edit_eventtitle.value = title;
        edit_eventauthor.value = author;
        edit_launchdate.value = launchdate;
        edit_eventvenue.value = venue;
        eventid.value = e.target.id;

        console.log(eventid.value);
        $('#editModal').modal('toggle');
      })
    })
  </script>
</body>

</html>