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

$team1 = $_GET['team1'];
$team2 = $_GET['team2'];

// Fetch data for selected teams
$sql = "SELECT Nama, Menang, Seri, Kalah, Gol, Kebobolan FROM team_stats WHERE Nama IN ('$team1', '$team2')";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
echo json_encode($data);
?> 