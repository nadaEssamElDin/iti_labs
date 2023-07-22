<!DOCTYPE html>
<html>
<head>
    <title>Edit User Data</title>
</head>
<body>
    <h1>Edit User Data</h1>

    <?php
   
    if (isset($_GET["username"])) {
        $usernameToEdit = $_GET["username"];

       
        $data = file('customer.txt');

        
        $userData = null;
        foreach ($data as $value) {
            $user = explode(";", $value);
            if (isset($user[6]) && trim($user[6]) === $usernameToEdit) {
                $userData = $user;
                break;
            }
        }

        if ($userData) {
            
            echo "
            <form action='update.php' method='post'>
                <input type='hidden' name='old_username' value='" . trim($userData[6]) . "'>

                <label for='first_name'>First Name:</label>
                <input type='text' name='first_name' id='first_name' value='" . (isset($userData[0]) ? htmlspecialchars(trim($userData[0])) : "") . "'><br>

                <label for='last_name'>Last Name:</label>
                <input type='text' name='last_name' id='last_name' value='" . (isset($userData[1]) ? htmlspecialchars(trim($userData[1])) : "") . "'><br>

                <label for='address'>Address:</label>
                <input type='text' name='address' id='address' value='" . (isset($userData[2]) ? htmlspecialchars(trim($userData[2])) : "") . "'><br>

                <label for='country'>Country:</label>
                <select name='country' id='country'>
                    <option value=''>Select a country</option>
                    <option value='EGYPT'" . (isset($userData[3]) && trim($userData[3]) === 'EGYPT' ? 'selected' : '') . ">EGYPT</option>
                    <option value='USA'" . (isset($userData[3]) && trim($userData[3]) === 'USA' ? 'selected' : '') . ">USA</option>
                </select><br>

                <label for='gender'>Gender:</label>
                <input type='radio' name='gender' value='male'" . (isset($userData[4]) && trim($userData[4]) === 'male' ? 'checked' : '') . "> Male
                <input type='radio' name='gender' value='female'" . (isset($userData[4]) && trim($userData[4]) === 'female' ? 'checked' : '') . "> Female<br>

                <label>Skills:</label>
                <input type='checkbox' name='skills[]' value='PHP'" . (isset($userData[5]) && strpos($userData[5], 'PHP') !== false ? 'checked' : '') . "> PHP
                <input type='checkbox' name='skills[]' value='Mysql'" . (isset($userData[5]) && strpos($userData[5], 'Mysql') !== false ? 'checked' : '') . "> Mysql
                <input type='checkbox' name='skills[]' value='java'" . (isset($userData[5]) && strpos($userData[5], 'java') !== false ? 'checked' : '') . "> java
                <input type='checkbox' name='skills[]' value='c#'" . (isset($userData[5]) && strpos($userData[5], 'c#') !== false ? 'checked' : '') . "> c#<br>

                <!-- Additional Input Fields -->
                <label for='username'>Username:</label>
                <input type='text' name='username' id='username' value='" . (isset($userData[6]) ? htmlspecialchars(trim($userData[6])) : "") . "'><br>

                <label for='password'>Password:</label>
                <input type='password' name='password' id='password' value='" . (isset($userData[7]) ? htmlspecialchars(trim($userData[7])) : "") . "'><br>

                <label for='department'>Department:</label>
                <input type='text' name='department' id='department' value='" . (isset($userData[8]) ? htmlspecialchars(trim($userData[8])) : "") . "'><br><br>

                <label for='code'>Enter this code :</label>
                <input type='text' name='code' id='code' value='" . (isset($userData[9]) ? htmlspecialchars(trim($userData[9])) : "") . "'><br>

                <input type='submit' value='Update'>
            </form>";
        } else {
            echo "User not found.";
        }
    } else {
        echo "Username not provided.";
    }
    ?>
</body>
</html>
