<?php
header('Content-Type: application/json');

$OPENAI_API_KEY = 'sk-proj-Rg1pVzwaareVnTAlkmzUT3BlbkFJ1M9YMNw2utj1DHpePmTH'; // Ganti dengan kunci API OpenAI Anda

// Menerima data hasil perbandingan dari permintaan POST
$data = json_decode(file_get_contents('php://input'), true);
$comparisonResult = $data['result'];

// Proses untuk mengirim data ke OpenAI
$ch = curl_init('https://api.openai.com/v1/completions');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'system', 'content' => 'You are a helpful assistant that provides guidance and information about soccer (football).'],
            ['role' => 'user', 'content' => $comparisonResult]
        ],
        'max_tokens' => 150, // Ubah sesuai kebutuhan Anda
        'temperature' => 0.7,
        'top_p' => 1.0,
        'frequency_penalty' => 0.0,
        'presence_penalty' => 0.0,
        'stop' => null // Hapus untuk memungkinkan tanggapan lengkap
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
        $response = 'Oops! Terdapat kesalahan: ' . json_encode($decoded_json);
    }
}

curl_close($ch);

echo json_encode($response);
?>
