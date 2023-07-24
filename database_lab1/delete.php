<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>delete User Information</title>
</head>
<body>

<?php
$dns = 'mysql:dbname=project;host=localhost;port=3306';
$db = new PDO($dns, 'root');

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $sql = "DELETE FROM users WHERE email = ?";
    $stm = $db->prepare($sql);
    $stm->bindParam(1, $email);
  

    if (    $stm->execute() ) {
        echo "User with email '$email' deleted successfully.";
    } else {
        echo "User with email '$email' not found or couldn't be deleted.";
    }
}


?>

</body>
</html>
