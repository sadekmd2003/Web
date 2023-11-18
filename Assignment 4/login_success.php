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
        .upper-background {
            background: #561919;
            height: 50%;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
        }

        .logout-button {
            background-color: #333;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 20px;
        }

        .lower-background {
            height: 50%;
            width: 100%;
            background: #4caf50;
            position: fixed;
            bottom: 0;
            left: 0;
        }
        
        .ellipse {
            position: fixed;
            border-radius: 50px;
            padding: 10px 20px;
        }

        .ellipse-1 {
            background: #a60000;
            top: 20%;
            left: 46%;
        }

        .ellipse-2 {
            background: #19563c;
            bottom: 22%;
            left: 42%;
        }

        #dropdown{
            line-height: 40px;
            background: #a60000;
            color: white;
            width: 80px;
            text-align: center;
            margin-top: 20px;
            margin-left: 15px;
            border: 5px;
            border-radius: 5px;
        }

        .dropdown-content {  
            display: none;
            position: relative;
            background-color: #a60000;
            min-width: 115px;
            border: 1px solid black;
        }

        #dropdown .dropdown-item:hover{
            background-color: #561919;
        }
        #dropdown:hover .dropdown-content {
            display: block;
        }

        #dropdown ul{
            padding: 0;
            margin: 0;
        }
        #dropdown li{
            font-weight: normal;
            list-style-type: none;
            background: #a60000;
        }

        .center-menu{
            text-align: center;
        }

        .dropdown-content a{
            text-decoration: none;
            color: white;
        }       
    </style>
</head>
<body>
    <div class="upper-background">
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
        <div style="
            color: white;
            font-size: 20px;
            top: 20px;
            position: absolute;
            right: calc(25px);">
            Welcome <?php echo $_SESSION["username"]; ?>
        </div>
        <button style="background-color: #a60000;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 12%;
            right: 25px;"
            onclick="location.href='?logout=true'"
        >
            Logout
        </button>
    </div>
    <a href="gallery.php">
        <div class="ellipse ellipse-1" style="font-size: xx-large; color: black;">
            Gallery
        </div>
    </a>
    <div class="lower-background">
        <a href="cv.php">
            <div class="ellipse ellipse-2" style="font-size: xx-large; color: black;">
                Curriculum Vitae
            </div>
        </a>
    </div>
</body>
</html>
