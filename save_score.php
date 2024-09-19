<?php
// save_score.php
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['name']) && isset($data['score'])) {
    $name = htmlspecialchars($data['name']);
    $score = intval($data['score']);
    
    $file = fopen('score.txt', 'a');
    fwrite($file, "Name: $name, Score: $score\n");
    fclose($file);
    
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
}
?>
