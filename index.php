<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deepfake Detection</title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
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

        footer {
            width: 100%;
            height: 10%;
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
            overflow: auto;
        }

        .hero {
            width: 100%;
            height: 100vh;
            background: linear-gradient(rgba(127, 2, 54, 0.7),rgba(20, 2, 112, 0.7)), url('src/assets/hero.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
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

        .form {
            width: 400px;
            margin-left: 23%;
        }

        .progress-bar {
            width: 100%;
            background-color: #f3f3f3;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 20px;
            display: none;
        }

        .progress-bar-fill {
            height: 20px;
            width: 100%;
            background: linear-gradient(to right, #24C6DC, #7f4a9d);
            background-size: 200% 100%;
            animation: loading 2s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 100% 0;
            }
            100% {
                background-position: -100% 0;
            }
        }

        .text-block {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            margin-top: 10px;
        }

        .container {
            text-align: center;
            margin-top: 20px;
        }

        #result {
            display: none;
            margin-top: 20px;
            max-width: 100%;
            max-height: 80vh; /* Adjust max-height as needed */
            overflow: auto; /* Enable scrolling if content exceeds max-height */
        }

        img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            display: block;
            margin: 0 auto;
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
    <div class="hero-text">
        <div id="text">
        <h1>Upload ∙ Process ∙ Detect</h1>
        <p>An All-in-one integrated platform to identify and detect DeepFake videos, images and audios.</p>
    </div>
        <form id="uploadForm" enctype="multipart/form-data" method="POST">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Submit" name="submit">
        </form>

        <div class="progress-bar" id="progressBar">
            <div class="progress-bar-fill" id="progressBarFill">Processing...</div>
        </div>
        <div id="result"></div>
    </div>
    </div>
    <script>
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting the default way
            
            let progressBar = document.getElementById('progressBar');
            let resultDiv = document.getElementById('result');
            let progressBarFill = document.getElementById('progressBarFill');
            
            progressBar.style.display = 'block';
            resultDiv.style.display = 'none';
            
            let formData = new FormData(this);
            
            fetch('upload.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    checkStatus(); // Start checking the status
                } else {
                    progressBar.style.display = 'none';
                    resultDiv.style.display = 'block';
                    resultDiv.innerHTML = '<p>' + data.message + '</p>';
                }
            })
            .catch(error => {
                progressBar.style.display = 'none';
                resultDiv.style.display = 'block';
                resultDiv.innerHTML = '<p>There was an error processing your request.</p>';
            });
        });

        function displayResult(filePath, pred) {
            let resultDiv = document.getElementById('result');
            resultDiv.style.display = 'block';
            document.getElementById('uploadForm').style.display = 'none'; // Hide the form
            document.getElementById('text').style.display = 'none';
            let fileType = filePath.split('.').pop().toLowerCase();

            fetch('uploads/pred.txt')
            .then(response => response.text())
            .then(prediction => {
                let content;
if (['mp4', 'webm', 'ogg'].includes(fileType)) {
    content = `<video controls style="max-width: 100%; max-height: 100%;" onerror="handleMediaError(event)">
                  <source src="${filePath}" type="video/${fileType}">
                  Your browser does not support the video tag.
               </video>
               <div class="text-block">
                   <p>${prediction}</p>
               </div>`;
} else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileType)) {
    content = `<div class="container">
                   <img src="${filePath}" alt="Uploaded Image">
                   <div class="text-block">
                       <p>${prediction}</p>
                   </div>
               </div>`;
} else if (['mp3', 'wav', 'ogg'].includes(fileType)) {
    content = `<audio controls style="max-width: 100%; max-height: 100%;" onerror="handleMediaError(event)">
                  <source src="${filePath}" type="audio/${fileType}">
                  Your browser does not support the audio tag.
               </audio>
               <div class="text-block">
                   <p>${prediction}</p>
               </div>`;
} else {
    content = 'Unsupported file type';
}

resultDiv.innerHTML = content;
            })
            .catch(error => {
                console.error('Error fetching prediction:', error);
                resultDiv.innerHTML = 'Error loading prediction';
            });
        }

        function checkStatus() {
            fetch('status.txt')
            .then(response => response.text())
            .then(status => {
                if (status.trim() === '0') {
                    fetch('file.txt')
                    .then(response => response.text())
                    .then(filePath => {
                        fetch('pred.txt')
                        .then(response => response.text())
                        .then(pred => {
                            displayResult(filePath.trim(), pred.trim());
                            // Perform any cleanup or additional actions after displaying result
                            document.getElementById('progressBar').style.display = 'none';
                        })
                    })
                    .catch(error => {
                        console.error('Error fetching file.txt:', error);
                        document.getElementById('progressBar').style.display = 'none';
                        document.getElementById('result').style.display = 'block';
                        document.getElementById('result').innerHTML = '<p>Error fetching result.</p>';
                    });
                } else {
                    setTimeout(checkStatus, 1000); // Check again after 1 second
                }
            })
            .catch(error => {
                console.error('Error checking status:', error);
                document.getElementById('progressBar').style.display = 'none';
                document.getElementById('result').style.display = 'block';
                document.getElementById('result').innerHTML = '<p>Error checking status.</p>';
            });
        }
    </script>
</body>
<footer>
    Copyright © Tech Maniacs | All Rights Reserved 
</footer>
</html>
