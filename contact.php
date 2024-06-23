<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />

    <!--icons link-->
    <script src="https://kit.fontawesome.com/6ff329e5fe.js" crossorigin="anonymous"></script>
    <style>
        @media(max-width:1160px){
            section{
                padding: 3rem 8rem;
            }
            .contact{
                display: block;  
            }
        }
        .contact .mail, .number{
            background: #8601a0;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
        }
        .contact h4{
            font-size: 2rem;
            color: #fff;
        }
        .contact1 p{
            font-size: 1.4rem;
            color: #ffffff;
        }
        .contact2 h4{
            font-size: 1.8rem;
        }
        .p{
            color: var(--text-color);
        }
        #icon3{
            color: #fff;
            font-size: var(--big-text);
        }
        .contact2{
            background: #8601a0;
            border-radius: 10px;
            padding: 60px;
            margin: 20px;
        }
        .nav {
            width: 100%;
            height: 8%;
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
            width: 20%;
            alignment: center;
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
        .hero {
            width: 100%;
            background: linear-gradient(rgba(127, 2, 54, 0.7), rgba(20, 2, 112, 0.7)), url('src/assets/hero.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            color: Black;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5rem 0;
        }
        .container.mx-auto.p-8{
            margin: 0 auto 20px !important;
        }
        .remain{
            padding-top:8%;
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
    <br><br>
    <div class = "remain">
    <div class="container mx-auto p-8"><br><br>
        <h1 class="text-4xl text-white font-bold text-center mb-4">Contact Us</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="src/assets/DB.jpg" alt="DB" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h2 class="text-2xl font-bold mb-2">Debojyoti Bhuinya</h2>
                <h2>Contact me</h2>
                <div class="contact">
                    <div class="contact1">
                        <div class="mail">
                            <h4>Mail Me</h4>
                            <p style="color: white;">bhuinyadebojyoti@gmail.com</p>
                        </div>
                        <div class="number">
                            <h4>Call Me</h4>
                            <p style="color: white;">+91 8582829379</p>
                        </div>
                    </div>
                    <div class="contact2">
                        <div class="social">
                            <h4>My Social Media</h4>
                            <a href="https://wa.me/+918582829379"><i class="fa-brands fa-whatsapp" id="icon3"></i></a>
                            <a href="https://www.facebook.com/debojyoti.bhuinya"><i class="fa-brands fa-facebook" id="icon3"></i></a>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="src/assets/GC.jpg" alt="GC" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h2 class="text-2xl font-bold mb-2">Gargi Chakraborty</h2>
                <h2>Contact me</h2>
                <div class="contact">
                    <div class="contact1">
                        <div class="mail">
                            <h4>Mail Me</h4>
                            <p style="color: white;">gargichakraborty105@gmail.com</p>
                        </div>
                        <div class="number">
                            <h4>Call Me</h4>
                            <p style="color: white;">+91 8617769412</p>
                        </div>
                    </div>
                    <div class="contact2">
                        <div class="social">
                            <h4>My Social Media</h4>
                            <a href="https://wa.me/+918617769412"><i class="fa-brands fa-whatsapp" id="icon3"></i></a>
                            <a href="https://www.facebook.com/aaradhya.malhotra.142"><i class="fa-brands fa-facebook" id="icon3"></i></a>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="src/assets/AD.jpg" alt="AD" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h2 class="text-2xl font-bold mb-2">Akash Das</h2>
                <h2>Contact me</h2>
                <div class="contact">
                    <div class="contact1">
                        <div class="mail">
                            <h4>Mail Me</h4>
                            <p style="color: white;">akd270302@gmail.com</p>
                        </div>
                        <div class="number">
                            <h4>Call Me</h4>
                            <p style="color: white;">+91 9800866506</p>
                        </div>
                    </div>
                    <div class="contact2">
                        <div class="social">
                            <h4>My Social Media</h4>
                            <a href="https://wa.me/+919800866506"><i class="fa-brands fa-whatsapp" id="icon3"></i></a>
                            <a href="https://www.facebook.com/profile.php?id=100025221551704"><i class="fa-brands fa-facebook" id="icon3"></i></a>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="src/assets/SC.jpg" alt="SC" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h2 class="text-2xl font-bold mb-2">Salini Chowdhury</h2>
                <h2>Contact me</h2>
                <div class="contact">
                    <div class="contact1">
                        <div class="mail">
                            <h4>Mail Me</h4>
                            <p style="color: white;">salini98310@gmail.com</p>
                        </div>
                        <div class="number">
                            <h4>Call Me</h4>
                            <p style="color: white;">+91 7003230262</p>
                        </div>
                    </div>
                    <div class="contact2">
                        <div class="social">
                            <h4>My Social Media</h4>
                            <a href="https://wa.me/+918420774297"><i class="fa-brands fa-whatsapp" id="icon3"></i></a>
                            <a href="https://www.facebook.com/shalini.chowdhury.5015"><i class="fa-brands fa-facebook" id="icon3"></i></a>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="src/assets/SG.jpg" alt="SG" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h2 class="text-2xl font-bold mb-2">Subhamay Ganguly</h2>
                <h2>Contact me</h2>
                <div class="contact">
                    <div class="contact1">
                        <div class="mail">
                            <h4>Mail Me</h4>
                            <p style="color: white;">subhag702@gmail.com</p>
                        </div>
                        <div class="number">
                            <h4>Call Me</h4>
                            <p style="color: white;">+91 6289658522</p>
                        </div>
                    </div>
                    <div class="contact2">
                        <div class="social">
                            <h4>My Social Media</h4>
                            <a href="https://wa.me/+916289658522"><i class="fa-brands fa-whatsapp" id="icon3"></i></a>
                            <a href="https://www.facebook.com/subhamay.ganguly.9"><i class="fa-brands fa-facebook" id="icon3"></i></a>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- Repeat for other team members -->
            <!-- Additional team member sections -->
        </div>
    </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
