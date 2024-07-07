<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bolaku";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to fetch all team data
function getAllTeamsData() {
    global $conn;
    $sql = "SELECT * FROM team_stats";
    $result = mysqli_query($conn, $sql);
    $teams = array();
    while($row = mysqli_fetch_assoc($result)) {
        $teams[] = $row;
    }
    return $teams;
}

// Prepare data for response
$response = array(
    'teams' => getAllTeamsData()
);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
