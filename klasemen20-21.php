<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premier League Standings 2020/21</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center;">Premier League Standings 2020/21</h2>
        <?php
        // API Endpoint untuk klasemen Premier League musim 2020/21
        $url = 'http://api.football-data.org/v4/competitions/PL/standings?season=2020';

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
        ?>
    </div>
</body>
</html>
