<?php
session_start();
include 'system.php';

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือไม่

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    // เรียกใช้ข้อมูลผู้ใช้
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id']; // เก็บค่า ID ของผู้ใช้
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foreach</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div id="preloader"></div>
    <div style="display:flex; align-items:center; justify-content:center;  height:100px; box-shadow:#d6d6d6 3px 3px 3px ;">

        <div style="width: 90%;height:100px; display:flex; align-items:center; justify-content:space-between; ">
            <div class="logo">
                <img style="width: 150px; height:150px;" src="books-removebg-preview.png" alt="">
            </div>
            <div style="width:150px ; height:100%">
                <ul style="list-style: none; display:flex; align-items:center; gap:20px;">
                    <img style="margin-top:20px; width:60%; height:60%; border-radius: 100%;" src="profile/<?php echo $_SESSION['profile']; ?>" alt="">
                    <li><a style="color:#66B2FF; text-decoration:none; font-weight:bold; " href="index.php">X</a></li>
                </ul>
            </div>
        </div>

    </div>
    <center>
        <div style="display: flex; align-items:center; margin-top:20px;  width:100%;">
            <div>
                <img style="margin-top:20px; width:70%; height:80%; margin-left:100px;" src="https://static.vecteezy.com/system/resources/previews/013/308/230/non_2x/isometric-illustration-of-the-people-engaged-in-the-creation-of-the-website-programming-programming-languages-teamwork-and-joint-problem-solving-free-vector.jpg" alt="">
            </div>
            <div>
                <div style="width:50%;">
                    <div style="display:flex; justify-content:center;">
                        <img style="margin-top:20px; width:30%; height:30%; border-radius: 100%; background-color:#f2f2f2 ;" src="profile/<?php echo $_SESSION['profile']; ?>" alt="">
                    </div>
                    <h2 style="color:#66B2FF;">Welcome user
                        <?php echo $username; ?>
                    </h2>
                    <p style="color:#0e032e;">welcome
                        <?php echo $username; ?> to web-app management books
                    </p>
                    <div style="color:#b6b6b6;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt amet sint maxime dignissimos laudantium? Labore a eligendi excepturi libero in explicabo, dolor quae maiores laboriosam.
                    </div>
                    <div>
                        <button style="margin-top: 15px; color:#000; background-color:#fff; box-shadow:#d6d6d6 1px 1px 1px 1px ; border:none ;  padding:10px;"><a style="text-decoration: none; color:#66B2FF;" href="dashboard.php">BOOKS YOUR STOCK</a></button>
                    </div>
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
            }, 1000);
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


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
        background-color: #fff;
        padding: 0;
        margin: 0;
    }
</style>