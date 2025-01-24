<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
$host = 'localhost';
$dbname = 'travel_bucket_list';
$username = 'root'; 
$password = ''; 


$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = $conn->query('SELECT * FROM places');
$places = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Bucket List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Travel Bucket List</h1>
    <a href="add.php">Add New Place</a>
    <table>
        <tr>
            <th>Place</th>
            <th>Country</th>
            <th>Description</th>
            <th>Visited</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($places as $place): ?>
            <tr>
                <td><?= htmlspecialchars($place['place_name']) ?></td>
                <td><?= htmlspecialchars($place['country']) ?></td>
                <td><?= htmlspecialchars($place['description']) ?></td>
                <td><?= $place['visited'] ? 'Yes' : 'No' ?></td>
                <td>
                    <a href="edit.php?id=<?= $place['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $place['id'] ?>" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

