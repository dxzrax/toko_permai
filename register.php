<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Enkripsi password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Simpan ke database
  $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

  if (mysqli_query($conn, $sql)) {
    echo "Registrasi berhasil!";
    header("Location: login.php");
    exit();
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Toko Permai</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        .register-header span {
            font-size: 24px;
            font-weight: bold;
            display: block;
            text-align: center;
            margin-bottom: 20px;
            color: #4e54c8;
        }

        .input_box {
            position: relative;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 10px 40px 10px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .label {
            position: absolute;
            top: -10px;
            left: 10px;
            background: #fff;
            font-size: 12px;
            padding: 0 5px;
            color: #4e54c8;
        }

        .icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            font-size: 18px;
            color: #4e54c8;
        }

        .input-submit {
            width: 100%;
            padding: 10px;
            background: #4e54c8;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .input-submit:hover {
            background: #3e44b8;
        }

        .login-link {
            text-align: center;
            font-size: 14px;
            margin-top: 15px;
        }

        .login-link a {
            text-decoration: none;
            color: #4e54c8;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="register_box">
            <div class="register-header">
                <span>Register</span>
            </div>

            <form action="proses_register.php" method="POST">
                <div class="input_box">
                    <input type="email" id="email" name="email" class="input-field" required>
                    <label for="email" class="label">Email</label>
                    <i class="bx bx-envelope icon"></i>
                </div>

                <div class="input_box">
                    <input type="password" id="password" name="password" class="input-field" required>
                    <label for="password" class="label">Password</label>
                    <i class="bx bx-lock-alt icon"></i>
                </div>

                <div class="input_box">
                    <input type="submit" class="input-submit" value="Register">
                </div>
            </form>

            <div class="login-link">
                <span>Sudah punya akun? <a href="index.php">Login</a></span>
            </div>
        </div>
    </div>
</body>
</html>
