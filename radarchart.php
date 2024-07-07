<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Radar Chart</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        #container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #radarChart {
            max-width: 90%;
            margin: 20px auto;
        }
        .controls {
            margin: 20px auto;
        }
        #teamTableContainer {
            max-width: 90%;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            color: black; /* Mengubah warna teks menjadi hitam */
        }
        table, th, td {
            border: 1px solid black;
            color: black; /* Mengubah warna teks menjadi hitam */
        }
        th, td {
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>

</head>
<body>
    <canvas id="radarChart"></canvas>

    <div class="controls">
        <label for="team1"></label>
        <select id="team1"></select>
        <label for="team2"></label>
        <select id="team2"></select>
        <button onclick="updateChart()">Bandingkan</button>
    </div>

    <div id="teamTableContainer"></div>

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
            const datasets = data.map(team => ({
                label: team.Nama.trim(),
                data: [team.Menang, team.Seri, team.Kalah, team.Gol, team.Kebobolan],
                fill: true,
                borderColor: getRandomColor(),
                backgroundColor: getRandomColor(0.2)
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

        function getRandomColor(alpha = 1) {
            const r = Math.floor(Math.random() * 255);
            const g = Math.floor(Math.random() * 255);
            const b = Math.floor(Math.random() * 255);
            return `rgba(${r},${g},${b},${alpha})`;
        }

        async function updateChart() {
            const team1 = document.getElementById('team1').value;
            const team2 = document.getElementById('team2').value;
            const data = await fetchData(team1, team2);
            generateChart(data);
        }

        fetchTeams();
    </script>
</body>
</html>
