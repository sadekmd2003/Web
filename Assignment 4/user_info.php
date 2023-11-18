<?php
    session_start();
    if (!isset($_SESSION["username"])){
        header("location: index.html");
    }
    if (isset($_GET["logout"])) {
        session_unset();
        session_destroy();
        header("location: index.html");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #561919;
            font-family: Arial, sans-serif;
            margin: 0; 
            padding: 0;
        }

        #dropdown {
            line-height: 40px;
            background: #19563c;
            color: white;
            width: 80px;
            text-align: center;
            margin-left: 15px;
            border: 5px;
            border-radius: 5px;
            position: absolute;
            top: 3%;
        }

        .dropdown-content {
            display: none;
            background-color: #19563c;
            min-width: 115px;
            border: 1px solid black;
            position: absolute;
            top: 40px;
        }

        #dropdown .dropdown-item:hover {
            background-color: #00ff7f;
            transition: background-color 0.3s;
        }

        #dropdown:hover .dropdown-content {
            display: block;
        }

        #dropdown ul {
            padding: 0;
            margin: 0;
        }

        #dropdown li {
            font-weight: normal;
            list-style-type: none;
            background: #19563c;
            padding: 0px;
        }

        .center-menu {
            text-align: center;
        }

        .dropdown-content a {
            text-decoration: none;
            color: white;
        }

        .user-info {
            width: 50%;
            margin: 50px auto;
            margin-top: 100px;
            padding: 20px;
            background-color: #19563c;
            border: 1px solid black;
            border-radius: 8px;
        }

        h2 {
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #00ff7f;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        button {
            background-color: #19563c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 6%;
            right: 2%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #00ff7f;
        }
    </style>
    <title>User Information</title>
</head>

<body>
    <div id="dropdown">
        <span><i class='icon'></i>MENU</span>
        <div class="dropdown-content">
            <ul>
            <a href="login_success.php">
                <li class="dropdown-item">
                Welcome Page
                </li>
            </a>
            <a href="gallery.php">
                <li class="dropdown-item">
                Gallery
                </li>
            </a>
            <a href="cv.php">
                <li class="dropdown-item">
                CV
                </li>
            </a>
            <a href="user_info.php">
                <li class="dropdown-item">
                User Info
                </li>
            </a>
            </ul>
        </div>
    </div>
    <div style="text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 25px;
            top:2%;
            right:2%;
            position: absolute;">
            Welcome <?php echo $_SESSION["username"]; ?>
        </div>   
        <button 
            onclick="location.href='?logout=true'"
        >
            Logout
        </button>
    <div class="user-info">
        <h2>User Information</h2>
        <table>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo $_SESSION['username']; ?></td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td><?php echo $_SESSION['full_name']; ?></td>
            </tr>
            <tr>
                <td>Sex</td>
                <td><?php echo $_SESSION['sex']; ?></td>
            </tr>
            <tr>
                <td>Region</td>
                <td><?php echo $_SESSION['region']; ?></td>
            </tr>
            <tr>
                <td>Birth Date</td>
                <td><?php echo $_SESSION['birth_date']; ?></td>
            </tr>
        </table>
    </div>
</body>

</html>
