<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
         document.addEventListener('DOMContentLoaded', function () {
            var signupForm = document.getElementById('signupForm');
            var errorContainer = document.getElementById('errorContainer');

            signupForm.addEventListener('submit', function (event) {
                event.preventDefault();

                var username = document.getElementById('username').value;
                var password = document.getElementById('password').value;
                var confirmPassword = document.getElementById('confirmPassword').value;

                errorContainer.innerHTML = ''; 

                if (password !== confirmPassword) {
                    displayError('Password and Confirm Password do not match.');
                    return;
                }

                if (!isPasswordValid(password)) {
                    displayError('Password must be at least 7 characters long and contain at least 1 uppercase letter and 1 number.');
                    return;
                }

                signupForm.submit();
            });

            function isPasswordValid(password) {
                if (password.length < 7) {
                    return false;
                }

                if (!/[A-Z]/.test(password)) {
                    return false;
                }

                if (!/\d/.test(password)) {
                    return false;
                }

                return true;
            }

            function displayError(message) {
                var errorParagraph = document.createElement('p');
                errorParagraph.className = 'error-message';
                errorParagraph.textContent = message;
                errorContainer.appendChild(errorParagraph);
            }
        })
    </script>
</head>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #561919;
            position: fixed;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .signup-page {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .content-container {
            border: 3px solid #a60000;
            padding: 0px 50px 0px 35px;
        }

        .signup-page h2 {
            margin-bottom: 15px;
        }

        .signup-page input,
        .signup-page select,
        .signup-page input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .signup-page label {
            font-size: 18px;
        }

        .signup-page button {
            width: 105%;
            padding: 8px;
            font-size: 16px;
            background-color: #a60000;
            color: #fff;
            border: none;
            outline: none;
            cursor: pointer;
        }

        .signup-page button:hover {
            background-color: #ff0000;
        }

        .signup-page .radio-group {
            display: flex;
            padding: 5px 10px 5px 0px;
        }

        .signup-page .radio-group label {
            display: flex;
        }

        .signup-page .radio-group label {
            margin-right: 20px;
        }

        .signup-page .region-options {
            width: 100%;
        }
        .back {
            margin-top: 5px;
            margin-right: 10px;
            display: inline-block;
            color: #ff0000;
            font-size: 18px;
            text-decoration: none;
        }

        .back:last-child {
            margin-top: 18px;
        }

        .error-message {
            color: #ff0000;
        }
    </style>
    <title>Signup</title>
</head>

<body>
    <div class="signup-page">
        <div class="content-container">
        <form id="signupForm" action="signup_check.php" method="POST">
                <h2>Signup</h2>
                <?php
                    $username = '';
                    $fullName = '';
                    $password = '';
                    $sex = 'male'; 
                    $region = 'Akkar';
                    $dob = '';
                    if (isset($_GET['error']) && $_GET['error'] == 'username_taken') {
                        $username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';
                        $fullName = isset($_GET['fullName']) ? htmlspecialchars($_GET['fullName']) : '';
                        $password = isset($_GET['password']) ? htmlspecialchars($_GET['password']) : '';
                        $sex = isset($_GET['sex']) ? htmlspecialchars($_GET['sex']) : '';
                        $region = isset($_GET['region']) ? htmlspecialchars($_GET['region']) : '';
                        $dob = isset($_GET['dob']) ? htmlspecialchars($_GET['dob']) : '';
                    }
                ?>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br>

                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" value="<?php echo $fullName; ?>" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo $password; ?>" required><br>

                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" value="<?php echo $password; ?>" required><br>

                <div class="radio-group">
                    <label>
                        Sex:
                    </label>
                    <label for="male">
                        <input type="radio" id="male" name="sex" value="male" required <?php echo ($sex == 'male') ? 'checked' : ''; ?>>
                        Male
                    </label>
                    <label for="female">
                        <input type="radio" id="female" name="sex" value="female" required <?php echo ($sex == 'female') ? 'checked' : ''; ?>>
                        Female
                    </label>
                </div>

                <label for="region" class="region-options">Region:</label>
                <select id="region" name="region" class="region-options" required>
                    <option value="Akkar" <?php echo ($region == 'Akkar') ? 'selected' : ''; ?>>Akkar</option>
                    <option value="Baalbeck-Hermel" <?php echo ($region == 'Baalbeck-Hermel') ? 'selected' : ''; ?>>Baalbeck-Hermel</option>
                    <option value="Beirut" <?php echo ($region == 'Beirut') ? 'selected' : ''; ?>>Beirut</option>
                    <option value="Bekaa" <?php echo ($region == 'Bekaa') ? 'selected' : ''; ?>>Bekaa</option>
                    <option value="Mount Lebanon" <?php echo ($region == 'Mount Lebanon') ? 'selected' : ''; ?>>Mount Lebanon</option>
                    <option value="North Lebanon" <?php echo ($region == 'North Lebanon') ? 'selected' : ''; ?>>North Lebanon</option>
                    <option value="Nabatiyeh" <?php echo ($region == 'Nabatiyeh') ? 'selected' : ''; ?>>Nabatiyeh</option>
                    <option value="South Lebanon" <?php echo ($region == 'South Lebanon') ? 'selected' : ''; ?>>South Lebanon</option>
                </select><br>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required><br>

                <button type="submit" class="button">Signup</button>
            </form>
            <div id="errorContainer">
                <?php
                    if (isset($_GET['error']) && $_GET['error'] == 'username_taken') {
                        echo '<p style="color: #ff0000;">Username is already taken. Please choose another username.</p>';
                    }
                ?>
            </div>
            <p>You already have an account? <a class="back" href="login.php"><strong>Login</strong></a>
            <br>
            <a class="back" href="index.html"><strong>Back</strong></a></p>
        </div>
    </div>
</body>

</html>