
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Voice Search</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="search-container">
        <button id="voice-search-btn">Voice Search</button>
        <input type="text" id="search-input" placeholder="Search for books...">
    </div>
    <div id="search-results"></div>

    
    <script src="script.js"></script>
</body>
</html>
<style>
    
.search-container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px;
}


#voice-search-btn {
    padding: 10px 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
}


#search-input {
    padding: 10px;
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-left: 10px;
}

#search-results {
    margin-top: 20px;
}

</style>
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

$query = $_GET['query'];


echo "<h2>Search Results for: " . $query . "</h2>";
echo "<p>Sample search results go here...</p>";
if (isset($_GET['query'])) {
    $query = $_GET['query'];

} else {
    echo "No query parameter provided.";
}

?>
