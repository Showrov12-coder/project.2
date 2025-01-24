<?php
// Any PHP processing logic can be placed here if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health and Good Wealth</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: rgba(129, 182, 69, 0.685);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            color: #333333; /* Dark text color for better readability */
            line-height: 1.2;
        }

        /* Header */
        header {
            background-color: rgba(33, 37, 41, 0.8); /* Dark semi-transparent background */
            color: #ffffff; /* White text color */
            text-align: center;
            padding: 15px 5px;
        }

        header h1 {
            margin: 1px;
            font-size: 3rem;
        }

        /* Main Sections */
        main {
            padding: 20px;
            margin: 20px;
            max-width: 1200px;
            background-color: rgba(255, 255, 255, 0.8); /* Light semi-transparent background */
            border-radius: 10px;
        }

        /* Dropdown Styles */
        .dropdown {
            position: relative;
            display: inline-block;
            margin-right: 20px;
        }

        .dropbtn {
            background-color: #ddda3ac0; /* Green background color */
            color: rgb(47, 123, 209);
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f7ecec;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #754343;
            color: #fff;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #ade0af63; /* Darker green on hover */
        }

        section {
            background-color: transparent;
            border: none;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #4CAF50; /* Green color for section headings */
            margin-bottom: 10px;
            border-bottom: 2px solid #3e8e41;
            display: inline-block;
        }

        ul {
            list-style: none;
            padding-left: 20px;
        }

        ul li {
            margin: 10px 0;
            font-size: 1.1rem;
        }

        a {
            color: #333;
            text-decoration: none;
            cursor: pointer;
        }

        a:hover {
            text-decoration: underline;
            color: #ff6600;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #da5f5fab;
            color: #fff;
            font-size: 0.9rem;
            border-radius: 0 0 10px 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="w3-container">
            <h1 class="w3-center">Good Health and Good Wealth</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <section id="home">
            <div class="dropdown">
                <a href="index.php" class="dropbtn">HOME Page</a>
            </div>
        </section>
        
        <section id="menu">
            <div class="dropdown">
                <button class="dropbtn">Menu</button>
                <div class="dropdown-content">
                    <a href="#">Doctor (Information)</a>
                    <a href="#">Pharmacy</a>
                    <a href="#">Camp List & Area</a>
                </div>
            </div>
        </section>
        
        <section id="services">
            <div class="dropdown">
                <button class="dropbtn">Service</button>
                <div class="dropdown-content">
                    <a href="#">Blood Donation</a>
                </div>
            </div>
        </section>
        
        <section id="notice">
            <div class="dropdown">
                <button class="dropbtn">Notice</button>
                <div class="dropdown-content">
                    <a href="#">Stay updated with our latest health and service information.</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Good Health and Good Wealth | All Rights Reserved.</p>
    </footer>
</body>
</html>
