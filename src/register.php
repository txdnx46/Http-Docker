<?php
// เริ่ม session ใน PHP
session_start();

// นำเข้าไฟล์ conn.php ซึ่งมีการเชื่อมต่อกับฐานข้อมูล
include 'conn.php';

// ตรวจสอบว่ามีการส่งข้อมูลผ่านวิธี POST หรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    // รับค่าจากฟอร์มที่ถูกส่งมาผ่าน POST
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $imagename = $_FILES['imageprofile']['name'];
    $imagetemp = $_FILES['imageprofile']['tmp_name'];
    $imagepath = "profile/" . $imagename;
    move_uploaded_file($imagetemp, $imagepath);

    // สร้างคำสั่ง SQL เพื่อตรวจสอบว่ามีชื่อผู้ใช้นี้ในฐานข้อมูลแล้วหรือไม่
    $sqlchech = "SELECT id FROM users WHERE username = '$username'";

    // ส่งคำสั่ง SQL ไปทำการค้นหาในฐานข้อมูล
    $resultc = mysqli_query($conn, $sqlchech);

    // ตรวจสอบว่ามีผลลัพธ์จากคำสั่ง SQL ที่ส่งมากี่แถว
    if ($resultc->num_rows >= 1) {
        // ถ้ามีแถวมากกว่าหรือเท่ากับ 1 แถว แสดงว่ามีชื่อผู้ใช้นี้ในระบบแล้ว
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านนี้มีใช้อยู่เเล้ว')</script>";
    } else {
        // ถ้าไม่มีชื่อผู้ใช้นี้ในระบบ ทำการเพิ่มข้อมูลผู้ใช้ในฐานข้อมูล
        $sql = "INSERT INTO users (username, password, email, image) VALUES ('$username', '$password', '$email','$imagename')";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('สมัครเสร็จสิ้น')</script>";
        // ตรวจสอบว่าการเพิ่มข้อมูลผู้ใช้เสร็จสมบูรณ์หรือไม่
        if ($result) {
            // ถ้าเสร็จสมบูรณ์ กำหนดค่า session 
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $conn->insert_id;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div id="preloader"></div>

    <div style="display:flex; align-items:center; justify-content:center; background-color:#fff; height:100px; box-shadow:#d6d6d6 3px 3px 3px ;">
        <div style="width: 90%;height:100px; display:flex; align-items:center; justify-content:space-between;">
            <div class="logo">
                <img style="width: 150px; height:150px" src="books-removebg-preview.png" alt="">
            </div>
            <ul style="list-style: none; display:flex;   align-items:center; gap:20px;">
                <li><a style="color:#0e032e; text-decoration:none; font-weight:bold; " href="index.php">SINGIN</a></li>
                <li><a style="color:#66B2FF; text-decoration:none; font-weight:bold; " href="index.php">X</a></li>
            </ul>
        </div>
    </div>

    <center>
        <div class="container" style="margin:25px; width:1100px; height:400px; margin-top:50px">
            <div class="" style="width:900px;">
                <div style="padding: 15px; display:flex; justify-content:space-between; gap:25px;">
                    <img style="width:400px; height:350px" src="https://pixal.io/wp-content/uploads/2022/03/sdfsdfsdfsdfsdfdfs-e1648128399407-300x300.png" alt="">
                    <form method="post" action="" enctype="multipart/form-data">
                        <h2>REGISTER</h2>
                        <input style="padding: 15px; margin:10px; width:80%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none ;" type="text" name="username" placeholder="username" required>
                        <input style="padding: 15px; margin:10px; width:80%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none ;" type="password" name="password" placeholder="password" required>
                        <input style="padding: 15px; margin:10px; width:80%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none ;" type="email" name="email" placeholder="email" required><br>
                        <input style="padding: 15px; margin:10px; width:80%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none ;" type="file" name="imageprofile" required><br>
                        <input style="padding: 15px; margin:10px; width:87%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none; background-color:#fff;" class="sub" type="submit" name="submit" value="RESGISTER">
                    </form>
                </div>
            </div>
        </div>
    </center>

    <footer style=" position: fixed;
                    left: 0;
                    bottom: 0;
                    width: 100%;
                    background-color: red;
                    color: white;
                    text-align: center;
                    display: flex; 
                    justify-content:center; 
                    align-items: center; 
                    color:#d6d6d6; 
                    background-color:#0e032e; 
                    height:120px; gap:80px;  
                    box-shadow:#000 1px 5px 5px 1px ;
                    ">

        <div class="" style=" width:15%;">
            Tanarat Sudjai @2003 sub 18 dev php and database .
        </div>
        <div class="" style=" width:15%;">
            web managemant books mail bookspage2003@gmail.com .
        </div>
        <div class="" style=" width:15%;">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
        </div>

    </footer>

    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function() {
            setTimeout(function() {
                loader.style.display = "none";
            }, 100);
        });
    </script>
</body>

</html>


<style>
    #preloader {
        background: #fff url(a.gif) no-repeat center center;
        height: 100vh;
        width: 100%;
        position: fixed;
        z-index: 100;
    }

    body {
        margin: 0;
        padding: 0;
    }
</style>