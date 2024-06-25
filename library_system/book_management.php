<!DOCTYPE html>
<html>
<head>
    <title>Book Management </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Book Management System</h1>
        <form action="add_book.php" method="POST">
            <label for="book">Book:</label>
            <input type="text" name="book" required><br>

            <label for="author">Author:</label>
            <input type="text" name="author" required><br>

            <label for="category">Category:</label>
            <input type="text" name="category" required><br>

            <label for="availability">Availability:</label>
            <select name="availability" required>
                <option value="Available">Available</option>
                <option value="Not Available">Not Available</option>
            </select><br>

            <button type="submit">Add Book</button>
        </form>

        <h2>Book List</h2>
        <?php include 'view_books.php'; ?>
        <br>
        <a href="view_books.php">VIEW BOOKS</a>
        <center><tr><td> <a href="admin_profile.php"><button class="logout"><span class="bg-effect"></span><span class="btn-text">Back</span></button></a>
        </div></td></tr></center>
    </div>
   
</body>
</html>

<style>

.container {
    background-color: #007BFF; 
    color: #fff; 
    padding: 100px;
    font-family: Arial, sans-serif;
    border-radius: 10px;
    box-shadow: 0px 0px 90px rgba(0, 0, 0, 0.5);
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}


h1 {
    color: #000; 
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #fff; 
}


input[type="text"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: none;
    background-color: #fff;
    color: #000; 
    border-radius: 5px;
}


button[type="submit"] {
    background-color: #007BFF;
    color: #fff; 
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3; 
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 80px;
    font-family: Arial, sans-serif;
    border: 2px solid black; 
}

th {
    background-color: #000; 
    color: #fff;
    padding: 10px;
}


tr {
    background-color: #fff; 
    color: #000; 
}


tr:nth-child(even) {
    background-color: #f2f2f2;
}


a {
    color: #f00;
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
