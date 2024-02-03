<?php
session_start();

include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from users where username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows == 1) {
        // ถ้ามีเพียงแค่หนึ่งแถวในผลลัพธ์ แสดงว่าการเข้าสู่ระบบเสร็จสมบูรณ์

        // ตั้งค่าตัวแปร session สำหรับผู้ใช้ที่เข้าสู่ระบบ
        $_SESSION['username'] = $username;  // $username ถือว่าเป็นตัวแปรที่เก็บชื่อผู้ใช้
        $_SESSION['user_id'] = $result->fetch_assoc()['id'];  // ดึงค่าคอลัมน์ 'id' จากผลลัพธ์และเก็บไว้ใน session

        // นำผู้ใช้ไปยังหน้า dashboard.php
        header("Location: page.php");
    } else {
        // ถ้าผลลัพธ์ไม่มีแค่หนึ่งแถว แสดงว่าการเข้าสู่ระบบไม่สำเร็จ

        // แสดงแจ้งเตือนให้ผู้ใช้ทราบว่ามีข้อผิดพลาดเกี่ยวกับชื่อผู้ใช้หรือรหัสผ่าน
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง')</script>";
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
                <li><a style="color:#0e032e; text-decoration:none; font-weight:bold; " href="register.php">SINGUP</a></li>
                <li><a style="color:#66B2FF; text-decoration:none; font-weight:bold; " href="index.php">X</a></li>
            </ul>
        </div>
    </div>

 
        <div class="container" style="width:100%; height:10%; display:flex; justify-content:center;">
            <div style="margin:5%">
                <div style="padding: 15px; display:flex;  gap:15%;">
                    <form method="post" action="" style="width:500px;">
                        <h2 style="padding: 15px; margin:5px;">LOGIN UNSERNAME</h2>
                        <input style="padding: 15px; margin:10px; width:100%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none ;" type="text" name="username" placeholder="username" required><br>
                        <input style="padding: 15px; margin:10px; width:100%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none ;" type="password" name="password" placeholder="password" required><br>
                        <input style="padding: 15px; margin:10px; width:109%; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none; background-color:#fff;" class="sub" type="submit" value="LOGIN">
                    </form>
                    <img style="width:450px; height:400px; margin-top: -30px;" src="https://pd-cs.co.uk/wp-content/uploads/2021/03/Business-PNG-3-600x533.png" alt="">
                </div>
            </div>
        </div>


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
                    height:120px; gap:100px;  
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