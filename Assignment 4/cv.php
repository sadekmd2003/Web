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
    <link rel="stylesheet" href="styles/styles.css">
    <title>CV - Lebanese American University Student</title>
    <style>
    #dropdown {
        line-height: 40px;
        background: #4CAF50;
        color: white;
        width: 80px;
        text-align: center;
        margin-top: 8px;
        margin-left: 15px;
        border: 5px;
        border-radius: 5px;
        position: absolute;
        z-index: 2;
    }

    .dropdown-content {
        display: none;
        background-color: #4CAF50;
        min-width: 115px;
        border: 1px solid black;
    }

    #dropdown .dropdown-item:hover {
        background-color: #4CAF80;
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
        background: #4CAF50;
        padding: 0px;
    }

    .center-menu {
        text-align: center;
    }

    .dropdown-content a {
        text-decoration: none;
        color: white;
    }
    .background-section {
        background-color: #19563c;
        height: 50px;
        width: 100%;
        position: fixed;
        top: 0;
        z-index: 1;
    }
    button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 15%;
            right: 25px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #4CAF80;
        }
    </style>
</head>
<body>
    <div class="background-section">
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
            right: calc(95px);
            top:25%;
            position: absolute;">
            Welcome <?php echo $_SESSION["username"]; ?>
        </div>   
        <button 
            onclick="location.href='?logout=true'"
        >
            Logout
        </button>
    </div>
    <div class="container">
        <div class="sidebar">
            <div class="photo-section">
                <img src="icons and photos/icons/your-photo.jpg">
            </div>
            <div class="sidebar-content">
                <h1>Sadek Meheiddine</h1>
                <div class="info">
                    <div class="icon-text">
                        <img src="icons and photos/icons/Email.png">
                        <p>Sadek.md2003@gmail.com</p>
                    </div>
                </div>
                <div class="info">
                    <div class="icon-text">
                        <img src="icons and photos/icons/phone.jpg">
                        <p>+961 81 919 241</p>
                    </div>
                </div>
                <div class="info">
                    <div class="icon-text">
                        <img src="icons and photos/icons/github.png">
                        <a href="github.com/sadekmd2003">Github Account:<br>Sadekmd2003</a>
                    </div>
                </div>
                <div class="info">
                    <div class="icon-text">
                        <img src="icons and photos/icons/linkedin.png">
                        <a href="linkedin.com/in/sadek-meheiddine-080149253">Linkedin Account:<br>Sadek Meheiddine</a>
                    </div>
                </div>
                <div class="info">
                    <div class="icon-text">
                        <img src="icons and photos/icons/earth.png">
                        <p>Beirut - Lebanon</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="section-left">
                <section class="section">
                    <h2>Education</h2>
                    <div class="section-box">
                        <p style="font-size: larger;"><strong>Lebanese American University</strong></p>
                        <ul style="font-family: 'Courier New', Courier, monospace;">Bachelor of Science in Computer Science</ul>
                        <ul>Starting Semester: Fall 2021</ul>
                        <ul>Expected Graduation: May 2024</ul>
                        <ul style="color:rgb(20, 0, 132);">GPA: 3.48</ul>
                    </div>
                </section>
                <section class="section">
                    <h2>Projects</h2>
                    <div class="section-box">
                        <p><strong style="font-size: large;">Database Project</strong></p>
                            <ul id="projects">The database project consisted of the creation of an ER Model, the development of a schema design, the implementation of the schema on Oracle database, and finally normalizing the database</ul>
                        <p><strong style="font-size: large;">Software Engineering Project</strong></p>
                            <ul>The Software project consisted of the requirements phase, the design phase, the implementation phase, and finally the testing phase</ul>
                            <ul style="padding-bottom: 20px;">The Software project was basically the creation of web pages on a university web application called Study Buddy</ul>
                        <p><strong style="font-size: large;">Parallel Project</strong></p>
                            <ul>The parallel project was on the famous mathematical application called Conway's Game of Life</ul>
                            <ul id="last">The project constituted on optimizing the code using 3 different methods:</ul>
                                <li>Using Message Passing Interface (MPI)</li>
                                <li>Using OpenMP</li>   
                                <li style="padding-bottom: 15px;">Using CUDA (Compute Unified Device Architecture) on GPU</li>    
                                <a href="" style="color: rgb(0, 0, 143);">More Details...</a>

                    </div>
                </section>
            </div>
            <div class="section-right">
                <section class="section">
                    <h2>Internships</h2>
                    <div class="section-box">
                        <p><strong style="font-size: large;">Software Development Intern</strong> at TecFrac</p>
                        <ul>1 June 2023 - 15 July 2023</ul>
                        <ul>Worked on developing web applications using Vue.js and Node.js</ul>
                        <ul>Developed skills using Vue.js in creating web pages, components that were dynamic, and database for the several pages. </ul>
                        <ul>Learned how to use Node.js for sending API requests to pages</ul>
                        <a href="" style="color: rgb(0, 0, 143);">More Details...</a>
                    </div>
                </section>
                <section class="section">
                    <h2>Skills</h2>
                    <div class="section-box">
                        <div class="skills-line">
                            <span class="skill-shape">C</span>
                            <span class="skill-shape">Java</span>
                            <span class="skill-shape">SQL</span>
                            <span class="skill-shape">Algorithms</span>
                            <span class="skill-shape">Microsoft Office</span>                           
                            <span class="skill-shape">OOP</span>
                            <span class="skill-shape">HTML</span>
                        </div>
                        <div class="skills-line">
                            <span class="skill-shape">Python</span>
                            <span class="skill-shape">Vue.Js</span>
                            <span class="skill-shape">CSS</span>
                            <span class="skill-shape">JavaScript</span>
                            <span class="skill-shape">Node.js</span>
                        </div>
                        <div class="skills-line">
                            <span class="skill-shape">Secure Code Writer</span>
                            <span class="skill-shape">Efficient Code Writer</span>
                            <span class="skill-shape">Organized Code Writer</span>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
