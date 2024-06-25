<?php
$servername = "localhost"; // Replace with your MySQL server hostname
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "integrated_system"; // Replace with your MySQL database name

// Create a database connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch available books from the database
$sql = "SELECT * FROM books";
$result = $mysqli->query($sql);
$books = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}


$mysqli->close();
?>
<?php

$availableBooks = array_filter($books, function($book) {
    return $book['availability'] == 'Available';
});
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Catalog</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1 align=center>RESERVATION</h1>
        <br>
       
        
        <br>
    </div>
</body>
</html>

<?php



$availableBooks = array_filter($books, function($book) {
    return in_array($book['availability'], ['Available', 'Reserved']);
});
?>


<table>
    <tr>
        <th>Book</th>
        <th>Author</th>
        <th>Category</th>
        <th>Availability</th>
        <th>Actions</th>
    </tr>
    <?php
    foreach ($availableBooks as $book) {
        echo "<tr>";
        echo "<td>" . $book["book"] . "</td>";
        echo "<td>" . $book["author"] . "</td>";
        echo "<td>" . $book["category"] . "</td>";
        echo "<td>" . $book["availability"] . "</td>";
        echo "<td><a href='reservation.php?book_name=" . $book["book"] . "'>Reserve</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<style>

* {
    margin: 0;
    padding: 0;
}


html, body {
    background-color: #fff; 
    color: #007BFF; 
    font-family: Arial, sans-serif;
}


.container {
    text-align: center;
    margin: 20px;
}


table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto;
    background-color: #007BFF;
    color: #fff; 
}


th {
    background-color: #007BFF; 
    color: #fff;
    padding: 10px;
    text-align: left;
}


tr {
    background-color: #fff; 
    color: #000; 
}


td {
    padding: 10px;
    text-align: left;
}


td a {
    color: #ff0000; 
    text-decoration: none;
    padding: 5px 10px;
    background-color: #007BFF; 
    border: 1px solid #ff0000;
    border-radius: 5px;
}
td a:hover {
    text-decoration: underline;
}

h1, h2 {
    color: #000; 
}

th {
    background-color: #007BFF; 
    color: #000; 
    padding: 10px;
    text-align: left;
}

</style>