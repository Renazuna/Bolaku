<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klasemen Premier League</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #666666; /* Warna latar belakang lebih terang */
            color: white;
            display: flex;
            box-sizing: border-box;
        }

        .sidebar {
            width: 240px;
            background-color: #3C3C3C; /* Warna sidebar lebih terang */
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            color: white;
            overflow-y: auto;
        }

        .sidebar h1 {
            text-align: center;
            padding: 20px 0;
            background-color: #3C3C3C; /* Warna latar belakang header sidebar lebih terang */
            margin: 0;
        }

        .sidebar h1 .bola {
            color: white;
        }

        .sidebar h1 .ku {
            color: #00ff00;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            border-bottom: 1px solid #555; /* Garis batas lebih terang */
            text-align: center;
        }

        .sidebar ul li:last-child {
            border-bottom: none;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #666; /* Warna latar belakang saat dihover lebih terang */
        }

        .container {
            margin-left: 240px;
            padding: 20px;
            width: calc(100% - 240px);
            background-color: #333; /* Warna latar belakang bagian tengah lebih gelap */
            min-height: 100vh; /* Pastikan kontainer mengambil setidaknya tinggi penuh layar */
        }

        .center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #555;
        }

        .green-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        .green-button:hover {
            background-color: #45a049;
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
    <div class="container">
        <?php
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['season'])) {
            // Get selected season
            $selected_season = $_GET['season'];
            $season_text = "{$selected_season}/" . ($selected_season + 1 - 2000); // Format season as 'YYYY/YY'
            echo "<h2 class='center'>Klasemen Premier League ({$season_text})</h2>";
        } else {
            echo "<h2 class='center'>Klasemen Premier League</h2>";
        }
        ?>
        <div class="center">
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="season">Pilih tahun:</label>
                <select name="season" id="season">
                    <?php
                    // Generate options for years from 2020 to 2025
                    for ($year = 2020; $year <= 2025; $year++) {
                        $season = $year . '/' . ($year + 1 - 2000); // Format season as 'YYYY/YY'
                        $selected = isset($_GET['season']) && $_GET['season'] == $year ? 'selected' : '';
                        echo "<option value='{$year}' $selected>{$season}</option>";
                    }
                    ?>
                </select>
                <button type="submit" class="green-button">Tampilkan</button>
            </form>
        </div>
        <?php
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['season'])) {
            // Get selected season
            $selected_season = $_GET['season'];

            // API Endpoint untuk klasemen Premier League
            $url = 'http://api.football-data.org/v4/competitions/PL/standings?season=' . $selected_season;

            // Header untuk autentikasi dan format data
            $headers = [
                'X-Auth-Token: bc8aeeaf9bcc43f8a5feedab796264a7',
                'Accept: application/json',
            ];

            // Inisialisasi cURL
            $curl = curl_init();

            // Set options untuk cURL
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => $headers,
            ]);

            // Eksekusi cURL dan simpan respons
            $response = curl_exec($curl);
            $err = curl_error($curl);

            // Tutup cURL
            curl_close($curl);

            // Proses respons jika tidak ada kesalahan
            if ($err) {
                echo "Error: " . $err;
            } else {
                $standings_data = json_decode($response, true);

                // Tampilkan data klasemen dalam tabel HTML
                if (isset($standings_data['standings'])) {
                    echo '<table>';
                    echo '<tr><th>Posisi</th><th>Tim</th><th>Main</th><th>Menang</th><th>Seri</th><th>Kalah</th><th>Poin</th></tr>';
                    foreach ($standings_data['standings'][0]['table'] as $team) {
                        echo '<tr>';
                        echo '<td>' . $team['position'] . '</td>';
                        echo '<td>' . $team['team']['name'] . '</td>';
                        echo '<td>' . $team['playedGames'] . '</td>';
                        echo '<td>' . $team['won'] . '</td>';
                        echo '<td>' . $team['draw'] . '</td>';
                        echo '<td>' . $team['lost'] . '</td>';
                        echo '<td>' . $team['points'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo "<p>No standings data found.</p>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
