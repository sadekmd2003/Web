<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $fullName = $_POST["fullName"];
    $password = $_POST["password"];
    $sex = $_POST["sex"];
    $region = $_POST["region"];
    $dob = $_POST["dob"];
    
    $existingUsers = json_decode(file_get_contents('users.json'), true);
    foreach ($existingUsers as $user) {
        if ($user['username'] == $username) {
            $url = "signup.php?error=username_taken";
            $url .= "&username=" . urlencode($username);
            $url .= "&fullName=" . urlencode($fullName);
            $url .= "&password=" . urlencode($password);
            $url .= "&sex=" . urlencode($sex);
            $url .= "&region=" . urlencode($region);
            $url .= "&dob=" . urlencode($dob);
            header("Location: $url");
            exit();
        }
    }
    $newUser = [
        "username" => $username,
        "full_name" => $fullName,
        "password" => $password,
        "sex" => $sex,
        "region" => $region,
        "birth_date" => $dob
    ];
    $existingUsers[] = $newUser;
    $jsonData = json_encode($existingUsers, JSON_PRETTY_PRINT);
    file_put_contents('users.json', $jsonData);
    header("Location: login.php");
    exit();
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
