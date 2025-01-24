<?php
    session_start();
    include("db.php");

    if ($_SERVER['REQUEST_METHOD']=="POST")
    {
        $email= $_POST['email'];
        $password= $_POST['password'];

        if(!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query ="select * from form where Email='$email' limit 1";

            $result = mysqli_query($conn, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data["password"] == $password)
                    {
                        header("location:userinterpage.php");
                        die(); 
                    }
                }
            }
            echo "<script type='text/javascript'> alert('Invalid Information ')</script>";
            
        }
        else{
            echo "<script type='text/javascript'> alert('Invalid Information ')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST">
            <label for="email">E-mail</label>
            <input type="text" id="email" name="email" placeholder="Enter your E-mail" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="Registration.php">Registration</a>.</p>
        <p><a href="index.php" class="home-button">Back to Home</a></p>
        </p>
    </div>
</body>
</html>