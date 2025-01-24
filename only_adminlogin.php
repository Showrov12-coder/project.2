<?php
session_start();

// Database connection
$servername = "localhost"; // Change if necessary
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "health_db"; // Your database name

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling the form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // Prepared statement to prevent SQL injection
        $query = "SELECT * FROM admin WHERE email = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $admin_data = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $admin_data['password'])) {
                $_SESSION['admin_id'] = $admin_data['id'];
                $_SESSION['admin_email'] = $admin_data['email'];
                
                header("Location: admin_dashboard.php");
                exit();
            } else {
                echo "<script>alert('Invalid email or password.');</script>";
            }
        } else {
            echo "<script>alert('No admin found with this email.');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please enter valid credentials.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 350px;
            text-align: center;
        }
        .login-container h1 {
            margin-bottom: 20px;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }
        .login-container button:hover {
            background: #218838;
        }
        .login-container p {
            margin-top: 15px;
        }
        .login-container a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form method="POST" action="">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Enter your E-mail" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            
            <button type="submit">Login</button>
        </form>
        <p><a href="index.php" class="home-button">Back to Home</a></p>
    </div>
</body>
</html>
