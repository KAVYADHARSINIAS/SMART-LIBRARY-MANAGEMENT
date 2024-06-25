<?php
if (isset($_GET["id"])) {
    $bookId = $_GET["id"];

  
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "integrated_system";

 
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM books WHERE book_id = $bookId"; 

    if ($conn->query($sql) === TRUE) {
       
        header("Location: book_management.php");
        exit();
    } else {
        echo "Error deleting book: " . $conn->error;
    }

  
    $conn->close();
} else {
    echo "Invalid book ID.";
}
?>
