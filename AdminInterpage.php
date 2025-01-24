<?php
session_start();
$special_keys = ["admin123", "12345"]; // Define valid special keys here

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['admin_key']) && in_array($_POST['admin_key'], $special_keys)) {
        $_SESSION['admin_access'] = true;
        header("Location: adminDashboard.php");
        exit();
    } else {
        $error = "Invalid special key. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Access</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #333;
        }
        input[type="password"], button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            color: #fff;
            background-color: #555;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Admin Access</h1>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="post" action="">
        <input type="password" name="admin_key" placeholder="Enter special key" required>
        <button type="submit">Submit</button>
    </form>
    <a href="userinterpage.php">BACK</a>
</div>

</body>
</html>
