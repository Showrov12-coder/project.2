<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #4CAF50;
        }
        .btn {
            display: inline-block;
            margin: 10px 5px;
            padding: 12px 25px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }
        .btn-user { background-color: #3498db; color: white; }
        .btn-admin { background-color: #e74c3c; color: white; }
        .btn-logout { background-color: #2ecc71; color: white; }
        .btn-home { background-color: #f39c12; color: white; }

        .btn:hover {
            opacity: 0.9;
        }

        /* Dropdown styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 200px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            border-radius: 5px;
            z-index: 1;
            text-align: left;
        }

        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 16px;
            border-bottom: 1px solid #ddd;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the User & Admin Page</h1>
        
        <div class="dropdown">
            <button class="dropbtn">User Interpage</button>
            <div class="dropdown-content">
                <a href="user_all_Information_view_only.php" class="btn-doctor">Doctor</a>
                <a href="user_all_Infomation_for_pateint.php" class="btn-patient">Patient</a>
                <a href="pharmacy_list.php" class="btn-pharmacy">Pharmacy</a>
            </div>
        </div>

        <br><br>

        <a href="AdminInterpage.php" class="btn btn-admin">Admin Panel</a>
        <a href="login.php" class="btn btn-logout">Logout</a>
        <a href="index.php" class="btn btn-home">Back to Home</a>
    </div>
</body>
</html>
