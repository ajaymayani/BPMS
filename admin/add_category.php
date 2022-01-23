<?php include'../partial/_config.php';
$cat_name="";
$inserted = false;

    if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql = "select * from books_category_tbl where id = ".$id;
        $result = $conn->query($sql);
        if($result)
        {
            while($row = $result->fetch_assoc())
            {
                $id = $row['id'];
                $cat_name  = $row['cat_name'];
            }
        }
    }

    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['add']))
    {
        $category = $_POST['category'];
        $sql = "INSERT INTO books_category_tbl (`cat_name`) VALUES ('$category')";
        $result = $conn->query($sql);
        if($result)
        {
            $inserted  = true;
        }
        else{
            $inserted = false;
            echo "Error :".$conn->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Category</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <style>
        body {
            background-color: #9f9da7;
        }
    </style>
</head>

<body>
    <?php include 'partial/_nav.php'; 
        if($inserted)
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success !</strong> Book category has been added successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        }
    ?>

    <div class="container mt-3">
        <div class="card">
            <div class="card-header">Add Category</div>
            <div class="card-body">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <form action="add_category.php" method="POST">
                            <div class="form-group">
                                <label for="category">Book Category</label>
                                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                <input type="text" name="category" id="category" class="form-control" value="<?php echo $cat_name; ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="add" id="add" value="Add" class="btn btn-primary btn-sm">
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-6">
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
                                     if($result){
                                         $sno=0;
                                         while($rows = $result->fetch_assoc())
                                         {
                                             echo '<tr>
                                                <td>'.++$sno.'</td>
                                                <td>'.$rows['cat_name'].'</td>
                                                <td><a href="add_category.php?id='.$rows['id'].'" class="btn btn-info btn-sm">Edit</a> <a class="btn btn-danger btn-sm deletes" href="#" id="'.$rows['id'].'">Delete</a></td>
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
        Array.from(deletes).forEach((element)=>{
            element.addEventListener('click',(e)=>{
                id = e.target.id;
                if(confirm("Are you sure you want to delete this category....?"))
                {
                    window.location =`category_delete.php?id=${id}`;
                }
            })
        });
    </script>
</body>

</html>