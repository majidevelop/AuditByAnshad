<?php
header("Content-Type: application/json");

$jsonInput = file_get_contents("php://input");
$data = json_decode($jsonInput, true);

if (!isset($data['template_id'])) {
    echo json_encode(["error" => "Template ID is required for update"]);
    exit;
}

$template_id = $data['template_id'];

try {
$pdo = new PDO("mysql:host=sdb-82.hosting.stackcp.net;dbname=db_ehse-35303839647d", "db_ehse-35303839647d", "A4Z0&}.Ftndg");

    // $pdo = new PDO("mysql:host=localhost;dbname=ehse", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $updatedAt = date('Y-m-d H:i:s'); // current timestamp
    // Update Template
    $stmt = $pdo->prepare("UPDATE form_templates SET title = ?, description = ?, updated_at = ? WHERE id = ?");
    $stmt->execute([$data['title'], $data['description'], $updatedAt, $template_id]);

    // Delete old questions and options (simplest way to update them)
    $stmt = $pdo->prepare("DELETE FROM form_template_questions WHERE template_id = ?");
    $stmt->execute([$template_id]);

    $stmt = $pdo->prepare("DELETE FROM form_template_answer_options WHERE template_id = ?");
    $stmt->execute([$template_id]);

    // Insert updated questions
    foreach ($data['questions'] as $q) {
        $stmt = $pdo->prepare("INSERT INTO form_template_questions 
            (template_id, question_title, question_description, question_order, answer_type, is_required) 
            VALUES (?, ?, ?, ?, ?, ?)");
        
        $stmt->execute([
            $template_id, 
            $q['text'], 
            $q['description'], 
            $q['order'], 
            $q['type'], 
            0
        ]);

        $question_id = $pdo->lastInsertId();

        if (!empty($q['options'])) {
            foreach ($q['options'] as $opt) {
                $stmt = $pdo->prepare("INSERT INTO form_template_answer_options (question_id, template_id, option_value, answer_order) 
                VALUES (?, ?, ?, ?)");
                $stmt->execute([$question_id, $template_id, $opt['text'], $opt['order']]);
            }
        }
    }

    echo json_encode(["status" => "success", "message" => "Template updated!", "template_id" => $template_id]);

} catch (Exception $ex) {          
    echo json_encode(["error" => $ex->getMessage()]);
}
?>
