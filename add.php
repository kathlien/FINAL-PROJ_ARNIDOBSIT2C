<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $place_name = $_POST['place_name'];
    $country = $_POST['country'];
    $description = $_POST['description'];
    $visited = isset($_POST['visited']) ? 1 : 0;

    $conn = new PDO("mysql:host=localhost;dbname=travel_bucket_list", 'root', '');
    $sql = "INSERT INTO places (place_name, country, description, visited) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$place_name, $country, $description, $visited]);

    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Place</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add New Place</h1>
    <form method="POST">
        <label for="place_name">Place Name:</label>
        <input type="text" id="place_name" name="place_name" required><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>

        <label for="visited">Visited:</label>
        <input type="checkbox" id="visited" name="visited"><br>

        <input type="submit" value="Add Place">
    </form>
</body>
</html>

