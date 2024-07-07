<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOLAKU</title>
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
            padding-right: 260px; /* Add space for the trending news */
            height: 100vh;
            box-sizing: border-box;
            background-color: #1A1A1A;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
        }

        .main-image {
            width: 100%;
            display: flex;
            justify-content: center; /* Center align */
            margin-bottom: 20px; /* Add some space below the image */
        }

        .main-image img {
            width: 40%;
            max-width: 600px; /* Set a max-width for the image */
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .matches {
            background-color: #2C2C2C;
            padding: 20px;
            margin-top: 20px;
            color: white;
            box-sizing: border-box;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 1000px; /* Match max-width of the image */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center align */
            text-align: center; /* Center align text */
            margin: 0 auto; /* Center align horizontally */
        }

        .matches table {
            width: 100%;
            border-collapse: collapse;
            text-align: center; /* Center align text within table cells */
        }

        .matches table, .matches th, .matches td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .main-image,
        .matches {
            margin: 0 auto; /* Center align horizontally */
        }

        .news-item a {
            text-decoration: none; /* Menghilangkan garis bawah */
            color: white; /* Mengubah warna teks menjadi putih */
        }

        .trending-news {
            width: 240px;
            background-color: #2C2C2C;
            padding: 20px;
            height: auto; /* Let the height be determined by content */
            color: white;
            overflow-y: auto;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
            box-sizing: border-box;
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
        }

        .trending-news h2 {
            margin: 0;
            margin-bottom: 20px;
        }

        .trending-news .news-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
            transition: transform 0.3s ease;
        }

        .trending-news .news-item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .trending-news .news-item:hover img {
            transform: scale(1.1);
        }

        .trending-news .news-item div {
            text-align: center;
            margin-top: 10px;
        }

        .calendar {
            margin-top: 20px;
            text-align: center;
        }

        .calendar button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }

        .calendar button.active {
            background-color: #00ff00; /* Darker green */
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
        <div class="main-image">
            <img src="Img/skysports-premier-league-festive_6316505.jpg" alt="Main Image">
        </div>
        <div class="matches">
        <h2><img src="img/league.png" alt="Premier League" style="max-width: 140px; background-color: white; padding: 2px;"></h2>
            <div class="calendar">
                <button id="yesterday">Yesterday</button>
                <button id="today" class="active">Today</button>
                <button id="tomorrow">Tomorrow</button>
                <input type="date" id="datepicker"> 
            </div>
            <table id="matches-table">
                <tr>
                    <th>Date</th>
                    <th>Time (WIB)</th>
                    <th>Home Team</th>
                    <th>Away Team</th>
                </tr>
                <?php
                // Set zona waktu ke WIB (Waktu Indonesia Barat)
                date_default_timezone_set('Asia/Jakarta');

                // API Endpoint untuk jadwal pertandingan Liga Premier League
                $url = 'https://api.football-data.org/v2/competitions/PL/matches';

                // API key Anda dari Football-Data.org
                $api_key = 'bc8aeeaf9bcc43f8a5feedab796264a7';

                // Fungsi untuk mendapatkan jadwal pertandingan berdasarkan tanggal
                function getMatchesByDate($url, $api_key, $date) {
                    $options = [
                        'http' => [
                            'header' => "X-Auth-Token: $api_key"
                        ]
                    ];
                    $context = stream_context_create($options);
                    $response = file_get_contents("$url?dateFrom=$date&dateTo=$date", false, $context);
                    return json_decode($response, true);
                }

                // Ambil data jadwal pertandingan untuk hari ini
                $today = date('Y-m-d');
                $matches_today = getMatchesByDate($url, $api_key, $today);

                // Tampilkan jadwal pertandingan dalam tabel HTML
                if (isset($matches_today['matches'])) {
                    foreach ($matches_today['matches'] as $match) {
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
                } else {
                    echo "<tr><td colspan='4'>No matches found</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <div class="trending-news">
        <h2>Trending News</h2>
        <div class="news-item">
            <a href="https://sport.republika.co.id/berita/sd00fw456/newcastle-buat-mu-semakin-lekat-dengan-status-tim-medioker">
                <img src="Img/mu nangis.jpg" alt="News Image">
            </a>
            <div>
                <a href="https://sport.republika.co.id/berita/sd00fw456/newcastle-buat-mu-semakin-lekat-dengan-status-tim-medioker">
                    <h3>Newcastle Buat MU Semakin Lekat dengan Status Tim Medioker</h3>
                </a>
                <p>2 Hours Ago</p>
            </div>
        </div>
        <div class="news-item">
            <a href="https://www.bola.net/inggris/hasil-manchester-city-vs-wolverhampton-skor-5-1-77e1ce.html">
                <img src="Img/mc win.jpg" alt="News Image">
            </a>
            <div>
                <a href="https://www.bola.net/inggris/hasil-manchester-city-vs-wolverhampton-skor-5-1-77e1ce.html">
                    <h3>Manchester City Pesta Gol 5-1 Lawan Wolverhampton</h3>
                </a>
                <p>10 Hours Ago</p>
            </div>
        </div>
        <div class="news-item">
            <a href="https://www.bola.net/inggris/prediksi-liverpool-vs-tottenham-5-mei-2024-59ee9d.html">
                <img src="img/lv tm.png" alt="News Image">
            </a>
            <div>
                <a href="https://www.bola.net/inggris/prediksi-liverpool-vs-tottenham-5-mei-2024-59ee9d.html">
                    <h3>Prediksi Liverpool vs Tottenham</h3>
                </a>
                <p>9 Hours Ago</p>
            </div>
        </div>
    </div>
    <script>
        // Fungsi untuk memuat jadwal pertandingan berdasarkan tanggal yang dipilih
        function loadMatchesByDate(date) {
            // Reset tabel
            document.getElementById('matches-table').innerHTML = `
                <tr>
                    <th>Date</th>
                    <th>Time (WIB)</th>
                    <th>Home Team</th>
                    <th>Away Team</th>
                </tr>
            `;

            // Fetch data dari API berdasarkan tanggal
            fetch(`https://api.football-data.org/v2/competitions/PL/matches?dateFrom=${date}&dateTo=${date}`, {
                headers: {
                    'X-Auth-Token': '<?php echo $api_key; ?>'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.matches.length > 0) {
                    data.matches.forEach(match => {
                        const waktu = new Date(match.utcDate).toLocaleTimeString('en-GB', { timeZone: 'Asia/Jakarta', hour: 'numeric', minute: 'numeric' });
                        document.getElementById('matches-table').innerHTML += `
                            <tr>
                                <td>${match.utcDate.substring(0, 10)}</td>
                                <td>${waktu}</td>
                                <td>${match.homeTeam.name}</td>
                                <td>${match.awayTeam.name}</td>
                            </tr>
                        `;
                    });
                } else {
                    document.getElementById('matches-table').innerHTML += `
                        <tr>
                            <td colspan="4">No matches found</td>
                        </tr>
                    `;
                }
            })
            .catch(error => console.error('Error fetching matches:', error));
        }

        // Handler untuk tombol yesterday
        document.getElementById('yesterday').addEventListener('click', function() {
            const yesterday = new Date();
            yesterday.setDate(yesterday.getDate() - 1);
            const dateFormatted = yesterday.toISOString().split('T')[0];
            loadMatchesByDate(dateFormatted);
            document.getElementById('today').classList.remove('active');
            document.getElementById('tomorrow').classList.remove('active');
            this.classList.add('active');
        });

        // Handler untuk tombol today
        document.getElementById('today').addEventListener('click', function() {
            const today = new Date().toISOString().split('T')[0];
            loadMatchesByDate(today);
            document.getElementById('yesterday').classList.remove('active');
            document.getElementById('tomorrow').classList.remove('active');
            this.classList.add('active');
        });

        // Handler untuk tombol tomorrow
        document.getElementById('tomorrow').addEventListener('click', function() {
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            const dateFormatted = tomorrow.toISOString().split('T')[0];
            loadMatchesByDate(dateFormatted);
            document.getElementById('today').classList.remove('active');
            document.getElementById('yesterday').classList.remove('active');
            this.classList.add('active');
        });

        // Handler untuk memilih tanggal dari kalender
        document.getElementById('datepicker').addEventListener('change', function() {
            const selectedDate = this.value;
            loadMatchesByDate(selectedDate);
            document.getElementById('today').classList.remove('active');
            document.getElementById('yesterday').classList.remove('active');
            document.getElementById('tomorrow').classList.remove('active');
        });

        // Load pertama kali dengan jadwal hari ini
        loadMatchesByDate(new Date().toISOString().split('T')[0]);
    </script>
</body>
</html>
