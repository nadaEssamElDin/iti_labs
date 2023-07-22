<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Files</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <?php
    try {
        $data = file('customer.txt');
        echo "
        <table class='table'>
        <tr>
        <td>first_name</td>
        <td>last_name</td>
        <td>address</td>
        <td>country</td>
        <td>gender</td>
        <td>skills</td>
        <td>username</td>
        <td>password</td>
        <td>department</td>
        <td>code</td>
        <td>Edit</td>
        <td>Delete</td>
        </tr>";

        foreach ($data as $value) {
            $user = explode(";", $value);
            echo "<tr>";
            for ($i = 0; $i < count($user); $i++) {
                $value = trim($user[$i]);
                echo "<td>$value</td>";
            }
            echo "<td><a class='btn btn-warning' href='edit.php?username=" . trim($user[6]) . "'>Edit</a></td>";
            echo "<td>
                    <form action='delete.php' method='post'>
                        <input type='hidden' name='username' value='" . trim($user[6]) . "'>
                        <button type='submit' class='btn btn-danger'>Delete</button>
                    </form>
                </td>";
            echo "</tr>";
        }

        echo "</table>";
    } catch (Exception $e) {
        echo "error!";
    }
    ?>
</body>
</html>
