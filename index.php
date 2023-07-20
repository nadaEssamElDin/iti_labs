<!DOCTYPE html>
<html>
    
<head>
    <title>User Registration Form</title>
</head>
<body>
    <h1>User Registration Form</h1>
    
    <form action="index2.php" method="post">
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
</body>
</html>
