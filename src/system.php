<?php
include 'conn.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];


// Add Book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];

    $image_name = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $image_path = "uploads/" . $image_name;
    move_uploaded_file($image_temp, $image_path);

 
    $sql = "INSERT INTO books (user_id, title, author, image) VALUES ('$user_id', '$title', '$author','$image_name')";
    mysqli_query($conn, $sql);


    header("Location: dashboard.php");
    exit();
}


// Edit Book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_book'])) {
    
    $edited_title = $_POST['edit_title'];
    $edited_author = $_POST['edit_author'];
    $book_id = $_POST['book_id'];

    $edited_image_name = $_FILES['edit_image']['name'];
    $edited_image_temp = $_FILES['edit_image']['tmp_name'];
    $edited_image_path = "uploads/" . $edited_image_name;
    move_uploaded_file($edited_image_temp, $edited_image_path);
   
    $sql = "UPDATE books SET title='$edited_title', author='$edited_author' ,image ='$edited_image_name' WHERE id='$book_id' AND user_id='$user_id'";
    mysqli_query($conn, $sql);

 
    header("Location: dashboard.php");
    exit();
}

// Delete Book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_book'])) {
    $book_id = $_POST['book_id'];


    $sql = "DELETE FROM books WHERE id='$book_id' AND user_id='$user_id'";
    mysqli_query($conn, $sql);
}

// Fetch Books
$sql = "select * from books where user_id = '$user_id'";
$result = mysqli_query($conn,$sql);
$books = $result->fetch_all(MYSQLI_ASSOC);
