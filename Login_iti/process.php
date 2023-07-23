<?php
session_start();

function readUsersData($file_path) {
    $users_data = array();
    $lines = file($file_path, FILE_IGNORE_NEW_LINES);

    foreach ($lines as $line) {
        $user_info = array();
        $fields = explode(PHP_EOL, $line); 

        foreach ($fields as $field) {
            $pos = strpos($field, ':');
            if ($pos !== false) {
                $key = trim(substr($field, 0, $pos));
                $value = trim(substr($field, $pos + 1));
                $user_info[$key] = $value;
            }
        }

        $users_data[] = $user_info;
    }

    return $users_data;
}


$file_path = 'users.txt';

$users_data = readUsersData($file_path);

$username = $_POST['username'];
$password = $_POST['password'];

$valid_login = false;

foreach ($users_data as $user) {
    if ($user['Name'] === $username && $user['password'] === $password) {
        $valid_login = true;
        break;
    }
}

if ($valid_login) {
    $_SESSION['username'] = $username;
    echo "Welcome, $username!";
} else {
    echo "Invalid login credentials";
    header("Location: login.php");
    exit;
    
}
?>
