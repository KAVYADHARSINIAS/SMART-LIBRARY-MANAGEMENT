<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "integrated_system"; 


$mysqli = new mysqli($servername, $username,$password, $dbname);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Voice Search</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1 align="center">CATALOG</h1>
   
    <div class="search-container">
        <button id="voice-search-btn">Voice Search</button>
        <input type="text" id="search-input" placeholder="Search for books...">
    </div>
    <div id="search-results"></div><br>
</div>

<script>

    const voiceSearchBtn = document.getElementById("voice-search-btn");
    const searchInput = document.getElementById("search-input");
    const searchResults = document.getElementById("search-results");

    voiceSearchBtn.addEventListener("click", () => {
        const recognition = new webkitSpeechRecognition() || new SpeechRecognition();

        recognition.onresult = (event) => {
            const voiceQuery = event.results[0][0].transcript;
            searchInput.value = voiceQuery;

            searchLibrary(voiceQuery);
        };

        recognition.start();
    });

   
    function searchLibrary(query) {
        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = xhr.responseText;
                searchResults.innerHTML = response;
            }
        };

        xhr.open("GET", `search.php?query=${encodeURIComponent(query)}`, true);
        xhr.send();
    }
</script>

<?php

if (isset($_GET['query'])) {
    $query = $_GET['query'];
 


    echo "<h2>Search Results for: " . $query . "</h2>";
    echo "<p>Sample search results go here...</p>";
}
?>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Student Catalog</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <table>
        <tr>
            <th>Book</th>
            <th>Author</th>
            <th>Category</th>
            <th>Availability</th>
        </tr>
        <form action="" method="GET">
            <label for="search">Search for a Book:</label>
            <input type="text" id="search" name="search">
            <button type="submit">Search</button>
        </form>
        <?php
        $sql = "SELECT * FROM books";
        $result = $mysqli->query($sql);
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $sql = "SELECT * FROM books WHERE book LIKE '%$search%' ";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
         
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["book"] . "</td>";
                echo "<td>" . $row["author"] . "</td>";
                echo "<td>" . $row["category"] . "</td>";
                echo "<td>" . $row["availability"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No books available.</td></tr>";
        }

        $mysqli->close();
        ?>
    </table>

    
</div>
<center><tr><td> <a href="student_profile.php"><button class="logout"><span class="bg-effect"></span><span class="btn-text">Back to Profile</span></button></a>
        </div></td></tr></center>
</body>
</html>
<style>

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

* {
    margin: 0;
    padding: 0;
}


body {
    background-color: #3498db; 
    font-family: Arial, sans-serif;
}
.container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

h1, h2 {
    color: #000; 
}

.search-container {
    margin-top: 20px;
}

#search-input {
    width: 80%;
    padding: 10px;
    border: none;
    border-radius: 5px;
}

#voice-search-btn {
    background-color: #3498db;
    color: #fff; 
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}


#search-results {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th {
    background-color: #3498db;
    color: #fff;
    padding: 10px;
}

td {
    padding: 10px;
}
form {
    margin: 20px 0;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #000; 
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button[type="submit"] {
    background-color: #3498db; 
    color: #fff; 
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

tr > td:last-child {
    color: #3498db; 
    font-weight: bold;
}

</style>
