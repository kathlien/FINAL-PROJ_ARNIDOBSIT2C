<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
$id = $_GET['id'];

$conn = new PDO("mysql:host=localhost;dbname=travel_bucket_list", 'root', '');
$sql = "DELETE FROM places WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header('Location: index.php');
?>

