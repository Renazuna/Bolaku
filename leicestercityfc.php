<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOLAKU - Leicester City FC</title>
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
            align-items: center; /* Tambahkan align-items ke center */
            padding: 20px;
            box-sizing: border-box;
            background-color: #1A1A1A;
            color: white;
        }

        .team-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #2C2C2C;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 100%;
        }

        .team-container img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .team-container h3 {
            margin-bottom: 20px;
        }

        .team-container p {
            margin: 10px 0;
        }

        .team-container ul {
            padding: 0;
            list-style: none;
            text-align: center; /* Teks diatur ke tengah */
        }

        .team-container ul li {
            margin-bottom: 5px;
        }

        .competitions {
            display: flex;
            flex-direction: column;
            align-items: center; /* Tambahkan align-items ke center */
            justify-content: center;
            text-align: center; /* Teks diatur ke tengah */
            width: 100%; /* Lebar penuh */
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
        <h2>Leicester City FC Details</h2>
        <div class="team-container">
            <?php
            // API Endpoint untuk Leicester City FC
            $url = 'https://api.football-data.org/v2/teams/338'; // ID 338 adalah Leicester City FC

            // API key Anda dari Football-Data.org
            $api_key = 'bc8aeeaf9bcc43f8a5feedab796264a7';

            // Fungsi untuk mendapatkan data Leicester City FC
            function getLeicesterData($url, $api_key) {
                $options = [
                    'http' => [
                        'header' => "X-Auth-Token: $api_key"
                    ]
                ];
                $context = stream_context_create($options);
                $response = file_get_contents($url, false, $context);
                return json_decode($response, true);
            }

            // Ambil data Leicester City FC
            $leicester_data = getLeicesterData($url, $api_key);

            // Tampilkan data Leicester City FC
            if ($leicester_data) {
                echo "<img src='{$leicester_data['crestUrl']}' alt='{$leicester_data['name']}'>";
                echo "<h3>{$leicester_data['name']}</h3>";
                echo "<p><strong>Stadium:</strong> {$leicester_data['venue']}</p>";
                echo "<p><strong>Club Colors:</strong> {$leicester_data['clubColors']}</p>";
                if (isset($leicester_data['squad']['coach']['name'])) {
                    echo "<p><strong>Manager:</strong> {$leicester_data['squad']['coach']['name']}</p>";
                } else {
                    echo "<p><strong>Manager:</strong> Steve Cooper</p>";
                }
                echo "<p><strong>Email:</strong> {$leicester_data['email']}</p>";
                echo "<p><strong>Phone:</strong> {$leicester_data['phone']}</p>";
                echo "<div class='competitions'>";
                echo "<p><strong>Active Competitions:</strong></p>";
                if (isset($leicester_data['activeCompetitions'])) {
                    echo "<ul>";
                    foreach ($leicester_data['activeCompetitions'] as $competition) {
                        if (in_array($competition['name'], ['FA Cup', 'UEFA Champions League', 'Club Friendlies'])) {
                            echo "<li>{$competition['name']}</li>";
                        }
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Data not available</p>";
                }
                echo "</div>";
            } else {
                echo "<p>Data not available.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
