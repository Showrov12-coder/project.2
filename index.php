<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health and Good Wealth</title>
    <link rel="stylesheet" href="index_style.css">
</head>
<body>
    <header>
        <h1>Good Health and Good Wealth</h1>
    </header>

    <main>
        <!-- Gallery Slideshow -->
        <div class="gallery">
            <div class="gallery-container">
                <img class="gallery-slide" src="camp1.jpg" alt="Camp Photo 1">
                <img class="gallery-slide" src="camp2.avif" alt="Camp Photo 2">
                <img class="gallery-slide" src="camp3.jpg" alt="Camp Photo 3">
                <img class="gallery-slide" src="camp4.jpg" alt="Camp Photo 4">
                <!-- 
                <img class="gallery-slide" src="camp5.jpg" alt="Camp Photo 5">
                <img class="gallery-slide" src="camp6.jpg" alt="Camp Photo 6">
                -->
            </div>
        </div>

        <div class="menu-container">
            <section id="menu">
                <div class="dropdown">
                    <button class="dropbtn">Menu</button>
                    <div class="dropdown-content">
                        <a href="user_all_Information_view_only_doctor.php">Doctor (Information)</a>
                        <a href="pharmacy_list.php">Pharmacy</a>
                    </div>
                </div>
            </section>

            <section id="services">
                <div class="dropdown">
                    <button class="dropbtn">Service</button>
                    <div class="dropdown-content">
<!--                    <a href="#">Blood Donation</a> -->
                        <a href="view_camp_list_for_user.php">Camp list</a>
<!--                    <a href="#">Flood Camp List</a> -->
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
            
            <section id="contact-information">
                <div class="dropdown">
                    <button class="dropbtn">Contact</button>
                    <div class="dropdown-content">
                        <a href="#">Phone: 0198765432</a>
                        <a href="#">E-mail: service@gamil.com</a>
                        <a href="#">Facebook</a>
                        <a href="#">Youtube</a>
                    </div>
                </div>
            </section>

            <section id="login-or-registration">
                <div class="dropdown">
                    <button class="dropbtn">Login Or Registration</button>
                    <div class="dropdown-content">
                        <a href="login.php">Login</a>
                        <a href="Registration.php">Registration</a>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Good Health and Good Wealth | All Rights Reserved.</p>
    </footer>

    <script>
        let slideIndex = 0;
        function showSlides() {
            let slides = document.getElementsByClassName("gallery-slide");
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1; }
            slides[slideIndex - 1].style.display = "block";  
            setTimeout(showSlides, 3000); // Change image every 3 seconds
        }
        showSlides();
    </script>
</body>
</html>
