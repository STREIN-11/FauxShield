<!-- <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeepfakeAi</title>
    <style>
        /* CSS styles remain unchanged */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .hero {
            width: 100%;
            height: 1000px;
            background: linear-gradient(rgba(127, 2, 54, 0.7), rgba(20, 2, 112, 0.7)), url('src/assets/hero.jpg');
            background-repeat: no-repeat;
            background-size: 100% 100%;
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
            font-weight: 600px;
        }

        .hero-text p {
            max-width: 700px;
            margin: 0px auto 20px;
            line-height: 1;
            text-align: center;
            font-size: 18px;
            font-family: "Playfair Display", serif;
        }

        .form {
            width: 400px;
            margin-left: 23%;
        }

        .file-upload-wrapper {
            position: relative;
            width: 100%;
            height: 60px;
            cursor: pointer;
        }

        .file-upload-wrapper::after {
            content: attr(data-text);
            font-size: 18px;
            position: absolute;
            top: 0;
            left: 0;
            background: #fff;
            padding: 10px 15px;
            display: block;
            width: calc(100% - 40px);
            pointer-events: none;
            z-index: 20;
            height: 40px;
            line-height: 40px;
            color: #999;
            border-radius: 5px 10px 10px 5px;
            font-weight: 300;
            text-align: left;
        }

        .file-upload-wrapper::before {
            content: "upload";
            position: absolute;
            top: 0;
            right: 0;
            display: inline-block;
            height: 60px;
            background: -webkit-linear-gradient(to right, #24C6DC, #7f4a9d);
            background: linear-gradient(to right, #24C6DC, #7f4a9d);
            color: #fff;
            font-weight: 700;
            z-index: 25;
            font-size: 16px;
            line-height: 60px;
            padding: 0 15px;
            text-transform: uppercase;
            pointer-events: none;
            border-radius: 0 5px 5px 0;
            transition: 0.5s ease-in-out;
        }

        .file-upload-wrapper:hover::before {
            background: -webkit-linear-gradient(to right, #7f4a9d, #24C6DC);
            background: linear-gradient(to right, #7f4a9d, #24C6DC);
        }

        .file-upload-wrapper input {
            opacity: 0;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 99;
            height: 40px;
            margin: 0;
            padding: 0;
            display: block;
            cursor: pointer;
            width: 100%;
        }

        .nav {
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
            width: 35px;
        }

        .nav p {
            display: block;
            font-size: x-large;
            margin-top: 0.67em;
            margin-bottom: 0.67em;
            margin-right: 29em;
            font-weight: bold;
        }

        .nav ul li {
            display: inline-block;
            list-style: none;
            margin: 5px 5px;
            font-size: 14px;
            padding-left: 20px;
            text-align: center;
            cursor: pointer;
        }
        .nav a:visited{
          color: white;
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
            width: 0;
            background-color: #24C6DC;
            text-align: center;
            line-height: 20px;
            color: white;
            transition: width 0.5s;
        }

        #result {
            display: none;
            margin-top: 20px;
            max-width: 100%;
        }

        #result img, #result video {
            max-width: 100%;
            height: auto;
        }
        footer{
          width: 100%;
            background: #333;
            color: #fff;
            padding: 4px 0;
            position: fixed;
            /* top: 0; */
            left: 0;
            bottom:0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 10;
            text-align:center;
    }
    /* footer h4{
            display: inline-block;
            list-style: none;
            margin: 5px 5px;
            font-size: 14px;
            padding-left: 20px;
            text-align: center;
            cursor: pointer;
        } */
    
    
    </style>
</head>
<body class="hero">
<div class="nav">
    <img src='src/assets/logo.png' alt="">
    <p class="navbar-text">Deepfake Ai</p>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li>About us</li>
        <li><button class='btn'>Contact us</button></li>
    </ul>
</div>
<div class="hero-text">
    <h1>Detection of DeepFake Videos and Photos</h1>
    <p>By using this system you can identify and detect DeepFake videos and images</p>
    <form id="uploadForm" enctype="multipart/form-data" method="POST">
        <input type="file" name="fileToUpload" id="fileToUpload"></input>
        <input type="submit" value="Submit" name="submit"></input>
    </form>
    <div class="progress-bar" id="progressBar">
        <div class="progress-bar-fill" id="progressBarFill">Processing...</div>
    </div>
    <div id="result"></div>
</div>

<script>
    document.getElementById('uploadForm').addEventListener('submit', function (e) {
        e.preventDefault();

        let progressBar = document.getElementById('progressBar');
        let progressBarFill = document.getElementById('progressBarFill');
        progressBar.style.display = 'block';

        let width = 0;
        let interval = setInterval(function () {
            if (width >= 100) {
                clearInterval(interval);
            } else {
                width++;
                progressBarFill.style.width = width + '%';
                progressBarFill.innerText = width + '%';
            }
        }, 100);

        let formData = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'upload.php', true);

        xhr.upload.addEventListener('progress', function (e) {
            if (e.lengthComputable) {
                let percentComplete = (e.loaded / e.total) * 100;
                progressBarFill.style.width = percentComplete + '%';
                progressBarFill.innerText = Math.round(percentComplete) + '%';
            }
        });

        xhr.onload = function () {
            if (xhr.status === 200) {
                clearInterval(interval);
                progressBarFill.style.width = '100%';
                progressBarFill.innerText = 'Upload Complete';
                
                let response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    displayResult("test.jpg");
                } else {
                    console.error('File upload failed:', response.message);
                }
            } else {
                console.error('An error occurred while uploading the file.');
            }
        };

        xhr.send(formData);
    });

    function displayResult(filePath) {
        let resultDiv = document.getElementById('result');
        resultDiv.style.display = 'block';
        let fileType = filePath.split('.').pop().toLowerCase();
        let content;
        if (['mp4', 'webm', 'ogg'].includes(fileType)) {
            content = `<video controls><source src="${filePath}" type="video/${fileType}"></video>`;
        } else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileType)) {
            content = `<img src="${filePath}" alt="Uploaded Image">`;
        } else {
            content = 'Unsupported file type';
        }
        resultDiv.innerHTML = content;
    }
</script>
</body>
<footer>
        <h4>Copyright © Tech Maniacs | All Rights Reserved</h4>
  </footer>
</html> -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload with Progress Bar</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
        .nav {
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
            width: 35px;
        }

        .nav p {
            display: block;
            font-size: x-large;
            margin-top: 0.67em;
            margin-bottom: 0.67em;
            margin-right: 29em;
            font-weight: bold;
        }

        .nav ul li {
            display: inline-block;
            list-style: none;
            margin: 5px 5px;
            font-size: 14px;
            padding-left: 20px;
            text-align: center;
            cursor: pointer;
        }
        .nav a:visited{
          color: white;
        }
        footer{
          width: 100%;
            background: #333;
            color: #fff;
            padding: 4px 0;
            position: fixed;
            /* top: 0; */
            left: 0;
            bottom:0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 10;
            text-align:center;
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
        #result {
    display: none;
    margin-top: 20px;
    max-width: 100%;
    max-height: 80vh; /* Adjust max-height as needed */
    overflow: auto; /* Enable scrolling if content exceeds max-height */
}

    </style>
</head>
<body class="hero">
<div class="nav">
    <img src='src/assets/logo.png' alt="">
    <p class="navbar-text">Deepfake Ai</p>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li>About us</li>
        <li><button class='btn'>Contact us</button></li>
    </ul>
</div>
    <div class="hero-text">
        <h1>Detection of DeepFake Videos and Photos</h1>
        <p>By using this system you can identify and detect DeepFake videos and images</p>
        <form id="uploadForm" enctype="multipart/form-data" method="POST">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Submit" name="submit">
        </form>
        <div class="progress-bar" id="progressBar">
            <div class="progress-bar-fill" id="progressBarFill">Processing...</div>
        </div>
        <div id="result">
            
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
            fetch('file.txt')
            .then(response => response.text())
            .then(filePath => {
                displayResult(filePath.trim());
                // Perform any cleanup or additional actions after displaying result
                document.getElementById('progressBar').style.display = 'none';
            }) // Start checking the status
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

function displayResult(filePath) {
    let resultDiv = document.getElementById('result');
    resultDiv.style.display = 'block';
    
    let fileType = filePath.split('.').pop().toLowerCase();
    let content;
    
    if (['mp4', 'webm', 'ogg'].includes(fileType)) {
        content = `<video controls style="max-width: 100%; max-height: 100%;"><source src="${filePath}" type="video/${fileType}"></video>`;
    } else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileType)) {
        content = `<img src="${filePath}" alt="Uploaded Image" style="max-width: 100%; max-height: 100%; object-fit: contain;">`;
    } else {
        content = 'Unsupported file type';
    }
    
    resultDiv.innerHTML = content;
}


    </script>
</body>
<footer>
        Copyright © Tech Maniacs | All Rights Reserved
  </footer>
</html>
