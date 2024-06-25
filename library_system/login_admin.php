<?php
$connection = mysqli_connect("localhost", "root", "", "appointment_booking");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = ""; 

    
    if (substr($username,0,4)==='7376') {
       
        $query = "SELECT id, password FROM student_info WHERE roll_no = '$username'";
        $redirectURL = "profile.php";
    } elseif (substr($username,0,3)==='123')  {
      
        $query = "SELECT password FROM admin_info WHERE faculty_id = '$username'";
        $redirectURL = "admin_appointments.php"; // Redirect admins to the admin dashboard
    } else {
 
        $login_error = "Invalid username format.";
    }

   
    if (!empty($query)) {
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $storedHashedPassword = $row['password'];

            if (password_verify($password, $storedHashedPassword)) {
                
                session_start();
                $_SESSION['user_id'] = $row['id'];

                header("Location: $redirectURL");
                exit;
            } else {
                $login_error = "Incorrect username or password.";
            }
        } else {
            $login_error = "User not found";
        }
    }
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

 <script>
       
        setTimeout(function() {
            window.location.href = "admin_profile.php";
        }, 5000);
    </script>
    <style>
        *{
            font-family: Poppins, sans-serif;
            
        }
        body{
        background-color:rgba(48, 162, 255, 1);
        }
        .container {   
        padding: 50px; 
        background-color:rgba(12,53,106,1);  
        width:40%;
        margin-top:19%;
        border-radius:19px;
        margin-top: 95px;
        } 
        .circle{
            width:120px;
            height:120px;
            border-radius:50%;
            position:absolute ;
            top:42px;
            left:693px;
        } 
        .button{
            width:150px;
            height: 50px;
            border-radius: 11%;
            background-color: rgba(0, 196, 255, 1);
        }
        .form {
    background-color: rgba(12,53,106,1);
    border-radius: 20px;
    box-sizing: border-box;
    padding: 20px;
    width: 320px;
  }
  
  .input-container {
    margin-top: 20px;
    position: relative;
  }
  
  .input {
    background-color: gray;
    border-radius: 15px;
    border: 0;
    box-sizing: border-box;
    color: white;
    font-size: 18px;
    height: 50px;
    outline: 0;
    padding: 4px 20px;
    width: 100%;
  }
  
  .cut {
    background-color: rgba(12,53,106,1);
    border-radius: 7px;
    height: 20px;
    position: absolute;
    top: -20px;
    transform: translateY(0);
    transition: transform 200ms;
    width: 76px;
  }
  
  .placeholder {
    color: white;
    font-family: sans-serif;
    left:6px;
    line-height: 14px;
    pointer-events: none;
    position: absolute;
    transform-origin: 0 50%;
    transition: transform 200ms, color 200ms;
    top: 20px;
  }
  
  .input:focus ~ .cut,
  .input:not(:placeholder-shown) ~ .cut {
    transform: translateY(8px);
  }
  
  .input:focus ~ .placeholder,
  .input:not(:placeholder-shown) ~ .placeholder {
    transform: translateY(-35px) translateX(10px) scale(0.75);
  }
  
  .input:not(:placeholder-shown) ~ .placeholder {
    color: #b3b3bb;
  }
  
  .input:focus ~ .placeholder {
    color: white;
  }
  .sub{
    background-color: rgba(0, 196, 255, 1);
    color: white;
    font-size: 20px;
    border-radius: 15px;
    height: 50px;
    width: 100px;
    border: none;
  }
    </style>
</head>
<body>
<center><div class="container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8V1YRVsyWYm9waoyPrvuW6N69jeXwZ2pXRw&usqp=CAU"  class="circle"align="center"><br>
    <h1 style="color: white;size: 60px;">Admin Login</h1>
    <div class="fin"><div class="touch">
            <div class="forms">
            <div class="form">
            <div class="input-container ic1">
    <form method="POST" action="login_admin.php">
        <input type="text" name="username" id="username" class="input" placeholder="" required>
        <div class="cut"></div>
        <label for="username" class="placeholder">Username:</label>
        </div><br>
            <div class="input-container ic2">
        <input type="password" name="password" id="password" class="input" placeholder="" required>
        <div class="cut"></div>
        <label for="password" class="placeholder">Password:</label>
        </div>
        </div>
        </div>
            </div>
        </div><br>
        <input type="submit" name="login" value="Login" class="sub">
        </div>
    </center>
    </form>
    <?php
    if (isset($login_error)) {
        echo "<p>$login_error</p>";
    }
    ?>
</body>
</html>
