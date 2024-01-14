<?php 
    session_start();
    include 'conn.php' ; 

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "select * from users where username = '$username' and password = '$password'";
        $result = mysqli_query($conn,$sql);

        if ($result->num_rows == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $result->fetch_assoc()['id'];
            header("Location: dashboard.php");
        }else{
            $error = "รหัสผ่าน / ชื่อผู้ใช้   ไม่ถูกต้อง";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        button {
            background: none;
            border: none;
            cursor: pointer;
            color: #007BFF;
            text-decoration: underline;
        }

        button:hover {
            text-decoration: none;
        }

        p.error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div id="preloader"></div>
   
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>ลงชื่อเข้าใช้งานระบบ</h2>
        <label for="username">ชื่อผู้ใช้</label>
        <input type="text" name="username" required><br>

        <label for="password">รหัสผ่าน</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="เข้าสู่ระบบ">
        <button><a href="register.php">สมัครสมาชิก</a></button>
        <?php
            if (isset($error)) {
                echo "<p class='error'>$error</p>";
            }
        ?>
    </form>

    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function() {
            setTimeout(function() {
                loader.style.display = "none";
            }, 800);
        });
    </script>

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
</style>