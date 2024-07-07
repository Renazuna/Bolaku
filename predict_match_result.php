<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$OPENAI_API_KEY = 'sk-proj-Rg1pVzwaareVnTAlkmzUT3BlbkFJ1M9YMNw2utj1DHpePmTH'; // Replace with your actual OpenAI API key

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['team1']) && isset($_GET['team2'])) {
        $team1 = $_GET['team1'];
        $team2 = $_GET['team2'];

        $prompt = "Predict the outcome of a match between $team1 and $team2.";

        $ch = curl_init('https://api.openai.com/v1/engines/gpt-3.5-turbo/completions');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode([
                'prompt' => $prompt,
                'max_tokens' => 150,
                'temperature' => 0.7,
                'top_p' => 1.0,
                'frequency_penalty' => 0.0,
                'presence_penalty' => 0.0
            ]),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $OPENAI_API_KEY
            ]
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            echo json_encode(['error' => 'Failed to fetch prediction from OpenAI.']);
        } else {
            $response = json_decode($response, true);
            $prediction = $response['choices'][0]['text'] ?? 'No prediction available.';
            echo json_encode(['prediction' => $prediction]);
        }
    } else {
        echo json_encode(['error' => 'Missing team parameters.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
