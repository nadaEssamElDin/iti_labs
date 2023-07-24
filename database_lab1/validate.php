
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Files</title>

     <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="reset"] {
            background-color: #f44336;
            color: white;
            cursor: pointer;
        }

        input[type="reset"]:hover {
            background-color: #d32f2f;
        }
    </style>


</head>
<body>

<?php
$dns = 'mysql:dbname=project;host=localhost;port=3306';
$db = new PDO($dns, 'root');

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
        $roomNumber = isset($_POST['roomNumber']) ? $_POST['roomNumber'] : ''; // Check if roomNumber is set

        $sql = "insert into users values(?,?,?,?)";
        $stm = $db->prepare($sql);
        $stm->bindparam(1, $name);
        $stm->bindparam(2, $password);
        $stm->bindparam(3, $email);
        $stm->bindparam(4, $roomNumber);

        $stm->execute();
        $sql2 = "select * from users";
        $stm2 = $db->prepare($sql2);
        $stm2->execute();
        $data = $stm2->fetchAll(PDO::FETCH_ASSOC);

        echo "
        <table>
        <tr>
            <th>Name</th>
            <th>Password</th>
            <th>Email</th>
            <th>RoomNumber</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        ";
    
    foreach ($data as $key => $value) {
        echo "<tr>
            <td>{$value['name']}</td>
            <td>{$value['password']}</td>
            <td>{$value['email']}</td>
            <td>{$value['roomNumber']}</td>
            <td><a class='btn btn-warning' href='edit.php?email=" . trim($value['email']) . "'>Edit</a></td>
            <td><a class='btn btn-warning' href='delete.php?email=" . trim($value['email']) . "'>Delete</a></td>
        </tr>";
    }
    
    echo "</table>";
    } else {
        print_r($errors);
    }
}
?>

<!-- Your HTML code goes here -->
</body>
</html>
