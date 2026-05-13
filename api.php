<?php
$file = __DIR__ . '/data.json';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  header('Content-Type: application/json');
  if (file_exists($file)) {
    readfile($file);
  } else {
    echo json_encode(['players' => [], 'lastPlayer' => '']);
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
  echo json_encode(['ok' => true]);
}
?>