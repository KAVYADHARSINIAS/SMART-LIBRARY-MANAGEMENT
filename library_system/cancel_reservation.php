<?php
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "integrated_system"; 

$mysqli = new mysqli($servername, $username, $password, $dbname);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['book_name'])) {
    $bookName = $_POST['book_name'];


    $bookQuery = "SELECT * FROM books WHERE book = '$bookName' AND availability = 'Reserved'";
    $bookResult = $mysqli->query($bookQuery);

    if ($bookResult->num_rows > 0) {
       
        $reserveQuery = "UPDATE books SET availability = 'Available' WHERE book = '$bookName'";
        $mysqli->query($reserveQuery);

        $message = "Reservation canceled successfully!";
    } else {
        $message = "Book is not reserved or not found.";
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cancel Reservation</title>
</head>
<body>
    <div class="container">
        <h1 align=center>CANCEL RESERVATION</h1>
        <?php
        if (isset($message)) {
            echo "<p>$message</p>";
        }
        ?>
        <a href="search_catalog.php">Back to Resrvation</a>
    </div>
    <center><tr><td> <a href="student_profile.php"><button class="logout"><span class="bg-effect"></span><span class="btn-text">Back</span></button></a>
        </div></td></tr></center>
    
</body>
</html>
<style>
    
.container {
    background-color: #007BFF; 
    color: #fff; 
    padding: 20px;
    font-family: Arial, sans-serif;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    text-align: center;
}

h1 {
    color: #000;
}

p {
    color: #000;
}

a {
    color: #007BFF;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
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