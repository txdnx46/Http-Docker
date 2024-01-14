<?php
session_start();

include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sqlchech = "SELECT id FROM users WHERE username = '$username'";
    $resultc = mysqli_query($conn, $sqlchech);


    if ($resultc->num_rows > 1) {
        $error = "username is already taken";
    } else {
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $conn->insert_id;
            header("Location: index.php");
        } else {
            $error = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        #preloader{
        background: #fff url(w.gif) no-repeat center center;
        height: 100vh;
        width: 100%;
        position: fixed;
        z-index: 100;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        button {
            background-color: #dc3545;
            color: white;
            cursor: pointer;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
        }

        button:hover {
            background-color: #c82333;
        }

        .error {
            color: #d9534f;
            margin-top: 10px;
        }
    </style>



    <div id="preloader"></div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>สมัครสมาชิก</h2>
        <label for="username">ชื่อผู้ใช้</label>
        <input type="text" name="username" required>

        <label for="password">รหัสผ่าน</label>
        <input type="password" name="password" required>

        <label for="email">อีเมล</label>
        <input type="email" name="email" required>

        <input type="submit" value="สมัครสมาชิก">
        <button><a href="index.php" style="text-decoration: none; color: white;">ล็อคอิน</a></button>

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