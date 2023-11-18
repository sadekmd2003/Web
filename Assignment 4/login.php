<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #4caf50;
            position: fixed;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .login-page {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .content-container {
            border: 3px solid #19563c;
            padding: 25px 50px 10px 35px;
        }

        .login-page h2 {
            margin-bottom: 20px;
        }

        .login-page input {
            width: 100%;
            padding: 8px;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .login-page label {
            font-size: 18px;
        }

        .login-page button {
            width: 108%;
            padding: 8px;
            font-size: 16px;
            background-color: #19563c;
            color: #fff;
            border: none;
            outline: none;
            cursor: pointer;
        }

        .login-page button:hover {
            background-color: #333;
        }

        .back {
            margin-top: 0px;
            margin-right: 10px;
            display: inline-block;
            color: #195631;
            font-size: 18px;
            text-decoration: none;
        }

        .back:last-child {
            margin-top: 18px;
            margin-right: 10px;
            display: inline-block;
            color: #195631;
            font-size: 18px;
            text-decoration: none;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="login-page">
        <div class="content-container">
            <form id="loginForm" action="login_check.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>

                <button type="submit" class="button">Login</button>
            </form>
            <?php
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                    echo '<p style="color: #195631;font-size: 17px; margin-top:20px; margin-bottom=0px;">Incorrect username or password.</p>';
                }
                ?>
            <p>You don't have an account? <a class="back" href="signup.php"><strong>Signup</strong></a>
            <br>
            <a class="back" href="index.html"><strong>Back</strong></a></p>
        </div>
    </div>
</body>

</html>
