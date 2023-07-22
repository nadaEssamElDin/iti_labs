<!DOCTYPE html>
<html>
<head>
    <title>User Registration Form</title>
</head>
<body>
    <h1>User Registration Form</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $first_name = isset($_POST["first_name"]) ? trim($_POST["first_name"]) : "";
        $last_name = isset($_POST["last_name"]) ? trim($_POST["last_name"]) : "";
        $address = isset($_POST["address"]) ? trim($_POST["address"]) : "";
        $country = isset($_POST["country"]) ? $_POST["country"] : "";
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
        $skills = isset($_POST["skills"]) ? implode(", ", $_POST["skills"]) : "";
        $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
        $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";
        $department = isset($_POST["department"]) ? trim($_POST["department"]) : "";
        $code = isset($_POST["code"]) ? trim($_POST["code"]) : "";

       
        $errors = array();
        if (empty($first_name)) {
            $errors["first_name"] = "First name is required.";
        }

        if (empty($last_name)) {
            $errors["last_name"] = "Last name is required.";
        }

        if (empty($gender)) {
            $errors["gender"] = "Gender is required.";
        }

       
        if (empty($username)) {
            $errors["username"] = "Email is required.";
        } elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $errors["username"] = "Invalid email format.";
        }

        
        if (!empty($errors)) {
            echo "Errors occurred while processing the form:<br>";
           
            ?>
            <form action="index2.php" method="post">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" placeholder="Enter your first name" value="<?php echo isset($first_name) ? htmlspecialchars($first_name) : ""; ?>"><br>
                <?php echo isset($errors["first_name"]) ? "<span style='color: red;'>" . $errors["first_name"] . "</span><br>" : ""; ?>

                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" placeholder="Enter your last name" value="<?php echo isset($last_name) ? htmlspecialchars($last_name) : ""; ?>"><br>
                <?php echo isset($errors["last_name"]) ? "<span style='color: red;'>" . $errors["last_name"] . "</span><br>" : ""; ?>

                <label for="address">Address:</label>
                <input type="text" name="address" id="address"  placeholder="Enter your address" value="<?php echo isset($address) ? htmlspecialchars($address) : ""; ?>"><br>

                <label for="country">Country:</label>
                <select name="country" id="country" >
                    <option value="">Select a country</option>
                    <option value="EGYPT">EGYPT</option>
                    <option value="USA">USA</option>
                </select><br>

                <label for="gender">Gender:</label>
                <input type="radio" name="gender" value="male" <?php echo ($gender === "male") ? "checked" : ""; ?>> Male
                <input type="radio" name="gender" value="female" <?php echo ($gender === "female") ? "checked" : ""; ?>> Female<br>
                <?php echo isset($errors["gender"]) ? "<span style='color: red;'>" . $errors["gender"] . "</span><br>" : ""; ?>

                <label>Skills:</label>
                <input type="checkbox" name="skills[]" value="PHP"> PHP
                <input type="checkbox" name="skills[]" value="Mysql"> Mysql
                <input type="checkbox" name="skills[]" value="java"> java
                <input type="checkbox" name="skills[]" value="c#"> c#
                <br>

                <label for="username">Username:</label>
                <input type="text" name="username" id="username"  placeholder="Enter your username" value="<?php echo isset($username) ? htmlspecialchars($username) : ""; ?>" ><br>
                <?php echo isset($errors["username"]) ? "<span style='color: red;'>" . $errors["username"] . "</span><br>" : ""; ?>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password"  placeholder="Enter your password" value="<?php echo isset($password) ? htmlspecialchars($password) : ""; ?>"><br>

                <label for="department">Department:</label>
                <input type="text" name="department" id="department"  placeholder="Computer Science" value="<?php echo isset($department) ? htmlspecialchars($department) : ""; ?>"><br><br>

                <label for="code">Enter this code :</label>
                <input type="text" name="code" id="code" value="<?php echo isset($code) ? htmlspecialchars($code) : ""; ?>"><br>

                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </form>
            <?php
        } else {
           
            $data =  $first_name . ";";
            $data .= $last_name . ";";
            $data .=  $address . ";";
            $data .= $country . ";";
            $data .= $gender . ";";
            $data .= $skills . ";";
            $data .= $username .";";
            $data .= $password . ";";
            $data .= $department . ";";
            

            $file = fopen("customer.txt", "a");
            fwrite($file, $data . "\n");
            fclose($file);

            echo "Data saved successfully!";
        }
    }
    ?>

</body>
</html>
