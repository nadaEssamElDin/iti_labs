<?php
require_once 'db_functions.php';


$dsn = 'mysql:dbname=project;host=localhost;port=3306';
$username = 'root';
$password = '';

$db = new Database($dsn, $username, $password);

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $user = $db->select('users', ['email'], [$email])[0];

    if (!$user) {
        echo "User not found.";
        exit;
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];

        if (isset($_POST['roomNumber'])) {
            $roomNumber = $_POST['roomNumber'];
        } else {
            $roomNumber = ''; 
        }

        
        $columns = ['name', 'password', 'roomNumber'];
        $values = [$name, $password, $roomNumber];
        $db->update('users', 'email', $email, $columns, $values);

        echo "User information updated successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User Information</title>
</head>
<body>

<h1>Edit User Information</h1>

<form action="" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo $user['name']; ?>" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" value="<?php echo $user['password']; ?>" required><br>

    <label for="roomNumber">Room number:</label>
    <select name="roomNumber" id="roomNumber" required>
        <option value="Application1" <?php echo ($user['roomNumber'] === 'Application1') ? 'selected' : ''; ?>>Application1</option>
        <option value="Application2" <?php echo ($user['roomNumber'] === 'Application2') ? 'selected' : ''; ?>>Application2</option>
        <option value="cloud" <?php echo ($user['roomNumber'] === 'cloud') ? 'selected' : ''; ?>>cloud</option>
    </select><br>

    <input type="submit" name="submit" value="Update">
    <a href="validate.php">Back to Home</a>
</form>

</body>
</html>
