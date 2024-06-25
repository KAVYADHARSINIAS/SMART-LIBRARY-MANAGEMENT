<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "integrated_system"; 

$mysqli = new mysqli($servername, $username, $password, $dbname);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$message = ""; 


if (isset($_POST['insert_fine'])) {
    $book_name = $_POST['book_name'];
    $fine_amount = $_POST['fine_amount'];
    $due_date = $_POST['due_date'];

    $insertQuery = "INSERT INTO fines (book_name, fine_amount, due_date) VALUES (?, ?, ?)";

    
    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("sds", $book_name, $fine_amount, $due_date);

    if ($stmt->execute()) {
        $message = "";
        echo '<script>alert("Fine information inserted successfully!");</script>';
    } else {
        $message = "Error inserting fine information: " . $stmt->error;
    }

    $stmt->close(); 
}

if (isset($_POST['delete_fine'])) {
    $fineId = $_POST['fine_id'];

  
    $deleteQuery = "DELETE FROM fines WHERE id = ?";

   
    $stmt = $mysqli->prepare($deleteQuery);
    $stmt->bind_param("i", $fineId);

    if ($stmt->execute()) {
        $deleteMessage = "";
    } else {
        $deleteMessage = "Error deleting fine information: " . $stmt->error;
    }

    $stmt->close(); 
}

$fineQuery = "SELECT * FROM fines";
$fineResult = $mysqli->query($fineQuery);


$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fine Management</title>
    <script>
        function redirectToInsertion() {
            window.location.href = "fines.php";
        }
    </script>
</head>
<body>
    <h1>Fine Management </h1>


    <h2>Insert Fine Information</h2>
    <form method="post" action="fines.php" onsubmit="redirectToInsertion()">
        <label for="book_name">Book Name:</label>
        <input type="text" name="book_name" required><br><br>

        <label for="fine_amount">Fine Amount:</label>
        <input type="number" name ="fine_amount"  required><br><br>


        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" required><br><br>

        <input type="submit" name="insert_fine" value="Insert Fine Information">
    </form>

 
    <h2>Existing Fines</h2>
    <table>
        <tr>
            <th>Book Name</th>
            <th>Fine Amount</th>
            <th>Due Date</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = $fineResult->fetch_assoc()) {
            echo "<tr><td>" . $row['book_name'] . "</td><td>" . $row['fine_amount'] . "</td><td>" . $row['due_date'] . "</td>";
            echo '<td><form method="post" action="fines.php">';
            echo '<input type="hidden" name="fine_id" value="' . $row['id'] . '">';
            echo '<input type="submit" name="delete_fine" value="Delete">';
            echo '</form></td>';
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    if (!empty($message)) {
        echo "<p>$message</p>";
    }

    if (isset($deleteMessage)) {
        echo "<p>$deleteMessage</p>";
    }
    ?>
      <center><tr><td> <a href="admin_profile.php"><button class="logout"><span class="bg-effect"></span><span class="btn-text">Back</span></button></a>
        </div></td></tr></center>
</body>
</html>

<style>

html, body {
    background-color: #007BFF; 
    color: #000;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
}


h1 {
    color: #000; 
    margin: 20px 0;
}


label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #000; 
}


input[type="text"],
input[type="number"],
input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #000; 
    border-radius: 5px;
    background-color: #fff; 
    color: #000; 
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-family: Arial, sans-serif;
    border: 1px solid #000; 
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

form {
    margin-top: 20px;
}
input[type="submit"] {
    padding: 5px 10px;
    background-color: #007BFF; 
    color: #fff;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin-left: 10px;
}.logout {
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
    background-color: #2980b9; }
</style>