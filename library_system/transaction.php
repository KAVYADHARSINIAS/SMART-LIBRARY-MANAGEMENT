<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "integrated_system"; 

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


$reservationsQuery = "SELECT book, author, category FROM reservations";
$reservationsResult = $mysqli->query($reservationsQuery);


$usernameQuery = "SELECT username FROM student_info";
$usernameResult = $mysqli->query($usernameQuery);


$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaction Management - Admin Side</title>
</head>
<body>
    <h1>Transaction Management </h1>
    <h2>Student Usernames</h2>
    <ul>
        <?php
        while ($row = $usernameResult->fetch_assoc()) {
            echo "<li>" . $row['username'] . "</li>";
        }
        ?>
   
    <h2>Reserved Book Details</h2>
    <table>
        <tr>
            <th>Book Name</th>
            <th>Author</th>
            <th>Category</th>
        </tr>
        <?php
        while ($row = $reservationsResult->fetch_assoc()) {
            echo "<tr><td>" . $row['book'] . "</td><td>" . $row['author'] . "</td><td>" . $row['category'] . "</td></tr>";
        }
        ?>
        
    
    </table>

    
        
    </ul>
    <center><tr><td> <a href="admin_profile.php"><button class="logout"><span class="bg-effect"></span><span class="btn-text">Back</span></button></a>
        </div></td></tr></center>
</body>
</html>
<style>
        body {
            background-color: white; 
            color: black; 
            text-align: center; 
            font-family: Arial, sans-serif; 
        }

        h1, h2 {
            color: black; 
        }

        ul {
            list-style: none; 
            padding: 0; 
        }

        li {
            margin: 10px 0;
        }

        table {
            margin: 0 auto; 
            border-collapse: collapse; 
        }

        table, th, td {
            border: 1px solid white; 
        }

        th, td {
            padding: 8px; 
        }

        th {
            background-color: blue; 
        }

        tr:nth-child(even) {
            background-color: lightblue; 
        }

        tr:nth-child(odd) {
            background-color: deepskyblue; 
        }
        
.logout {
    background-color: #3498db; 
    color: #fff; 
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 10px 2px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.logout:hover {
    background-color: #2980b9; 
}

    </style>