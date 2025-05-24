<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Permai</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <style>
     * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    height: 100vh;
    background: linear-gradient(to right, #5cb85c, #a2d5a2);
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

.login-header span {
    font-size: 24px;
    font-weight: bold;
    display: block;
    text-align: center;
    margin-bottom: 20px;
    color: #398439; /* hijau gelap */
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
    color: #5cb85c;
}

.icon {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    font-size: 18px;
    color: #5cb85c;
}

.remember-forgot {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    margin-bottom: 20px;
}

.remember-me input {
    margin-right: 5px;
}

.forgot a {
    text-decoration: none;
    color: #5cb85c;
}

.input-submit {
    width: 100%;
    padding: 10px;
    background: #5cb85c;
    border: none;
    color: white;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
}

.input-submit:hover {
    background: #398439;
}

.register {
    text-align: center;
    font-size: 14px;
    margin-top: 15px;
}

.register a {
    text-decoration: none;
    color: #5cb85c;
}

@media (max-width: 480px) {
    .wrapper {
        padding: 20px;
    }

    .input-field {
        padding: 10px 35px 10px 10px;
    }

    .icon {
        font-size: 16px;
    }
}
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="login_box">
            <div class="login-header">
                <span>Login</span>
            </div>

            <!-- FORM LOGIN -->
            <form action="proses_login.php" method="POST">
                <div class="input_box">
                    <input type="text" id="email" name="email" class="input-field" required>
                    <label for="email" class="label">Email</label>
                    <i class="bx bx-user icon"></i>
                </div>

                <div class="input_box">
                    <input type="password" id="password" name="password" class="input-field" required>
                    <label for="password" class="label">Password</label>
                    <i class="bx bx-lock-alt icon"></i>
                </div>

                <div class="remember-forgot">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <div class="forgot">
                        <a href="ubah_password.php">Forgot password?</a>
                    </div>
                </div>

                <div class="input_box">
                    <input type="submit" class="input-submit" value="Login">
                </div>
            </form>

            <div class="register">
                <span>Don't have an account? <a href="proses_register.php">Register</a></span>
            </div>
        </div>
    </div>
</body>
</html>
