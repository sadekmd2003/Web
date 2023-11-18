<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $users = file_get_contents('users.json');
    $users = json_decode($users, true);
    $user_approve = false;

    if ($users) {
        foreach ($users as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                $_SESSION['username'] = $username;
                $_SESSION['full_name'] = $user['full_name'];
                $_SESSION['sex'] = $user['sex'];
                $_SESSION['region'] = $user['region'];
                $_SESSION['birth_date'] = $user['birth_date'];
                $user_approve = true;
                break;
            }
        }
    }

    if ($user_approve) {
        header('Location: login_success.php');
    } else {
        header('Location: login.php?error=1');
    }
}
?>
