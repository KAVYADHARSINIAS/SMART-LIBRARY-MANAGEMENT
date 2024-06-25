<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "integrated_system"; 


$mysqli = new mysqli($servername, $username, $password, $dbname);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_GET['book_name'])) {
    $bookName = $_GET['book_name'];

    $bookQuery = "SELECT * FROM books WHERE book = '$bookName'";
    $bookResult = $mysqli->query($bookQuery);

    if ($bookResult->num_rows > 0) {
        $bookDetails = $bookResult->fetch_assoc();

        if ($bookDetails['availability'] == 'Available') {
            
            $reserveQuery = "UPDATE books SET availability = 'Reserved' WHERE book = '$bookName'";
            $mysqli->query($reserveQuery);

            $message = "Reserved successfully!";
        } else {
            $message = "Already reserved!";
        }
    } 
}


$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Reservation Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1 align=center>RESERVATION DETAILS</h1>
        <?php
        if (isset($message)) {
            echo "<p>$message</p>";
        }
        if (isset($bookDetails)) {
            echo "<h2 align=center>Book Details</h2>";
            echo "<p><strong>Book Name:</strong> " . $bookDetails['book'] . "</p>";
            echo "<p><strong>Author:</strong> " . $bookDetails['author'] . "</p>";
            echo "<p><strong>Category:</strong> " . $bookDetails['category'] . "</p>";
            echo "<p><strong>Availability:</strong> " . $bookDetails['availability'] . "</p>";
        } else {
            echo "<p>Book not found.</p>";
        }
        if ($bookDetails['availability'] == 'Reserved') {
           
            echo "<form method='post' action='cancel_reservation.php'>";
            echo "<input type='hidden' name='book_name' value='" . $bookDetails['book'] . "'>";
            echo "<input type='submit' name='cancel_reservation' value='Cancel Reservation'>";
            echo "</form>";
        }
    else {
        echo "<p>Book not found.</p>";
    }
    ?>
        
        <br>

    </div>
</body>
<style>
    body {
    background-color: #007BFF;
    color: #000;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

.container {
    background-color: #fff;
    color: #000;
    padding: 20px;
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

form {
    display: inline-block;
}

input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

</style>