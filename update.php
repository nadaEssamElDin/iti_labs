<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['old_username'])) {
    $oldUsername = $_POST['old_username'];
    $updatedData = array(
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['address'], 
        $_POST['country'], 
        $_POST['gender'], 
        implode(", ", $_POST['skills']), 
        $_POST['username'], 
        $_POST['password'], 
        $_POST['department'], 
        $_POST['code'], 
    );

    $data = file('customer.txt');

   
    $file = fopen('customer.txt', 'w');

    
    foreach ($data as $value) {
        $user = explode(";", $value);
        if (trim($user[6]) === $oldUsername) {
            fwrite($file, implode(";", $updatedData) . "\n");
        } else {
            fwrite($file, $value);
        }
    }

   
    fclose($file);

   
    exit();
}
?>
