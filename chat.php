<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$OPENAI_API_KEY = 'sk-proj-Rg1pVzwaareVnTAlkmzUT3BlbkFJ1M9YMNw2utj1DHpePmTH'; // Replace with your actual OpenAI API key

$response = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userPrompt = trim($_POST['prompt']);

    if (!empty($userPrompt)) {
        $prompt = "You are a helpful assistant that provides guidance and information about soccer (football) and its rules, strategies, and related topics. Please answer the user's questions clearly and helpfully. If the user asks for a list, provide it in bullet points.\n\nUser: $userPrompt\nAI:";

        $ch = curl_init('https://api.openai.com/v1/chat/completions');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant that provides guidance and information about soccer (football).'],
                    ['role' => 'user', 'content' => $userPrompt]
                ],
                'max_tokens' => 300, // Increase the max tokens to allow more detailed responses
                'temperature' => 0.7,
                'top_p' => 1.0,
                'frequency_penalty' => 0.0,
                'presence_penalty' => 0.0,
                'stop' => null // Remove stop sequence to allow full response
            ]),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $OPENAI_API_KEY
            ]
        ]);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            $response = 'Error: ' . curl_error($ch);
        } else {
            $decoded_json = json_decode($result, true);
            if (isset($decoded_json['choices'][0]['message']['content'])) {
                $response = trim($decoded_json['choices'][0]['message']['content']);
            } else {
                $response = 'Oops! terdapat kesalahan: ' . json_encode($decoded_json);
            }
        }

        curl_close($ch);
    } else {
        $response = 'Prompt is empty. Please enter a message.';
    }
}
?>
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



        .chat-container h2 {
    margin: 0;
    margin-bottom: 40px; /* Menambahkan ruang tambahan di bawah judul */
    color: #00ff00; /* Green color */
    font-size: 50px; /* Menambahkan properti font-size */
}


        .chat-messages {
            overflow-y: auto;
            max-height: 300px;
        }

        .chat-message {
            margin-bottom: 10px;
        }

        .chat-message p {
            margin: 0;
        }

        .user-message p {
            color: white; 
            font-size: 40px; /* Menambahkan properti font-size */


        }

        .assistant-message p {
            color: #00ff00; 
        }

        #prompt {
            width: calc(100% - 60px);
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            resize: none;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #00ff00;
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
        <div class="chat-container">
            <h2>ChatBot Bolaku</h2>
    </div>
    <div class="chat">
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($userPrompt)): ?>
        <div class="user-message">
            <p><?= htmlspecialchars($userPrompt, ENT_QUOTES, 'UTF-8') ?></p>
        </div>
        <div class="assistant-message">
            <p><?= htmlspecialchars($response, ENT_QUOTES, 'UTF-8') ?></p>
        </div>
    <?php endif; ?>
</div>
<form id="chat-form" method="post" action="">
    <label for="prompt">Kirim Pesan:</label><br>
    <textarea name="prompt" id="prompt" rows="4" cols="50"></textarea><br>
    <input type="submit" name="submit" value="Send">
</form>
<br>
</body>
</html>