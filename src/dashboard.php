<?php
session_start();
include 'system.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div id="preloader"></div>

    <div class="container mt-5">

        <div class="a">
            <div class="w">
                <h2>ยินดีต้อนรับคุณ <?php echo $username; ?>!</h2>
                <p>ตอนนี้คุณ <?php echo $username; ?> ได้อยู่ที่หน้าจัดการหนังสือของตัวเองเเล้ว</p>
            </div>
            <a href="index.php" class="btn btn-danger m-3">ออกจากระบบ</a>
        </div>

        <!-- เพิ่ม -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" class="mb-4 mt-3">
            <div class="mb-3">
                <label for="title" class="form-label">ชื่อหนังสือ</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">วันที่เพิ่ม</label>
                <input type="text" name="author" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">เพิ่มรูปภาพ</label>
                <input type="file" name="image" class="form-control-file" accept="image/*" required>
            </div>
            <div class="mt-2">
                <img id="previewImg" class="img-preview">
            </div>

            <button type="submit" name="add_book" class="btn btn-success">เพิ่มหนังสือ</button>
        </form>


        <!-- แสดง -->
        <h3>หนังสือของคุณ <?php echo $username; ?></h3>

        <div class="row">
            <?php foreach ($books as $book) : ?>
                <div class="col-md-2 mb-3">
                    <div class="card mt-3">
                        <img src="uploads/<?php echo $book['image']; ?>" class="card-img-top img-fluid" alt="<?php echo $book['title']; ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $book['title']; ?></h5>
                            <p class="card-text">วันที่เบันทึก: <?php echo $book['author']; ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $book['id']; ?>">แก้ไข</button>

                            <!-- การทำงานของ delete อยู่ตรงนี้ -->
                            <form method="post" action="" class="d-inline">
                                <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                                <button type="submit" name="delete_book" class="btn btn-danger">ลบทิ้ง</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="edit<?php echo $book['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">แก้ไขหนังสือ: <?php echo $book['title']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Your form for editing a book -->
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="editTitle" class="form-label">หัวข้อหนังสือ</label>
                                        <input type="text" class="form-control" id="editTitle" name="edit_title" value="<?php echo $book['title']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editAuthor" class="form-label">ผู้แต่ง</label>
                                        <input type="text" class="form-control" id="editAuthor" name="edit_author" value="<?php echo $book['author']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editImage" class="form-label">รูปภาพ</label>
                                        <input type="file" class="form-control" id="editImage" name="edit_image">
                                    </div>

                                    <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                                    <button type="submit" class="btn btn-primary" name="edit_book">บันทึกการแก้ไข</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function() {
            setTimeout(function() {
                loader.style.display = "none";
            }, 800);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<style>
    #preloader{
        background: #fff url(w.gif) no-repeat center center;
        height: 100vh;
        width: 100%;
        position: fixed;
        z-index: 100;
    }
 .a {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>