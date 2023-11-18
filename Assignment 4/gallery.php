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

    function readGalleryFile($filename) {
      $galleryData = file_get_contents($filename);
      return json_decode($galleryData, true);
    }
    $galleryImages = readGalleryFile('gallery.json');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      background-color: #b2b2b2;
    }

    .upper-background {
      background-color: #561919;
      height: 70px;
      width: 100%;
      text-align: center;
      padding-top: 20px;
      position: relative;
    }

    .gallery {
      margin-top: 20px;
      text-align: center;
    }

    .column {
      width: 300px;
      height: 300px;
      margin: 20px 100px 20px 50px;
      position: relative;
      display: inline-block;
    }

    .click img {
      width: 300px;
      height: 300px;
      object-fit: cover;
      transition: transform 0.3s ease-in-out;
    }

    .click:hover img {
       transform: scale(1.1);
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      z-index: 2;
    }

    .modal-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-width: 80%;
      max-height: 80%;
    }

    .modal img {
      max-width: 650px;
      max-height: 650px;
      object-fit: contain;
    }

    .close-button {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 24px;
      cursor: pointer;
      color: white;
      z-index: 3;
    }

    .return-link {
      position: absolute;
      top: 30px;
      left: 10px;
      text-decoration: none;
      color: white;
      font-size: 20px;
    }

    :target {
      display: block;
    }

    #dropdown {
      line-height: 40px;
      background: #a60000;
      color: white;
      width: 80px;
      text-align: center;
      margin-top: 5px;
      margin-left: 15px;
      border: 5px;
      border-radius: 5px;
      position: absolute;
      z-index: 2;
    }

    .dropdown-content {
      display: none;
      position: relative;
      background-color: #a60000;
      min-width: 115px;
      border: 1px solid black;
      z-index: 3;
    }

    #dropdown .dropdown-item:hover {
      background-color: #561919;
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
      background: #a60000;
    }

    .center-menu {
      text-align: center;
    }

    .dropdown-content a {
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
    <p style="color: white; font-size: 25px; position: absolute; top: 25%; left: 50%; transform: translate(-50%, -50%);">
      Click on Image for Full Screen
    </p>
        <div style="
            color: white;
            font-size: 20px;
            top: 15px;
            position: absolute;
            right: calc(25px);">
            Welcome <?php echo $_SESSION["username"]; ?></div>
        </div>
        <button style="background-color: #a60000;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 43px;
            right: 25px;"
            onclick="location.href='?logout=true'"
        >
            Logout
        </button>
    </div>
    <div class="gallery">
            <?php
            foreach ($galleryImages as $index => $image) {
                $modalId = 'modal' . ($index + 1);
            ?>
                <div class="column">
                    <a href="#<?php echo $modalId; ?>" class="click">
                        <img src="icons and photos/Gallery/<?php echo $image; ?>">
                    </a>
                </div>

                <div id="<?php echo $modalId; ?>" class="modal">
                    <a href="#" class="close-button">&times;</a>
                    <div class="modal-content">
                        <img src="icons and photos/Gallery/<?php echo $image; ?>">
                    </div>
                </div>
            <?php
            }
            ?>
    </div>
</body>
</html>
