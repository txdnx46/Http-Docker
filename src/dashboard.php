<?php
session_start();

include 'system.php';

$sql = "SELECT COUNT(*) AS total_books FROM books WHERE user_id = '$user_id'";
$count = $conn->query($sql);

$total_books = 0; // กำหนดค่าเริ่มต้นให้เป็น 0

if ($count->num_rows > 0) {
    $row = $count->fetch_assoc();
    $total_books = $row['total_books'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div style="display:flex; align-items:center; justify-content:center; background-color:#fff; height:100px; box-shadow:#d6d6d6 3px 3px 3px ;">
        <div style="width: 90%;height:100px; display:flex; align-items:center; justify-content:space-between;">
            <div class="logo">
                <img style="width: 150px; height:150px" src="books-removebg-preview.png" alt="">
            </div>
            <ul style="list-style: none; display:flex;   align-items:center; gap:20px;">
                <li><a style="color:#0e032e; text-decoration:none; font-weight:bold; ">EXIT</a></li>
                <li><a style="color:#66B2FF; text-decoration:none; font-weight:bold; " href="page.php">X</a></li>
            </ul>
        </div>
    </div>

    <center>
        <div class="container" style="margin:25px; width:100%; margin-top:25px">
            <div class="" style="width:900px;">
                <form style="display:flex;" method="post" action="" enctype="multipart/form-data" class="mb-4 mt-3">
                    <input style="padding: 10px; margin:5px; width:100%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none ;" type="text" name="title" class="form-control" placeholder="booksname" required><br>
                    <input style="padding: 10px; margin:5px; width:100%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none ;" type="text" name="author" class="form-control" placeholder="autorname" required><br>
                    <input style="padding: 10px; margin:5px; width:150%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none ;" name="image" class="form-control" type="file" id="formFile"><br>
                    <button style="padding: 10px; margin:5px; width:100%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none; background-color:#0e032e; color:#fff;" type="submit" name="add_book" class="btn ">BOOKSADD</button>
                </form>
            </div>
        </div>
        <div style="display:flex; justify-content:space-between; align-items: center; width:200px ;border-radius: 5px; background-color: #fff;box-shadow:#d6d6d6 1px 1px 1px 1px ; ">
            <div>
                <img style=" height:15%; width:80px; border-radius: 100%;" src="profile/<?php echo $_SESSION['profile']; ?>" alt="">
            </div>
            <div style="display:grid ; height:15% ; width:40%; background-color: #0e032e; color:#fff; border-radius: 5%;">
                <p>Books Quantity</p>
                <h4><?php echo $total_books; ?></h4>
            </div>
        </div>
    </center>


    <div>
        <div class="dis">

            <div>

                <div class="row" style="margin:150px; margin-top:25px; display:flex; justify-content: center;">
                    <?php foreach ($books as $book) : ?>
                        <div class="col-md-4 mb-5" style="width:280px">
                            <div class="card mt-2">
                                <img src="uploads/<?php echo $book['image']; ?>" class="card-img-top img-fluid" alt="<?php echo $book['title']; ?>" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $book['title']; ?>
                                    </h5>
                                    <p class="card-text">วันที่เบันทึก:
                                        <?php echo $book['author']; ?>
                                    </p>
                                </div>
                                <div class="card-footer" style="display:flex; justify-content:space-around;">
                                    <!-- Inside the existing loop -->
                                    <button type="button" class="btnedit" style="background-color: #0e032e; width:140px; padding:5px; color:#fff; border-radius: 5px; " data-bs-toggle="modal" data-bs-target="#edit<?php echo $book['id']; ?>" data-bookid="<?php echo $book['id']; ?>">
                                        แก้ไข
                                    </button>
                                    <!-- โมเดล การเข้าอัพเดต -->
                                    <center>
                                        <div class="modal fade" id="edit<?php echo $book['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="margin: 50px; " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel" style="color:#0e032e;">BOOKNAME <?php echo $book['title']; ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-3" style="display:flex; width:100%; gap:100px; justify-content:center;">
                                                        <!--editfrom book -->
                                                        <form method="post" action="" enctype="multipart/form-data">
                                                            <div class="mb-3">
                                                                <input style="padding: 10px; margin:5px; width:70%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none ;" type="text" class="form-control" id="editTitle" name="edit_title" value="<?php echo $book['title']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <input style="padding: 10px; margin:5px; width:70%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none ;" type="text" class="form-control" id="editAuthor" name="edit_author" value="<?php echo $book['author']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <input style="padding: 10px; margin:5px; width:70%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none ;" type="file" class="form-control" id="editImage" name="edit_image" required><br>
                                                                <label style="color:red">Please fill in the photo again to confirm the edit.!</label>
                                                            </div>
                                                            <img style="width:350px; height:250px;" src="https://blog.payproglobal.com/hubfs/revenue-growth-png.png" alt="">
                                                            <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                                                            <button type="submit" class="btn" style="background-color: #0e032e; color:#fff; width:70%;  border-radius: 5px; " name="edit_book"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                                                    <path d="M11 2H9v3h2z" />
                                                                    <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                                                                </svg></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </center>
                                    <!-- การทำงานของ delete อยู่ตรงนี้ -->
                                    <form method="post" action="">
                                        <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                                        <button type="submit" name="delete_book" style="background-color: #fff;  padding:5px;  width:60px; color:#000;  border-radius: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                            </svg></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>