<?php
require_once 'db_functions.php';


$dsn = 'mysql:dbname=project;host=localhost;port=3306';
$username = 'root';
$password = '';

$db = new Database($dsn, $username, $password);

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $db->delete('users', $email);
}
?>
