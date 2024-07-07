<script>
        async function compareTeams() {
            const team1 = document.getElementById('team1').value;
            const team2 = document.getElementById('team2').value;

            const radarData = await fetchData(team1, team2);
            generateChart(radarData);

            const tableData = await analyzeTeams(team1, team2);
            generateAnalysis(tableData);
        }

        async function fetchData(team1, team2) {
            const response = await fetch(`radarchart.php?team1=${team1}&team2=${team2}`);
            return await response.json();
        }

        async function analyzeTeams(team1, team2) {
            const tableData = {
                team1: team1,
                team2: team2,
                // Tambahkan data tabel lainnya jika diperlukan
            };

            // Kirim permintaan ke API OpenAI untuk menganalisis data
            const apiKey = 'sk-proj-Rg1pVzwaareVnTAlkmzUT3BlbkFJ1M9YMNw2utj1DHpePmTH';
            const response = await fetch('https://api.openai.com/v1/engines/davinci-codex/completions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${apiKey}`
                },
                body: JSON.stringify({
                    prompt: JSON.stringify(tableData),
                    max_tokens: 150,
                    temperature: 0.7,
                    top_p: 1.0,
                    frequency_penalty: 0.0,
                    presence_penalty: 0.0
                })
            });

            const data = await response.json();
            return data.choices[0].text;
        }

        function generateChart(data) {
            // Generate radar chart based on the data
        }

        function generateAnalysis(data) {
            const analysisContainer = document.getElementById('teamTableContainer');
            analysisContainer.innerHTML = `<p>${data}</p>`;
        }
    </script>