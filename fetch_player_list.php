<?php
header('Content-Type: application/json');

// Database connection
$host = 'localhost';
$db = 'bolaku';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch list of teams
$sql = "SELECT DISTINCT Player FROM player_stats";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row['Player'];
    }
}

$conn->close();
echo json_encode($data);
?>