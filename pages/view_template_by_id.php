<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");

try {
    // Database connection
    $pdo = new PDO("mysql:host=localhost;dbname=ehse", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get template ID from the URL
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo json_encode(["success" => false, "error" => "Invalid template ID"]);
        exit;
    }

    $template_id = $_GET['id'];

    // Fetch the template details
    $stmt = $pdo->prepare("SELECT * FROM form_templates WHERE id = ?");
    $stmt->execute([$template_id]);
    $template = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$template) {
        echo json_encode(["success" => false, "error" => "Template not found"]);
        exit;
    }

    // Fetch the related questions
    $stmt = $pdo->prepare("SELECT * FROM form_template_questions WHERE template_id = ?");
    $stmt->execute([$template_id]);
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);


    
    // Fetch the related questions
    $stmt = $pdo->prepare("SELECT * FROM form_template_answer_options WHERE template_id = ?");
    $stmt->execute([$template_id]);
    $options = $stmt->fetchAll(PDO::FETCH_ASSOC);






    // Return JSON response
    echo json_encode(["success" => true, "template" => $template, "questions" => $questions, "options" => $options]);

} catch (Exception $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
?>
