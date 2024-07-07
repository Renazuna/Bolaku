<?php
// API key Anda
$apiKey = '11c63323e7msh5b40fdb1f23bd02p117b7djsn3c9df981cf6e';

// URL endpoint untuk mendapatkan jadwal pertandingan Premier League
$url = 'https://api-football-v1.p.rapidapi.com/v3/fixtures?league=39&season=2023';

// Inisialisasi cURL
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'X-RapidAPI-Key: ' . $apiKey,
    'X-RapidAPI-Host: api-football-v1.p.rapidapi.com'
]);

// Eksekusi permintaan dan ambil responnya
$response = curl_exec($ch);

// Tutup cURL
curl_close($ch);

// Decode respon JSON
$data = json_decode($response, true);

// Periksa apakah data ada dan cetak hasilnya
if (isset($data['response'])) {
    $fixtures = $data['response'];
    foreach ($fixtures as $fixture) {
        $matchDate = date('Y-m-d H:i:s', strtotime($fixture['fixture']['date']));
        $homeTeam = $fixture['teams']['home']['name'];
        $awayTeam = $fixture['teams']['away']['name'];
        echo "<p>$matchDate: $homeTeam vs $awayTeam</p>";
    }
} else {
    echo "Data tidak ditemukan atau terjadi kesalahan.";
}
?>
