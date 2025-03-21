<?php
$pdo = new PDO("mysql:host=localhost;dbname=your_db", "username", "password");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get JSON data from frontend
$data = json_decode(file_get_contents("php://input"), true);

// Insert Template
$stmt = $pdo->prepare("INSERT INTO templates (title, description) VALUES (?, ?)");
$stmt->execute([$data['title'], $data['description']]);
$template_id = $pdo->lastInsertId();

// Insert Questions
foreach ($data['questions'] as $q) {
    $stmt = $pdo->prepare("INSERT INTO questions (template_id, question_text, description, question_order, answer_type) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$template_id, $q['text'], $q['description'], $q['order'], $q['type']]);
    $question_id = $pdo->lastInsertId();

    // Insert Options if applicable
    if (!empty($q['options'])) {
        foreach ($q['options'] as $opt) {
            $stmt = $pdo->prepare("INSERT INTO options (question_id, option_text, option_order) VALUES (?, ?, ?)");
            $stmt->execute([$question_id, $opt['text'], $opt['order']]);
        }
    }
}

echo json_encode(["status" => "success"]);
?>
