<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "integrated_system"; 
$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


$fineQuery = "SELECT * FROM fines";
$fineResult = $mysqli->query($fineQuery);


$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fine Management - Student Side</title>
</head>
<body>
    <h1>Fine and Dues </h1>

    <h2>Existing Fines</h2>
    <table>
        <tr>
            <th>Book Name</th>
            <th>Fine Amount</th>
            <th>Due Date</th>
        </tr>
        <?php
        while ($row = $fineResult->fetch_assoc()) {
            echo "<tr><td>" . $row['book_name'] . "</td><td>" . $row['fine_amount'] . "</td><td>" . $row['due_date'] . "</td></tr>";
        }
        ?>
    </table>
    <center><tr><td> <a href="student_profile.php"><button class="logout"><span class="bg-effect"></span><span class="btn-text">Back</span></button></a>
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


table {
    width: 100%;
    border-collapse: collapse;
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


td {
    padding: 10px;
    text-align: left; 
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