<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Player Stats</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #303030;
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
            border-bottom: 1px solid #444;
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
            background-color: #555;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
            flex: 1;
            box-sizing: border-box;
            background-color: #303030;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .cards-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: #444;
        }

        th, td {
            border: 1px solid #666;
            padding: 10px;
            text-align: center;
            color: white;
        }

        th {
            background-color: #2C2C2C;
            cursor: pointer;
        }

        th a {
            color: white;
            text-decoration: none;
        }

        th a:hover {
            color: #00ff00;
        }

        tr:nth-child(even) {
            background-color: #555;
        }

        tr:nth-child(odd) {
            background-color: #777;
        }

        h3 {
            text-align: center;
            font-size: 36px;
            color: #00ff00;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        form input, form select {
            margin: 0 10px;
        }

        .toggle-btn {
            background-color: #00ff00;
            color: #000;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin: 10px 0;
        }

        .toggle-btn:hover {
            background-color: #00cc00;
        }
    </style>
    <script>
        function toggleVisibility(id) {
            var element = document.getElementById(id);
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
    </script>
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
        <div class="cards-container">
            <h3>Player Stats</h3>
            <form action="" method="GET">
                <label for="search">Search by Player Name:</label>
                <input type="text" id="search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <input type="submit" value="Search">
            </form>

            <form action="" method="GET">
                <label for="position">Filter by Position:</label>
                <select id="position" name="position">
                    <option value="">All Positions</option>
                    <option value="GK" <?php echo isset($_GET['position']) && $_GET['position'] == 'GK' ? 'selected' : ''; ?>>Goalkeeper</option>
                    <option value="Defender" <?php echo isset($_GET['position']) && $_GET['position'] == 'Defender' ? 'selected' : ''; ?>>Defender</option>
                    <option value="Midfield" <?php echo isset($_GET['position']) && $_GET['position'] == 'Midfield' ? 'selected' : ''; ?>>Midfielder</option>
                    <option value="Forward" <?php echo isset($_GET['position']) && $_GET['position'] == 'Forward' ? 'selected' : ''; ?>>Forward</option>
                </select>

                <label for="club">Filter by Club:</label>
                <select id="club" name="club">
                    <option value="">All Clubs</option>
                    <?php
                    include "koneksi.php";

                    // Query untuk mengambil daftar klub
                    $query_clubs = "SELECT DISTINCT Club FROM player_stats ORDER BY Club";
                    $result_clubs = mysqli_query($koneksi, $query_clubs);
                    while ($row_club = mysqli_fetch_assoc($result_clubs)) {
                        $selected = isset($_GET['club']) && $_GET['club'] == $row_club['Club'] ? 'selected' : '';
                        echo "<option value='{$row_club['Club']}' $selected>{$row_club['Club']}</option>";
                    }

                    mysqli_close($koneksi);
                    ?>
                </select>

                <input type="submit" value="Filter">
            </form>

            <table>
                <tr>
                    <th><a href="?sort=<?php echo isset($_GET['sort']) && $_GET['sort'] == 'player_asc' ? 'player_desc' : 'player_asc'; ?>">Player</a></th>
                    <th>Position</th>
                    <th>Club</th>
                    <th><a href="?sort=<?php echo isset($_GET['sort']) && $_GET['sort'] == 'assist_asc' ? 'assist_desc' : 'assist_asc'; ?>">Assist</a></th>
                    <th><a href="?sort=<?php echo isset($_GET['sort']) && $_GET['sort'] == 'goal_asc' ? 'goal_desc' : 'goal_asc'; ?>">Goal</a></th>
                    <th><a href="?sort=<?php echo isset($_GET['sort']) && $_GET['sort'] == 'apps_asc' ? 'apps_desc' : 'apps_asc'; ?>">Appearances</a></th>
                    <th><a href="?sort=<?php echo isset($_GET['sort']) && $_GET['sort'] == 'minutes_asc' ? 'minutes_desc' : 'minutes_asc'; ?>">Minutes Played</a></th>
                </tr>
                <?php
                include "koneksi.php";

                // Query awal untuk mengambil data dari tabel player_stats
                $query = "SELECT * FROM player_stats";

                // Proses pencarian berdasarkan nama pemain
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $search = mysqli_real_escape_string($koneksi, $_GET['search']);
                    $query .= " WHERE Player LIKE '%$search%'";
                }

                // Proses filter berdasarkan posisi
                if (isset($_GET['position']) && !empty($_GET['position'])) {
                    $position = mysqli_real_escape_string($koneksi, $_GET['position']);
                    if (strpos($query, 'WHERE') !== false) {
                        $query .= " AND Position = '$position'";
                    } else {
                        $query .= " WHERE Position = '$position'";
                    }
                }

                // Proses filter berdasarkan klub
                if (isset($_GET['club']) && !empty($_GET['club'])) {
                    $club = mysqli_real_escape_string($koneksi, $_GET['club']);
                    if (strpos($query, 'WHERE') !== false) {
                        $query .= " AND Club = '$club'";
                    } else {
                        $query .= " WHERE Club = '$club'";
                    }
                }

                // Mendeteksi permintaan pengurutan
                $sort = '';
                if (isset($_GET['sort'])) {
                    $sort = $_GET['sort'];
                    // Tambahkan ke query untuk pengurutan berdasarkan kolom yang dipilih
                    switch ($sort) {
                        case 'player_asc':
                            $query .= " ORDER BY Player ASC";
                            break;
                        case 'player_desc':
                            $query .= " ORDER BY Player DESC";
                            break;
                        case 'assist_asc':
                            $query .= " ORDER BY Assist ASC";
                            break;
                        case 'assist_desc':
                            $query .= " ORDER BY Assist DESC";
                            break;
                        case 'goal_asc':
                            $query .= " ORDER BY Goal ASC";
                            break;
                        case 'goal_desc':
                            $query .= " ORDER BY Goal DESC";
                            break;
                        case 'apps_asc':
                            $query .= " ORDER BY Apps ASC";
                            break;
                        case 'apps_desc':
                            $query .= " ORDER BY Apps DESC";
                            break;
                        case 'minutes_asc':
                            $query .= " ORDER BY MinutesPlayed ASC";
                            break;
                        case 'minutes_desc':
                            $query .= " ORDER BY MinutesPlayed DESC";
                            break;
                        default:
                            $query .= " ORDER BY Player ASC";
                            break;
                    }
                } else {
                    $query .= " ORDER BY Player ASC";
                }

                $result = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['Player']}</td>";
                    echo "<td>{$row['Position']}</td>";
                    echo "<td>{$row['Club']}</td>";
                    echo "<td>{$row['Assist']}</td>";
                    echo "<td>{$row['Goal']}</td>";
                    echo "<td>{$row['Apps']}</td>";
                    echo "<td>{$row['MinutesPlayed']}</td>";
                    echo "</tr>";
                }

                mysqli_close($koneksi);
                ?>
            </table>
        </div>

        <button class="toggle-btn" onclick="toggleVisibility('top-goals')">Top 10 Players by Goals</button>
        <div class="cards-container" id="top-goals" style="display:none;">
            <h3>Top 10 Players by Goals</h3>
            <table>
                <tr>
                    <th>Player</th>
                    <th>Club</th>
                    <th>Goals</th>
                </tr>
                <?php
                include "koneksi.php";
                $query_top_goals = "SELECT Player, Club, Goal FROM player_stats ORDER BY Goal DESC LIMIT 10";
                $result_top_goals = mysqli_query($koneksi, $query_top_goals);
                while ($row_top_goals = mysqli_fetch_assoc($result_top_goals)) {
                    echo "<tr>";
                    echo "<td>{$row_top_goals['Player']}</td>";
                    echo "<td>{$row_top_goals['Club']}</td>";
                    echo "<td>{$row_top_goals['Goal']}</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <button class="toggle-btn" onclick="toggleVisibility('top-assists')">Top 10 Playmakers</button>
        <div class="cards-container" id="top-assists" style="display:none;">
            <h3>Top 10 Playmakers</h3>
            <table>
                <tr>
                    <th>Player</th>
                    <th>Club</th>
                    <th>Assists</th>
                </tr>
                <?php
                $query_top_assists = "SELECT Player, Club, Assist FROM player_stats ORDER BY Assist DESC LIMIT 10";
                $result_top_assists = mysqli_query($koneksi, $query_top_assists);
                while ($row_top_assists = mysqli_fetch_assoc($result_top_assists)) {
                    echo "<tr>";
                    echo "<td>{$row_top_assists['Player']}</td>";
                    echo "<td>{$row_top_assists['Club']}</td>";
                    echo "<td>{$row_top_assists['Assist']}</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
