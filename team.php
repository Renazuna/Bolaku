<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOLAKU - Teams</title>
    <link rel="stylesheet" href="home.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #333333, #222222);
            color: white;
            display: flex;
            box-sizing: border-box;
        }

        .sidebar {
            width: 240px;
            background-color: #2C2C2C;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            color: white;
        }

        .sidebar h1 {
            text-align: center;
            padding: 20px 0;
            background-color: #2C2C2C;
            margin: 0;
        }

        .sidebar h1 .bola {
            color: white;
        }

        .sidebar h1 .ku {
            color: #00ff00; /* Green color */
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            border-bottom: 1px solid #444; /* Garis batas antara setiap menu */
            text-align: center; /* Teks diatur ke tengah */
        }

        .sidebar ul li:last-child {
            border-bottom: none; /* Menghilangkan border bawah pada item terakhir */
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block; /* Membuat link menjadi blok agar border dan padding bisa diterapkan */
            transition: background-color 0.3s ease; /* Transisi untuk background-color selama 0.3 detik */
        }

        .sidebar ul li a:hover {
            background-color: #555; /* Warna latar belakang saat tombol dihover */
        }

        .content {
            margin-left: 240px;
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
            box-sizing: border-box;
            background-color: #1A1A1A;
            color: white;
        }

        .teams-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .team-card {
            margin: 10px;
            padding: 20px;
            background-color: #2C2C2C;
            border-radius: 10px;
            width: 200px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .team-card:hover {
            transform: scale(1.05);
        }

        .team-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .team-details {
            background-color: #2C2C2C;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            color: white;
            display: none; /* Sembunyikan detail tim secara default */
            text-align: center; /* Teks diatur ke tengah */
        }

        .team-details.active {
            display: block; /* Tampilkan detail tim saat aktif */
        }

        .team-details h2 {
            text-align: center; /* Judul diatur ke tengah */
        }

        .team-details p {
            margin: 10px 0;
        }

        .team-details ul {
            padding: 0;
            list-style: none;
            text-align: left;
        }

        .team-details ul li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h1><span class="bola">BOLA</span><span class="ku">KU</span></h1>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="livescore.php">Live Score</a></li>
            <li><a href="perbandingan.php">Perbandingan</a></li>
            <li><a href="chat.php">Chat</a></li>
        </ul>
    </div>
    <div class="content">
        <h2 style="text-align: center;">Premier League Teams</h2>
        <div class="teams-container">
            <?php
            // API Endpoint untuk tim-tim Premier League
            $url = 'https://api.football-data.org/v2/competitions/PL/teams';

            // API key Anda dari Football-Data.org
            $api_key = 'bc8aeeaf9bcc43f8a5feedab796264a7';

            // Fungsi untuk mendapatkan data tim-tim Premier League
            function getPremierLeagueTeams($url, $api_key) {
                $options = [
                    'http' => [
                        'header' => "X-Auth-Token: $api_key"
                    ]
                ];
                $context = stream_context_create($options);
                $response = file_get_contents($url, false, $context);
                return json_decode($response, true);
            }

            // Ambil data tim-tim Premier League
            $teams_data = getPremierLeagueTeams($url, $api_key);

            // Tampilkan tim-tim dalam bentuk card
            if (isset($teams_data['teams'])) {
                foreach ($teams_data['teams'] as $team) {
                    // Convert team name to lowercase and replace spaces with hyphens for the filename
                    $teamPage = strtolower(str_replace(' ', '', $team['name'])) . ".php";
                    echo "<div class='team-card' onclick='redirectToTeamPage(\"{$teamPage}\")'>";
                    echo "<img src='{$team['crestUrl']}' alt='{$team['name']}'>";
                    echo "<h3>{$team['name']}</h3>";
                    echo "</div>";
                }
            } else {
                echo "<p>No teams found.</p>";
            }
            ?>
        </div>
        <?php
        // Tampilkan detail tim dalam kontainer tersembunyi
        if (isset($teams_data['teams'])) {
            foreach ($teams_data['teams'] as $team) {
                echo "<div class='team-details' id='team-details-{$team['id']}'>";
                echo "<h2>{$team['name']}</h2>";
                echo "<img src='{$team['crestUrl']}' alt='{$team['name']}' style='width: 80px; height: 80px; border-radius: 50%;'>";
                echo "<p><strong>Stadium:</strong> {$team['venue']}</p>";
                echo "<p><strong>Club Colors:</strong> {$team['clubColors']}</p>";
                if (isset($team['squad']['coach']['name'])) {
                    echo "<p><strong>Manager:</strong> {$team['squad']['coach']['name']}</p>";
                } else {
                    echo "<p><strong>Manager:</strong> Data not available</p>";
                }
                echo "<p><strong>Email:</strong> {$team['email']}</p>";
                echo "<p><strong>Phone:</strong> {$team['phone']}</p>";
                echo "<p><strong>Active Competitions:</strong></p>";
                if (isset($team['activeCompetitions'])) {
                    echo "<ul>";
                    foreach ($team['activeCompetitions'] as $competition) {
                        echo "<li>{$competition['name']}</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Data not available</p>";
                }
                echo "</div>";
            }
        }
        ?>
    </div>
    <script>
        // Fungsi untuk mengarahkan ke halaman tim berdasarkan nama tim
        function redirectToTeamPage(teamPage) {
            window.location.href = teamPage;
        }
    </script>
</body>
</html>
