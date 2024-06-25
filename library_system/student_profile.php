<?php
$host = "localhost";
$db_username = "root";
$db_password = "";
$database = "integrated_system";

$connection = mysqli_connect($host, $db_username, $db_password, $database);

if (!$connection) {
    die("Database Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM student_info";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($connection));

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
         *{
            font-family: Poppins, sans-serif;
            
        }
        body{
            background-color: white; 
            display: flex;
            margin: 0;
            padding: 0;
        }
        #sidebar {
            height: 100vh;
            width: 330px;
            color: #fff;
            box-sizing: border-box;
            font-size: 18px;
            line-height: 150%;
            display: flex;
            flex-direction: column;
            border-radius: 0px 20px 20px 0;
            overflow: hidden;
            background-color: white;
        }

        .left-top {
            flex: 0.20;
            background-color: rgba(12, 53, 106, 1);
        }

        .left-bottom {
            flex: 0.85;
            background-color: #30A2FF;
            padding: 30px;
            padding-top: 50px;
        }

        .circle1 {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-top: -120px;
        }

        #content {
            flex-grow: 1;
            padding: 20px;
        }

        #footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
        }

        #sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        #sidebar ul li {
            margin-bottom: 10px;
        }

        #sidebar li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 19px;
            font-size: 17px;
        }

        #sidebar ul li a {
            text-decoration: none;
            color: black;
            display: block;
        }

        .img {
            width: 12%;
            height: 4%;
            padding-right: 20px;

        }


        .container1 {
            
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            
        }
    .container {
       
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
      
    }
    table{
        height:400px;
        width: 800px;
    }

    
    .container{
            display: flex;
            gap: 600px;
            background-color: rgba(12,53,106,1);
            flex-direction: column;
            gap: 300px;
            height: 00vh;
            align-items: center;
            height: 500px;
            width: 850px;
            border-radius: 15px;
            color: white;
            padding: 10px;
            padding-top: 100px;
            margin-left: 100px;
        }
    
        .main-content{
            background-color: white; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            margin-left: 100px;
        }
        .bg-effect{
        background: black;
        height: 100%;
        width:0;
        border-radius: 30px;
        position: absolute;
        left: 0;
        bottom:0;
        z-index: 1;
        transition: 0.5s;
        color: black;
    }
    .btn-text {
    position: relative;
    z-index: 2;
}


button:hover .bg-effect {
    width: 100%;
}
    button:hover{
        border: none;
        color: black;
    }
    button{
        width: 200px;
        padding: 5px 0;
        text-align: center;
        margin: 20px 10px;
        border-radius: 30px;
        font-weight: bold;
        background-color:rgba(48, 162, 255, 1) ;
        color: white;
        cursor: pointer;
        overflow: hidden;
        position: relative;
        border: none;
        font-size: 20px;
    }
    #sidebar ul li a:hover{
        color:white;
        transition: 0.5s;
        cursor: pointer;
    }
</style>
</head>

<body>
<div class="container1">
        <div id="sidebar">
            <div class="left-top">
            </div>
            <div class="left-bottom">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8V1YRVsyWYm9waoyPrvuW6N69jeXwZ2pXRw&usqp=CAU" class="circle1" align="center">
                <h2>Student Profile</h2>
                <ul>
                    <li><img src="https://cdn-icons-png.flaticon.com/128/2636/2636428.png" class="img"><a href="student_profile.php" style="color:white;">Profile</a></li>
                    <li><img src="https://cdn-icons-png.flaticon.com/128/7322/7322265.png" class="img"><a href="catalog.php">Book Catalog</a></li>
                    <li><img src="https://cdn-icons-png.flaticon.com/128/2645/2645897.png" class="img"><a href="search_catalog.php">Reservation</a></li>
                    <li><img src="https://cdn-icons-png.flaticon.com/128/1979/1979288.png" class="img"><a href="student_fine.php">Fines and Dues</a></li>
                    <li><img src="https://cdn-icons-png.flaticon.com/128/3503/3503786.png" class="img"><a href="">Notification</a></li>
                    <li> <img src="https://cdn-icons-png.flaticon.com/128/3503/3503827.png" class="img"><a href="develped_by.html">Developed by</a></li>
                </ul>
            </div>
        </div>
        
        <div class="main-content">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          
            <center><table class="container">
            <h1>Welcome, <?php echo $row['username']; ?></h1>
  <center> <tr>
        <td><strong>Username:</strong></td>
        <td><?php echo $row['username']; ?></td>
    </tr><br><br>
    <tr>
        <td><strong>Roll Number:</strong></td>
        <td><?php echo $row['roll_no']; ?></td>
    </tr>
    <tr>
        <td><strong>Email:</strong></td>
        <td><?php echo $row['email']; ?></td>
    </tr>
    <tr>
        <td><strong>Phone Number:</strong></td>
        <td><?php echo $row['phone_no']; ?></td>
    </tr>
    <tr>
        <td><strong>Department:</strong></td>
        <td><?php echo $row['department']; ?></td>
    </tr>
    <tr>
        <td><strong>Year:</strong></td>
        <td><?php echo $row['year']; ?></td>
    </tr>
    <tr>
        <td><strong>Residence:</strong></td>
        <td><?php echo $row['residence']; ?></td>
    </tr></center>
  <center><tr><td> <a href="homepage.php"><button class="logout"><span class="bg-effect"></span><span class="btn-text">Logout</span></button></a>
        </div></td></tr></center>
    
</table></center>


    <?php } ?>

   
    </div>

</body>

</html>
