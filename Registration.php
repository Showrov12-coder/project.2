<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $Name= $_POST['name'];
        $Username= $_POST['username'];
        $Gender= $_POST['gender'];
        $pNum= $_POST['phone'];
        $email= $_POST['email'];
        $password= $_POST['password'];

        if(!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query="insert into form (Name,Username,Gender,Phone_num, Email ,Password) values('$Name', '$Username','$Gender','$pNum','$email','$password')";

            mysqli_query($conn, $query);
            echo "<script type='text/javascript'> alert('Successfully Register')</script>";
        }

        else
        {
            echo "<script type='text/javascript'> alert('Invalid Information ')</script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="Registration.css">
</head>
<body>
    <div class="form-container">
        <form action="Registration.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="Username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
            </select>


            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Registration</button>
        </form>
        <p><a href="index.php" class="home-button">Back to Home</a></p>
        <p><a href="login.php" class="back-button">Back to Login Page</a></p>
    </div>
</body>
</html>
