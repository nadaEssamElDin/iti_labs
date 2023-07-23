<?php
if (isset($_FILES['file'])) {
    $errors = array();
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $extensions = array("jpg", "png");

    if (!in_array($file_ext, $extensions)) {
        $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size must be exactly 2 MB';
    }

    $email = $_POST['email'];

    // First way
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }

    // Second way
    if (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        $errors[] = 'Invalid email format';
    }

   
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

  
    if (strlen($password) !== 8) {
        $errors[] = 'Password must be exactly 8 characters long';
    }

    if (preg_match('/[^a-zA-Z0-9_]/', $password)) {
        $errors[] = 'Password must only contain alphanumeric characters and underscores';
    }

   
    if (preg_match('/[A-Z]/', $password)) {
        $errors[] = 'Password must not contain capital letters';
    }

    if ($password !== $confirmPassword) {
        $errors[] = 'Passwords do not match';
    }

    $target_directory = "files/";

    if (!is_dir($target_directory)) {
        mkdir($target_directory, 0777, true);
    }

   
    $file_name = time() . '_' . preg_replace('/[^A-Za-z0-9_.-]/', '', $file_name);

    if (empty($errors) === true) {
        move_uploaded_file($file_tmp, $target_directory . $file_name);

      
        $name = $_POST['name'];
        $email = $_POST['email'];
        $roomNumber = $_POST['roomNumber'];
        $password = $_POST['password'];

        $user_data = "Name: $name\nEmail: $email\nRoom Number: $roomNumber\npassword:$password\n\n";
        file_put_contents("users.txt", $user_data, FILE_APPEND);

        echo "Success , welcome to your page  " ,"$name ";
    } else {
        print_r($errors);
    }
}
?>
