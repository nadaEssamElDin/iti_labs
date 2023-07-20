<!DOCTYPE html>
<html>
<head>
    <title>User Registration Form</title>
</head>
<body>
    <?php
  
    $form_processed = false;


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
        $expected_code = "sh688c";
        $entered_code = $_POST['code'];

        if ($entered_code !== $expected_code) {
            echo "<h1>Invalid Code</h1>";
        } else {
           
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address = $_POST['address'];
            $country = $_POST['country'];
            $gender = $_POST['gender'];
            $skills = isset($_POST['skills']) ? $_POST['skills'] : array();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $department = $_POST['department'];

           
            $form_processed = true;
        }
    }
    ?>
    
    <?php if (!$form_processed): ?>
        
        <h1>User Registration Form</h1>
        <form action="index.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" required placeholder="Enter your first name"><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" required placeholder="Enter your last name"><br>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required placeholder="Enter your address"><br>

        <label for="country">Country:</label>
        <select name="country" id="country" required>
            <option value="">Select a country</option>
            <option value="country1">EGYPT</option>
            <option value="country2">USA</option>
          
        </select><br>

        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="male" required> Male
        <input type="radio" name="gender" value="female" required> Female<br>

        <label>Skills:</label>
        <input type="checkbox" name="skills[]" value="PHP"> PHP
        <input type="checkbox" name="skills[]" value=" Mysql"> Mysql
        <input type="checkbox" name="skills[]" value=" java"> java
        <input type="checkbox" name="skills[]" value="c#"> c#
       

        <br>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required placeholder="Enter your username"><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required placeholder="Enter your password"><br>

        <label for="department">Department:</label>
        <input type="text" name="department" id="department" required placeholder="Computer Science"><br><br>
                 
                     sh688c  <br>
        <label for="code">Enter this code :</label>
        <input type="text" name="code" id="code" required><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
        </form>
    <?php else: ?>
      
        <h1>Thank you, <?php echo ($gender === 'male') ? "Mr. " : "Mrs. "; echo $last_name; ?></h1>
        <p>Please review your information:</p>
        <p>First Name: <?php echo $first_name; ?></p>
        <p>Last Name: <?php echo $last_name; ?></p>
        <p>Address: <?php echo $address; ?></p>
        <p>Country: <?php echo $country; ?></p>
        <p>Gender: <?php echo ($gender === 'male') ? "Male" : "Female"; ?></p>
        <p>Skills:</p>
        <ul>
            <?php foreach ($skills as $skill): ?>
                <li><?php echo $skill; ?></li>
            <?php endforeach; ?>
        </ul>
        <p>Username: <?php echo $username; ?></p>
        <p>Password: <?php echo $password; ?></p>
        <p>Department: <?php echo $department; ?></p>
    <?php endif; ?>
</body>
</html>
