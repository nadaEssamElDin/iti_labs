<?php
if (isset($_POST['username'])) {
    $usernameToDelete = $_POST['username'];

    
    $data = file('customer.txt');

    
    $file = fopen('customer.txt', 'w');

    
    foreach ($data as $value) {
        $user = explode(";", $value);
        if (trim($user[6]) !== $usernameToDelete) {
            fwrite($file, $value);
        }
    }

   
    fclose($file);


    header('Location: files.php');
    exit();
}
?>
