<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perbandingan Kedua Tim</title>
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #222222;
            color: white;
            display: flex;
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
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center; /* Menempatkan elemen di tengah secara horizontal */
            padding: 20px;
            overflow-y: auto;
            height: 100vh;
            background-color: #1A1A1A; /* Warna latar belakang konten */
        }

        #radarChart {
            width: 80%; /* Ukuran lebar sesuaikan dengan kebutuhan */
            max-width: 600px; /* Lebar maksimum chart */
            height: 80%; /* Ukuran tinggi sesuaikan dengan kebutuhan */
            max-height: 400px; /* Tinggi maksimum chart */
            margin-bottom: 20px;
            background-color: white; /* Warna latar belakang chart */
            border-radius: 10px; /* Corner radius untuk chart */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Shadow untuk efek raised */
            color: black; /* Warna teks chart */
        }

        table {
            width: 100%;
            max-width: 600px;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white; /* Warna latar belakang tabel */
            border-radius: 10px; /* Corner radius untuk tabel */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Shadow untuk efek raised */
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd; /* Garis bawah untuk header dan sel */
            color: black; /* Warna teks header dan sel */
        }

        th {
            background-color: #555; /* Warna latar belakang header kolom */
            color: white; /* Warna teks header kolom */
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2; /* Warna latar belakang untuk baris genap */
        }

        .center {
            text-align: center;
            margin-bottom: 20px;
        }

        .center label {
            color: white;
            margin: 0 10px;
        }

        .center select {
            color: black;
            margin: 0 10px;
            padding: 5px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
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
        <h2 style="color:white; text-align:center;">Perbandingan Kedua Tim</h2>
        <div class="center">
            <label for="team1">Pilih Tim Pertama:</label>
            <select name="team1" id="team1" onchange="updateChart()">
                <!-- Options will be populated dynamically -->
            </select>
            <label for="team2">Pilih Tim Kedua:</label>
            <select name="team2" id="team2" onchange="updateChart()">
                <!-- Options will be populated dynamically -->
            </select>
        </div>
        <canvas id="radarChart"></canvas>
        <div id="teamTableContainer"></div>
    </div>

    <script>
        let chart;

        async function fetchTeams() {
            const response = await fetch('fetch_team_list.php');
            const teams = await response.json();
            const team1Select = document.getElementById('team1');
            const team2Select = document.getElementById('team2');

            teams.forEach(team => {
                const option1 = document.createElement('option');
                const option2 = document.createElement('option');
                option1.text = team.trim();
                option2.text = team.trim();
                team1Select.add(option1);
                team2Select.add(option2);
            });
        }

        async function fetchData(team1, team2) {
            const response = await fetch(`fetch_team_stats.php?team1=${team1}&team2=${team2}`);
            const data = await response.json();
            return data;
        }

        function generateChart(data) {
            const labels = ['Menang', 'Seri', 'Kalah', 'Gol', 'Kebobolan'];
            const colors = ['#ff0000', '#0000ff'];
            const datasets = data.map((team, index) => ({
                label: team.Nama.trim(),
                data: [team.Menang, team.Seri, team.Kalah, team.Gol, team.Kebobolan],
                fill: true,
                borderColor: colors[index],
                backgroundColor: colors[index] + '20'
            }));

            const ctx = document.getElementById('radarChart').getContext('2d');

            if (chart) {
                chart.destroy();
            }

            chart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: labels,
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Menjaga aspek rasio
                    scales: {
                        r: {
                            angleLines: { display: false },
                            suggestedMin: 0,
                            suggestedMax: 100
                        }
                    }
                }
            });

            generateTable(data);
        }

        function generateTable(data) {
            const tableContainer = document.getElementById('teamTableContainer');
            let tableHTML = `
                <table>
                    <thead>
                        <tr>
                            <th>Klub</th>
                            <th>Menang</th>
                            <th>Seri</th>
                            <th>Kalah</th>
                            <th>Gol</th>
                            <th>Kebobolan</th>
                            <th>Total Poin</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            data.forEach(team => {
                const totalPoin = (parseInt(team.Menang) * 3) + (parseInt(team.Seri));
                tableHTML += `
                    <tr>
                        <td>${team.Nama.trim()}</td>
                        <td>${team.Menang}</td>
                        <td>${team.Seri}</td>
                        <td>${team.Kalah}</td>
                        <td>${team.Gol}</td>
                        <td>${team.Kebobolan}</td>
                        <td>${totalPoin}</td>
                    </tr>
                `;
            });

            tableHTML += `
                    </tbody>
                </table>
            `;

            tableContainer.innerHTML = tableHTML;
        }

        async function updateChart() {
            const team1 = document.getElementById('team1').value;
            const team2 = document.getElementById('team2').value;

            if (team1 && team2) {
                // Fetch team stats from fetch_team_stats.php
                const response = await fetch(`fetch_team_stats.php?team1=${team1}&team2=${team2}`);
                const data = await response.json();

                // Update radar chart with new data
                generateChart(data);
            } else {
                alert("Pilih dua tim terlebih dahulu");
            }
        }

        fetchTeams();
    </script>
</body>
</html>
