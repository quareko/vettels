<?php
header("Content-Type: application/vnd.apple.mpegurl");
header("Access-Control-Allow-Origin: *");

$url = "https://hlsfreelinks.yebabayeeeee.workers.dev/https://fener2.demoscript.buzz/hls/bein-sports-1.m3u8";

$options = [
    "http" => [
        "header" => "Referer: https://www.netsportv204.top\r\n"
    ]
];

$context = stream_context_create($options);
echo file_get_contents($url, false, $context);
