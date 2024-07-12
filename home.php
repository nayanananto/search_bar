<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Bar</title>
</head>
<body>
    <h1>Search Bar Example</h1>
    <form action="home.php" method="POST">
        <input type="text" name="search_query" placeholder="Enter your search">
        <button type="submit" name="mysrc">Search</button>
    </form>
</body>
</html>
<?php
if(isset($_POST["mysrc"]))  {
    $searchQuery = $_POST['search_query'];
    header("location:search_page.php?my_search=".$searchQuery);
}
?>
