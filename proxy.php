<?php
// M3U8 linki dışarıdan GET parametresi olarak alınır
if (!isset($_GET['url'])) {
    http_response_code(400);
    echo "URL eksik.";
    exit;
}

$url = urldecode($_GET['url']);

// Header’lar
header("Content-Type: application/vnd.apple.mpegurl");
header("Access-Control-Allow-Origin: *");

// Gerekirse özel HTTP header’ları (Referer, User-Agent vs.)
$options = [
    "http" => [
        "header" => "Referer: https://www.netsportv204.top\r\nUser-Agent: Mozilla/5.0\r\n"
    ]
];

$context = stream_context_create($options);

// Yayını çekip ilet
$stream = @file_get_contents($url, false, $context);
if ($stream === false) {
    http_response_code(502);
    echo "Yayın alınamadı.";
    exit;
}

echo $stream;
