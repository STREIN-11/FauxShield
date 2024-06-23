<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet Our Team</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .background-pattern {
            background: url('path-to-background-image.png');
            background-size: cover;
        }
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
        .nav {
            height: 8%;
            width: 100%;
            background: #333;
            color: #fff;
            padding: 4px 0;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 10;
        }

        .nav img {
            alignment: center;
            width:20%;
            margin-left: 40px;
            margin-right: 40px /* Add margin to the left for spacing */
        }

        .nav .navbar-text {
            display: block;
            font-size: x-large;
            margin: 0 auto; /* Center the text */
        }

        .nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .nav ul li {
            margin: 0 10px;
            font-size: 20px;
            cursor: pointer;
        }

        .nav a {
            color: white;
            text-decoration: none;
        }

        .nav a:visited {
            color: white;
        }
        footer {
            width: 100%;
            color: #fff;
            padding: 4px 0;
            position: fixed;
            left: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 10;
            text-align: center;
        }
        .hero {
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(127, 2, 54, 0.7),rgba(20, 2, 112, 0.7)), url('src/assets/hero.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: auto;
        }
        .hero-text {
            text-align: center;
            max-width: 800px;
            margin-bottom: 20%;
        }
        .hero-text h1 {
            font-size: 50px;
            font-weight: 600;
        }
        .hero-text p {
            max-width: 700px;
            margin: 0 auto 20px;
            line-height: 1.5;
            text-align: center;
            font-size: 18px;
            font-family: "Playfair Display", serif;
        }
        .remain{
            padding-top: 8%;
        }
    </style>
</head>
<body class="hero">
<div class="nav">
<img src='src/assets/logo-no-background.png' alt="">
        <ul>
        <li><a href="index.php">Home</a></li>
        <!-- <li>Deepfake Detector</li> -->
        <li><a href="source.php">About us</a></li>
        <li><a href="contact.php">Contact us</a></li>
    </ul>
    </div>
    <div class = "remain">
    <div class="background-pattern h-screen flex items-center justify-center">
        <div class="bg-gray-800 text-white p-8 rounded-lg shadow-lg max-w-4xl mx-auto">
            <header class="mb-8">
                <div class="text-center">
                    <!-- <h1 class="text-4xl font-bold text-pink-500 mb-2">TECH MANIACS</h1> -->
                </div>
                <div class="flex justify-center space-x-4 mt-4">
                    <a href="#" class="text-pink-500"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-pink-500"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-pink-500"><i class="fab fa-instagram"></i></a>
                </div>
            </header>
            <div class="bg-white p-4 rounded-lg shadow-lg mb-4">
                <img src="uploads\GROUP.jpg" alt="Group Photo" class="w-full rounded-lg">
            </div>
            <div class="flex justify-between text-sm">
                <p>Team Tech Maniacs, consisting of five dynamic and innovative members, is a powerhouse of technical expertise and creativity. Each member brings unique skills and perspectives, driving the team to push the boundaries of technology and deliver groundbreaking solutions.</p>
                <p>Together, we tackle challenges with a collaborative spirit and a passion for excellence, making them a formidable force in the tech world. With our combined knowledge and dedication, Team Tech Maniacs is poised to achieve remarkable success.</p>
            </div>
        </div>
    </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
<footer>
    Copyright © Tech Maniacs | All Rights Reserved
</footer>
</html>
