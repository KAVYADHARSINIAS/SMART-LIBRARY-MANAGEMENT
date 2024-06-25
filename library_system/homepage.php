<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INTEGRATED LIBRARY MANAGEMENT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
        *{
            font-family:'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
        body{
        max-width: 100%;
        height: 100vh;
        }
        .bg-img {
        max-width: 100%;
        height: 100vh;
        background-image:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)), url("learning-centre-2 (1).webp");
        background-size:cover;
        background-position: center;
        }
        .menu{
            width:85%;
            margin:auto;
            padding: 35px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;

        }
        .logo{
            width:100px;
            height: 100px;
            border-radius:50%;
            cursor: pointer;
        }
        .menu ul li{
            list-style: none;
            display: inline-block;
            margin:0 20px;
            position: relative;
        }
        .menu ul li a{
            text-decoration: none;
            color:#fff;
            text-transform: uppercase;
        }
        .menu ul li::after{
            content:'';
            height: 3px;
            width:0%;
            background: rgba(48, 162, 255, 1);
            position: absolute;
            left:0;
            bottom:-10px;
            transition:0.5s;
        }
        .menu ul li:hover::after{
            width: 100%;
        }
        button{
            width: 200px;
            padding: 15px 0;
            text-align: center;
            margin: 20px 10px;
            border-radius: 30px;
            font-weight: bold;
            border: 2px solid rgba(48, 162, 255, 1);
            background: transparent;
            color:white;
            cursor: pointer;
            font-size: 20px;
            position: relative;
            overflow: hidden;
        }
        .log-btn{
            display: flex;
            align-items: center;
            justify-content: center;
        }
       
        button:hover .span{
            width: 100%;
        }
        button:hover{
            border: none;
        }
        .contact-us{
            height: 300px;
            width:100%;
            background-color:rgba(48, 162, 255, 1) ;
            color:white;
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            justify-content:flex-start ;
        }
        .detail{
            font-size: 15px;
            margin-left: 100px;

        }
        .ph-no:hover{
            color:rgba(12,53,106,1);
            font-size: 20px;
            cursor: pointer;
            transition: 0.5s;
        }
        .follow{
            font-size: 15px;
            margin-left: 150px;
            padding: 20px;
        }
        .logo{
            display: flex;
            flex-direction: row;
            gap:20px;
        }
        .logo-img{
            height:40px;
            width: 40px;
        }
        .logo-img:hover{
            height:60px;
            width: 60px;
            transition:0.5s;
            cursor:pointer
        }
        .span {
    background: rgba(48, 162, 255, 1);
    height: 100%;
    width: 0;
    border-radius: 30px;
    position: absolute;
    left: 0;
    bottom: 0;
    z-index: 1;
    transition: 0.5s;
}

.btn-text {
    position: relative;
    z-index: 2;
}

button:hover .bg-effect {
    width: 100%;
}
.register-us{
    display: flex;
    justify-content: flex-end;
    padding-top: 150px;
}
.btn{
    display: none;
}

    </style>
    <script>
        function toggleButton() {
          var btn = document.getElementById("myButton");
          if (btn.style.display === "none") {
            btn.style.display = "block";
          } else {
            btn.style.display = "none";
          }
        }
      </script>
</head>
<body>
    <div class="bg-img">
        <div class="menu"> 
            <img src="data:image/jpeg;base64,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" class="logo">
            <ul>
                <li id="home"><a href="#home">Home</a></li>
                <li onclick="toggleButton()"><a href="#register">Register</a></li>
                <li ><a href="#contact">Contact Us</a></li>
                <li><a href="aboutus.html">About Us</a></li>
            </ul>
        </div>
            <h1 align="center" style="font-size:45px;color: #fff;"><span style="color: rgba(48, 162, 255, 1);font-size: 60px;">B</span>ANNARI AMMAN <span style="color: rgba(48, 162, 255, 1);font-size: 60px;">I</span>NSTITUTE OF <span style="color: rgba(48, 162, 255, 1);font-size: 60px;">T</span>ECHNOLOGY</h1><BR>
            <P align="center" style="font-size:40px;color: #fff;">INTEGRATED LIBRARY MANAGEMENT <br></P>
        <div class="log-btn">
            <a href="http://localhost/library_system/login_student.php"><button type="button"><span class="span"></span><span class="btn-text">Login as Student</span></button></a>
            <a href="http://localhost/library_system/login_admin.php"><button type="button"><span class="span"></span><span class="btn-text">Login as Admin</span></button></a>
        </div>
        <div class="register-us">
        <div class="log-btn">
         <div class="btn" id="myButton">
            <a href="http://localhost/library_system/register_student.php"><button type="button"><span class="span"></span><span class="btn-text" style="font-size: 15px;">Register as Student</span></button></a>
             <a href="http://localhost/library_system/register_admin.php"><button type="button"><span class="span"></span><span class="btn-text"style="font-size: 15px;">Register as Admin</span></button></a>
         </div>
        </div>
        </div>
</div>
    <div class="contact-us" id="contact">
        <div class="detail">
        <img src="https://www.bitsathy.ac.in/wp-content/themes/baiotsathycollege/assets/images/logo2.png">
        <p><div style="font-size: 20px;">Alathukombai - Post,Sathyamangalam - 638 401,<br>
           Erode District, Tamil Nadu, India.</div>
            <div class="ph-no">+91 4295 226000</div>
            <div class="ph-no">+91 99429 21289</div>
            <div class="ph-no">stayahead@bitsathy.ac.in</div></p>
        </div>
        <div class="follow">
            <div class="ph-no"><h1>Follow us on</h1><br></div>
            <div class="logo">
                <a href="https://www.facebook.com/bitsathyindia/"><img src="https://cdn-icons-png.flaticon.com/128/733/733547.png" class="logo-img"></a>
                <a href="https://www.instagram.com/lifeatbit/"><img src="https://cdn-icons-png.flaticon.com/128/1409/1409946.png"class="logo-img"></a>
                <a href="https://twitter.com/Bitsathyindia"><img src="https://cdn-icons-png.flaticon.com/128/3256/3256013.png"class="logo-img"></a>
                <a href="https://www.youtube.com/@BITSathyindia"><img src="https://cdn-icons-png.flaticon.com/128/1384/1384060.png
                    "class="logo-img"></a>
                <a href="https://www.linkedin.com/school/bitsathyindia/?originalSubdomain=in"><img src="https://cdn-icons-png.flaticon.com/128/3536/3536505.png"class="logo-img"></a>
            </div>
    
        </div>
    

    </div>

    
</body>
</html>