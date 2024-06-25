<?php

$host = "localhost";
$db_username = "root";
$db_password = "";
$database = "integrated_system";

$connection =  mysqli_connect($host,$db_username,$db_password,$database);

if(!$connection){
    die("Database Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $roll_no = $_POST['roll_no'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $department = $_POST['department'];
    $year = $_POST['year'];
    $residence = $_POST['residence'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    if (strlen($password) < 8) {
        $errors[] = "";
        echo '<div class="error-messages"><p><b>Password must have atleast 8 characters.</b></p></div>';
    }

    if($password !== $confirm_password) {
        $errors[] = "";
        echo '<div class="error-messages"><p><b>Password confirmation does not match.</b></p></div>';
    }

    if (strlen($phone_no) != 10) {
        $errors[] = "";
        echo '<div class="error-messages"><p><b>Invalid phone number.</b></p></div>';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "";
        echo '<div class="error-messages"><p><b>Invalid email format.</b></p></div>';
    }

    if (empty($errors)) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO student_info (username, roll_no, email, phone_no, department, year, residence, password)
                   VALUES ('$username', '$roll_no', '$email', '$phone_no', '$department', '$year', '$residence', '$hashedPassword')";
    
    if(mysqli_query($connection,$query)) {
        header("Location: login_student.php");
        exit;
    }else{
        echo "Error: " . mysqli_error($connection);
    }
    }
}
?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration from</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <style>
      
          *{
            font-family:'Poppins', sans-serif;
        }
        .error-messages {
         background-color:white; 
         color:black;
         padding: 10px 20px;
         margin-bottom: 20px;
         border-radius: 5px;
         }
         .error-messages p {
    margin: 0;
    padding: 0;
}

        
        body{
            background-color: rgba(48, 162, 255, 1);
            display: flex;
            flex-wrap:nowrap;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
        }
        .std-app{
            height: 600px;
            width: 700px;
            color: white;
            background-color: rgba(12,53,106,1);
            border: none;
            border-radius:15px;
            padding: 30px;
            text-align: left;
            display: flex;
            flex-direction: column;
            justify-content: center;
            
        }
        .std{
            height: 600px;
            width: 750px;
            gap: 10px;
            padding-left: 70px;
            color: white;
            text-align: left;
            
        }        
        input{
            height: 35px;
            width: 240px;
            border-radius: 25px; 
            border: none;   
        }
        select{
            height:35px;
            width: 255px;
            border-radius: 25px;
            border: none;
        }
        .circle{
            width:90px;
            height:90px;
            border-radius:50%;
            margin-top: -9%;
        }
        .sub{
    background-color: rgba(0, 196, 255, 1);
    color: white;
    font-size: 20px;
    border-radius: 25px;
    height: 38px;
    width: 250px;
    border: none;
  }
  .sub:hover{
    transition: 0.5s;
    height: 48px;
    width: 260px;
    background-color:white;
    color: black;
  }
  input[type="text"],input[type="email"],input[type="password"],::placeholder {
             font-size: 15px;
             padding-left: 15px;
         }
    </style>
</head>
<body>
    <div class="std-app">
      <center>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8V1YRVsyWYm9waoyPrvuW6N69jeXwZ2pXRw&usqp=CAU" class="circle">
      </center>
    <h2 align="center" style=" font-size: 30px; color: white;">Register as Student</h2>
    <table class="std">
    <form action="register_student.php" method="post">
        <tr><th><label for="username">Username</label></th>
        <td><input type="text" name="username" required></td></tr>
        
        <tr><th><label for="roll_no">Roll number</label></th>
        <td><input type="text" name="roll_no" required></td></tr>
        
        <tr><th><label for="email">Email</label></th>
        <td><input type="email" name="email"></td></tr>

        <tr><th><label for="phone_no">Phone Number</label></th>
        <td><input type="text" name="phone_no" required></td></tr>

        <tr><th><label for="department">Department</label></th>
        <td><select id="department" name="department" required>
            <option value="CS">Computer Science Engineering</option>
            <option value="IT">Information Technology</option>
            <option value="EC">Electronics and communication Engineering</option>
            <option value="EE">Electrical and Electronics Engineering</option>
            <option value="SE">Information and Science Engineering</option>
            <option value="CT">Computer Technology</option>
            <option value="AL">Artificial Engineering and Machine Learning</option>
            <option value="AD">Artificial Intelligence and Data Science</option>
            <option value="FD">Food Technology</option>
            <option value="FT">Fashion Technology</option>
            <option value="TX">Textile Engineering</option>
            <option value="AG">Agricultural Engineering</option>
            <option value="CB">Computer Science and Business System</option>
            <option value="CE">Civil Engineering</option>
            <option value="ME">Mechanical Engineering</option>
            <option value="MH">Mechatronics</option>
            <option value="AE">Aeronautical Engineering</option>
            <option value="EI">Electrical and Instrumentation engineering</option>
            <option value="BT">Bio-Technology</option>
            <option value="BM">Bio-Medical Engineering</option>

        </select></td></tr>
        
        <tr><th><label for="year">Year</label></th>
        <td><select id="year" name="year" required>
            <option value="FIRST YEAR">First Year</option>
            <option value="SECOND YEAR">Second Year</option>
            <option value="THIRD YEAR">Third Year</option>
            <option value="FOURTH YEAR">Fourth Year</option>
        </select></td></tr>
        
        <tr><th><label for="residence">Residence</label></th>
        <td><select id="residence" name="residence" required>
            <option value="HOSTELLER">Hosteller</option>
            <option value="DAYSCHOLAR">Dayscholar</option>
        </select></td></tr>

        <tr><th><label for="password">Password</label></th>
        <td><input type="password" name="password" required></td></tr>
        
        <tr><th><label for="confirm_password">Confirm Password</label></th>
        <td><input type="password" name="confirm_password" required></td></tr></table><br>

        
        <center><input type="submit" name="register" value="Register" class="sub"></center>
    </form>
    </div>
</body>
</html>