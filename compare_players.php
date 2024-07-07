<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOLAKU - Compare Players</title>
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

        .compare-form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .compare-form select {
            margin: 0 10px;
            padding: 10px;
            background-color: #2C2C2C;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .compare-form button {
            padding: 10px 20px;
            background-color: #00ff00;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .player-stats {
            display: flex;
            justify-content: space-around;
            width: 100%;
        }

        .player {
            background-color: #2C2C2C;
            padding: 20px;
            border-radius: 10px;
            width: 45%;
        }

        .player h3 {
            text-align: center;
        }

        .player ul {
            list-style: none;
            padding: 0;
        }

        .player ul li {
            margin: 5px 0;
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
        <h2>Perbandingan Kedua Pemain</h2>
        <div class="compare-form">
            <form method="GET" action="">
                <?php
                // Koneksi ke database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bolaku";

                // Buat koneksi
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Periksa koneksi
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Ambil pemain yang dipilih dari parameter GET
                $selectedPlayer1 = isset($_GET['player1']) ? $_GET['player1'] : '';
                $selectedPlayer2 = isset($_GET['player2']) ? $_GET['player2'] : '';

                // Ambil daftar pemain dari database untuk dropdown player 1
                $sql1 = "SELECT Player FROM player_stats";
                $result1 = $conn->query($sql1);

                // Tampilkan dropdown pemain 1
                if ($result1->num_rows > 0) {
                    echo "<select name='player1'>";
                    echo "<option value=''>Select Player 1</option>";
                    while ($row = $result1->fetch_assoc()) {
                        $selected = ($row['Player'] == $selectedPlayer1) ? 'selected' : '';
                        echo "<option value='{$row['Player']}' $selected>{$row['Player']}</option>";
                    }
                    echo "</select>";
                } else {
                    echo "<p>No players available for Player 1.</p>";
                }

                // Ambil daftar pemain dari database untuk dropdown player 2
                $sql2 = "SELECT Player FROM player_stats";
                $result2 = $conn->query($sql2);

                // Tampilkan dropdown pemain 2
                if ($result2->num_rows > 0) {
                    echo "<select name='player2'>";
                    echo "<option value=''>Select Player 2</option>";
                    while ($row = $result2->fetch_assoc()) {
                        $selected = ($row['Player'] == $selectedPlayer2) ? 'selected' : '';
                        echo "<option value='{$row['Player']}' $selected>{$row['Player']}</option>";
                    }
                    echo "</select>";
                } else {
                    echo "<p>No players available for Player 2.</p>";
                }

                // Tutup koneksi
                $conn->close();
                ?>
                <button type="submit">Bandingkan</button>
            </form>
        </div>
        <div class="player-stats">
            <?php
            if (isset($_GET['player1']) && isset($_GET['player2']) && $_GET['player1'] != '' && $_GET['player2'] != '') {
                $player1 = $_GET['player1'];
                $player2 = $_GET['player2'];

                // Koneksi ke database
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Periksa koneksi
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Ambil data pemain pertama
                $sql1 = "SELECT * FROM player_stats WHERE Player = '$player1'";
                $result1 = $conn->query($sql1);
                $player1_data = $result1->fetch_assoc();

                // Ambil data pemain kedua
                $sql2 = "SELECT * FROM player_stats WHERE Player = '$player2'";
                $result2 = $conn->query($sql2);
                $player2_data = $result2->fetch_assoc();

                // Tampilkan data pemain pertama
                if ($player1_data) {
                    echo "<div class='player'>";
                    echo "<h3>{$player1_data['Player']}</h3>";
                    echo "<ul>";
                    foreach ($player1_data as $key => $value) {
                        if ($key != 'Player' && $key != 'id') { // Sembunyikan kolom ID
                            echo "<li><strong>$key:</strong> $value</li>";
                        }
                    }
                    echo "</ul>";
                    echo "</div>";
                } else {
                    echo "<p>No data available for $player1.</p>";
                }

                // Tampilkan data pemain kedua
                if ($player2_data) {
                    echo "<div class='player'>";
                    echo "<h3>{$player2_data['Player']}</h3>";
                    echo "<ul>";
                    foreach ($player2_data as $key => $value) {
                        if ($key != 'Player' && $key != 'id') { // Sembunyikan kolom ID
                            echo "<li><strong>$key:</strong> $value</li>";
                        }
                    }
                    echo "</ul>";
                    echo "</div>";
                } else {
                    echo "<p>No data available for $player2.</p>";
                }

                // Tutup koneksi
                $conn->close();
            } else {
                echo "<p>Pilih kedua pemain terlebih dahulu.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
