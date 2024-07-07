<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOLAKU - Tottenham Hotspur</title>
    <link rel="stylesheet" href="home.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #1A1A1A;
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
        <h2>Tottenham Hotspur FC Details</h2>
        <div class="team-container">
            <?php
            // API Endpoint untuk Tottenham Hotspur FC
            $url = 'https://api.football-data.org/v2/teams/73'; // ID 73 adalah Tottenham Hotspur FC

            // API key Anda dari Football-Data.org
            $api_key = 'bc8aeeaf9bcc43f8a5feedab796264a7';

            // Fungsi untuk mendapatkan data Tottenham Hotspur FC
            function getTottenhamData($url, $api_key) {
                $options = [
                    'http' => [
                        'header' => "X-Auth-Token: $api_key"
                    ]
                ];
                $context = stream_context_create($options);
                $response = file_get_contents($url, false, $context);
                return json_decode($response, true);
            }

            // Ambil data Tottenham Hotspur FC
            $tottenham_data = getTottenhamData($url, $api_key);

            // Tampilkan data Tottenham Hotspur FC
            if ($tottenham_data) {
                echo "<img src='{$tottenham_data['crestUrl']}' alt='{$tottenham_data['name']}'>";
                echo "<h3>{$tottenham_data['name']}</h3>";
                echo "<p><strong>Stadium:</strong> {$tottenham_data['venue']}</p>";
                echo "<p><strong>Club Colors:</strong> {$tottenham_data['clubColors']}</p>";
                if (isset($tottenham_data['squad']['coach']['name'])) {
                    echo "<p><strong>Manager:</strong> {$tottenham_data['squad']['coach']['name']}</p>";
                } else {
                    echo "<p><strong>Manager:</strong> Ange Postecoglou</p>";
                }
                echo "<p><strong>Email:</strong> {$tottenham_data['email']}</p>";
                echo "<p><strong>Phone:</strong> {$tottenham_data['phone']}</p>";
                echo "<div class='competitions'>";
                echo "<p><strong>Active Competitions:</strong></p>";
                if (isset($tottenham_data['activeCompetitions'])) {
                    echo "<ul>";
                    foreach ($tottenham_data['activeCompetitions'] as $competition) {
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

            // Koneksi ke database
            include 'koneksi.php';

            // Query untuk mengambil nama-nama pemain Tottenham Hotspur beserta posisi
            $query = "SELECT Player, Position FROM player_stats WHERE Club = 'Tottenham'";
            $result = mysqli_query($koneksi, $query);

            // Inisialisasi array untuk menampung nama-nama pemain dan posisi
            $players = [];

            // Jika query berhasil dieksekusi
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $players[] = [
                        'name' => $row['Player'],
                        'position' => $row['Position']
                    ];
                }
            } else {
                $players[] = ['name' => 'No players found', 'position' => ''];
            }

            // Menampilkan nama-nama pemain dan posisi
            if (!empty($players)) {
                echo "<h3>Players:</h3>";
                echo "<ul>";
                foreach ($players as $player) {
                    echo "<li>{$player['name']} - {$player['position']}</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No players found.</p>";
            }

            // Menutup koneksi ke database
            mysqli_close($koneksi);
            ?>
        </div>
    </div>
</body>
</html>
