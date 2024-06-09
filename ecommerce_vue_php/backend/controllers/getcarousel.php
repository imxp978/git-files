<?php
header("Access-Control-Allow-Origin: *"); // 允许所有域名请求，或者替换为 'http://localhost:5173'，你的开发服务器地址
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require_once('../connections/conn_db.php');

$SQLstring = "SELECT * FROM carousel";
$result = $link->query($SQLstring);

if ($result) {
    $carousels = [];

    while ($row = $result->fetch()) {
        $carousels[] = [
            'id' => $row['caro_id'],
            'image' => $row['caro_pic'],
            'title' => $row['caro_title'],
            'content' => $row['caro_content']
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($carousels);
} else {
    echo json_encode(['error' => 'Failed to fetch carousels']);
}
?>
