<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User Information</title>
</head>
<body>

<?php
$dns = 'mysql:dbname=project;host=localhost;port=3306';
$db = new PDO($dns, 'root');

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stm = $db->prepare($sql);
    $stm->bindParam(1, $email);
    $stm->execute();
    $user = $stm->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found.";
        exit;
    }

    if (isset($_POST['submit'])) {
        // Update the user's information in the database
        $name = $_POST['name'];
        $password = $_POST['password'];

        // Ensure that the "roomNumber" field is being sent in the form data
        if (isset($_POST['roomNumber'])) {
            $roomNumber = $_POST['roomNumber'];
        } else {
            $roomNumber = ''; // Set a default value or handle it as you see fit.
        }

        $sql = "UPDATE users SET name = ?, password = ?, roomNumber = ? WHERE email = ?";
        $stm = $db->prepare($sql);
        $stm->bindParam(1, $name);
        $stm->bindParam(2, $password);
        $stm->bindParam(3, $roomNumber);
        $stm->bindParam(4, $email);
        $stm->execute();

        echo "User information updated successfully!";
    }
}
?>

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
