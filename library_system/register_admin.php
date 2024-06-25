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
    $admin_id = $_POST['admin_id'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    if (strlen($password) < 8) {
        $errors[] = "";
        echo "Password must have atleast 8 characters.";
    }

    if($password !== $confirm_password) {
        $errors[] = "";
        echo "Password confirmation does not match.";
    }

    if (strlen($phone_no) != 10) {
        $errors[] = "";
        echo "Invalid phone number.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "";
        echo "Invalid email format.";
    }

    if (empty($errors)) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO admin_info (username, admin_id, email, phone_no, password)
                   VALUES ('$username', '$admin_id', '$email', '$phone_no', '$hashedPassword')";
    
    if(mysqli_query($connection,$query)) {
        header("Location: login_admin.php");
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
    <title>Registration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <style>
          *{
            font-family:'Poppins', sans-serif;
        }
        body{
            background-color: rgba(48, 162, 255, 1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
        }
        .std-app{
            height: 570px;
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
            height:400px;
            width: 650px;
            gap: 10px;
            padding-left: 70px;
            
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
            margin-top: -7%;
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
    <h2 align="center" style=" font-size: 30px; color: white;">Register as Admin</h2>
    <form action="register_admin.php" method="post">
        <table class="std">
        <tr>
        <th><label for="username">Username</label></th>
        <td><input type="text" name="username" required></td></tr>
        
        <tr><th><label for="admin_id">admin Id</label></th>
        <td><input type="text" name="admin_id" required></td></tr>
        
        <tr><th><label for="email">Email</label></th>
        <td><input type="email" name="email"></td></tr>

        <tr><th><label for="phone_no">Phone Number</label></th>
        <td><input type="text" name="phone_no" required></td></tr>

        <tr><th><label for="password">Password</label></th>
        <td><input type="password" name="password" required></td></tr>
        
        <tr><th><label for="confirm_password">Confirm Password</label></th>
        <td><input type="password" name="confirm_password" required></td></tr>
        </table>

        
        <center><br><input type="submit" name="register" value="Register" class="sub"></center>
    </form>
</body>
</html>