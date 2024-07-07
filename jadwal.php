<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pertandingan Premier League</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h1>Jadwal Pertandingan Premier League</h1>

<?php

// Set zona waktu ke WIB (Waktu Indonesia Barat)
date_default_timezone_set('Asia/Jakarta');

// API Endpoint untuk jadwal pertandingan Liga Premier League
$url = 'https://api.football-data.org/v2/competitions/PL/matches';

// API key Anda dari Football-Data.org
$api_key = 'bc8aeeaf9bcc43f8a5feedab796264a7';

// Pengaturan permintaan
$options = [
    'http' => [
        'header' => "X-Auth-Token: $api_key"
    ]
];

// Buat konteks HTTP
$context = stream_context_create($options);

// Kirim permintaan GET
$response = file_get_contents($url, false, $context);

// Cek jika respons berhasil
if ($response === false) {
    die('Gagal mengambil data.');
}

// Decode JSON respons ke dalam array asosiatif
$data = json_decode($response, true);

// Tampilkan jadwal pertandingan dalam tabel HTML
if (isset($data['matches'])) {
    echo "<table>";
    echo "<tr><th>Tanggal</th><th>Jam (WIB)</th><th>Tim Tuan Rumah</th><th>Tim Tamu</th></tr>";
    foreach ($data['matches'] as $match) {
        echo "<tr>";
        // Ubah format waktu ke WIB
        $waktu = new DateTime($match['utcDate']);
        $waktu->setTimezone(new DateTimeZone('Asia/Jakarta'));
        echo "<td>" . $waktu->format('Y-m-d') . "</td>";
        echo "<td>" . $waktu->format('H:i') . "</td>";
        echo "<td>" . $match['homeTeam']['name'] . "</td>";
        echo "<td>" . $match['awayTeam']['name'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada data pertandingan yang ditemukan.</p>";
}

?>

</body>
</html>
