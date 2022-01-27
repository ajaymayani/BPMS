<?php
include '../partial/_config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $bookname  = $_POST['bookname'];
    $bookcategory  = $_POST['bookcategory'];
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

    $target_dir = "uploads/books/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql ="INSERT INTO `booksinfo_tbl`(`bookname`,`book_cate_id`, `authorid`, `ISBN`, `pyear`, `booktype`, `bookpage`, `language`, `booksize`, `bookrights`, `bookprice`, `aboutbook`, `bookurl`) VALUES ('$bookname','$bookcategory','$authorname','$ISBN','$pyear','$booktype','$bookpage','$language','$booksize','$bookrights','$bookprice','$aboutbook','$target_file')";
    $result = $conn->query($sql);
    if($result)
    {
        echo "success";
        header("location:add_book.php");
    }else{
        echo "failed ".$conn->error;
    }
}
?>