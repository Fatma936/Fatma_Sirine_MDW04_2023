<!DOCTYPE html>
<html>
<head>
    <title>KLEOS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            background-color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Container */
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 80px 20px;
        }

        #header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 50px;
        }

        #logo {
            width: 100px;
            height: auto;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: #333;
            text-decoration: none;
            font-size: 16px;
        }

        /* Content */
        #content {
            text-align: center;
        }

        h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
            animation: fadeDown 1s ease-in-out;
        }

        p {
            font-size: 20px;
            color: #666;
            margin-bottom: 40px;
            animation: fadeIn 1s ease-in-out;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            font-weight: bold;
            animation: scaleIn 1s ease-in-out;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* About section */
        #about-section {
            background-color: #f9f9f9;
            padding: 50px;
            text-align: center;
        }

        #about-section h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .paragraph-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
        }

        .paragraph-container p {
            flex-basis: calc(33.33% - 20px);
            font-size: 18px;
            color: #666;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        /* Footer */
        footer {
            background-color: #333;
            padding: 40px;
            text-align: center;
            color: #fff;
        }

        footer h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        footer p {
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        footer ul {
            list-style-type: none;
            padding-left: 0;
            margin-top: 20px;
        }

        footer ul li {
            margin-bottom: 10px;
        }

        footer ul li:before {
            content: "\2022"; 
            color: #007bff;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
            margin-right: 10px;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Animations */
        @keyframes fadeDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Responsive */
        @media only screen and (max-width: 600px) {
            #contact-section form {
                padding: 0 20px;
            }
        }
    </style>
    <script>
        // JavaScript code for smooth scrolling
        document.addEventListener('DOMContentLoaded', function() {
            var links = document.querySelectorAll('a[href^="#"]');
            for (var i = 0; i < links.length; i++) {
                links[i].addEventListener('click', smoothScroll);
            }
            
            function smoothScroll(e) {
                e.preventDefault();
                var target = document.querySelector(this.getAttribute('href'));
                var targetOffsetTop = target.offsetTop;
                var scrollStep = targetOffsetTop / 40; // Adjust this value to control scrolling speed
                var scrollInterval = setInterval(function() {
                    if (window.pageYOffset <= targetOffsetTop) {
                        window.scrollTo(0, window.pageYOffset + scrollStep);
                    } else {
                        clearInterval(scrollInterval);
                    }
                }, 20);
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <div id="header">
            <img src="assets/images/logi-icon.png" alt="IoT Logo" id="logo">
            <nav>
                <ul>
                    <li><a href="#about-section">About us</a></li>
                </ul>
            </nav>
        </div>
        <div id="content">
            <h1>Welcome to the IoT World</h1>
            <p>Discover the power of connected devices and smart technologies.</p>
            <a href="login" class="btn">Get Started</a>
        </div>
    </div>

    <section id="about-section">
        <div class="container">
            <h2>About us</h2>
            <div class="paragraph-container">
                <p>Welcome to KLEOS, your one-stop solution for managing LoRaWAN devices and gateways. We specialize in providing robust and scalable tools to help you effortlessly control and monitor your IoT infrastructure.</p>
                <p>With KLEOS, you can easily connect, configure, and manage a wide range of LoRaWAN devices and gateways. Our intuitive interface allows you to streamline device onboarding, track performance metrics, and efficiently troubleshoot any issues that may arise.</p>
                <p>Whether you are an individual hobbyist or an enterprise deploying a large-scale IoT network, KLEOS offers the features and flexibility you need to maximize the potential of your LoRaWAN ecosystem. Join us today and experience the power of seamless device management.</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>If you have any questions or inquiries, we would love to hear from you. Our dedicated support team is ready to assist you with any concerns related to KLEOS or LoRaWAN technology.</p>
            <ul>
                <li>Email: info@kleos.com</li>
                <li>Phone: +1 (123) 456-7890</li>
                <li>Address: 123 Main Street, City, Country</li>
            </ul>
            <p>Follow us on <a href="https://www.example.com" target="_blank">Twitter</a> and <a href="https://www.example.com" target="_blank">Facebook</a> for updates.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
<?php /**PATH /home/douz/Downloads/projetPFE2/resources/views/home.blade.php ENDPATH**/ ?>