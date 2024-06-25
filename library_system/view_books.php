
</html>
<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "integrated_system";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM books";
$result = $conn->query($sql);

echo '<table>';
echo '<tr>';
echo '<th>book</th>'; 
echo '<th>Author</th>';
echo '<th>Category</th>';
echo '<th>Availability</th>';
echo '</tr>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["book"] . '</td>';
        echo '<td>' . $row["author"] . '</td>';
        echo '<td>' . $row["category"] . '</td>';
        echo '<td>' . $row["availability"] . '</td>';
        
       
        echo '<td><a href="delete_book.php?id=' . $row["book_id"] . '">Delete</a></td>';
        
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5">No books found</td></tr>';
}


echo '</table>';

$conn->close();

?>

<style>
   
html, body {
    background-color: #fff; 
    color: #000; 
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}


table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-family: Arial, sans-serif;
    border: 1px solid #fff; 
}

th {
    background-color: #007BFF; 
    color: #000; 
    padding: 10px;
    text-align: left; 
}


tr {
    background-color: #fff; 
    color: #000;
}

a {
    color: #f00;
    text-decoration: none;
}
a:hover {
    text-decoration: underline;
}


</style>