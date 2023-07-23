<!DOCTYPE html>
<html>
<head>
    <title>User Registration Form</title>
</head>
<body>
    <h1>User Registration Form</h1>
    
    <form action="show.php" method="post" enctype="multipart/form-data">
        <label for="name"> Name:</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" required><br>

        <label for="Password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your Password" required><br>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required><br>

        <label for="Email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Enter your Email" required><br>

        <label for="Room number">Room number:</label>
        <select name="roomNumber" id="roomNumber" required>
            <option value="Application1">Application1</option>
            <option value="Application2">Application2</option>
            <option value="cloud">cloud</option>
        </select><br>
  
        <label>Profile image </label>
        <input type="file" name="file" accept="image/*" required/><br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
