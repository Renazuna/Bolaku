<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BOLAKU - Perbandingan</title>
    <link rel="stylesheet" href="dashboard.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #1A1A1A; /* Warna latar belakang lebih terang */
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
            color: #00ff00;
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
            padding: 20px;
            flex: 1;
            box-sizing: border-box;
            background-color: #1A1A1A; /* Warna latar belakang konten lebih terang */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .buttons-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .button {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 300px;
            margin: 20px;
            padding: 30px;
            background-color: #2C2C2C; /* Warna latar belakang kartu lebih terang */
            color: white;
            border-radius: 15px;
            text-align: center;
            transition: transform 0.3s ease, background-color 0.3s ease;
            text-decoration: none;
        }

        .button:hover {
            transform: scale(1.05);
            background-color: #555; /* Warna latar belakang kartu saat dihover lebih terang */
        }

        .button img {
            width: 60px;
            height: 60px;
            margin-bottom: 15px;
        }

        .button h3 {
            margin: 15px 0;
            font-size: 28px;
        }

        .button p {
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                padding: 10px;
            }

            .sidebar {
                height: auto;
                width: 100%;
                position: relative;
            }

            .buttons-container {
                flex-direction: column;
                align-items: center;
            }
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
        <div class="buttons-container">
            <a href="compare_teams.php" class="button">
                <img src="img/team.png" alt="Perbandingan Tim"> <!-- Ganti dengan ikon yang sesuai -->
                <h3>Perbandingan Tim</h3>
                <p>Bandingkan statistik tim</p>
            </a>

            <a href="compare_players.php" class="button">
                <img src="img/tim.png" alt="Perbandingan Pemain"> <!-- Ganti dengan ikon yang sesuai -->
                <h3>Perbandingan Pemain</h3>
                <p>Bandingkan statistik pemain</p>
            </a>
        </div>
    </div>
</body>
</html>
