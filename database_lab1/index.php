<!DOCTYPE html>
<html>
<head>
    <title>User Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            height: 40px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        /* Additional styling for error messages (if you decide to add any) */
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>User Registration Form</h1>
    
    <form action="validate.php" method="post" enctype="multipart/form-data">
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
