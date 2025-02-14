<?php
$file = 'data.json';
$data = json_decode(file_get_contents($file), true) ?? [];

$id = $_GET['id'];
unset($data[$id]);

file_put_contents($file, json_encode(array_values($data), JSON_PRETTY_PRINT));
header("Location: index.php");
?>
 
