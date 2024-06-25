<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book = $_POST["book"]; 
    $author = $_POST["author"];
    $category = $_POST["category"];
    $availability = $_POST["availability"];

  
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "integrated_system";

   
    $conn = new mysqli($host, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "INSERT INTO books (book, author, category, availability) VALUES ('$book', '$author', '$category', '$availability')";

    if ($conn->query($sql) === TRUE) {
       
        header("Location: book_management.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
    $conn->close();
}

?>
<style>
   
label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}


input[type="text"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}


button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

</style>
