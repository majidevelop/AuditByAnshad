
<?php /*
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
// Get JSON data from frontend
$data = json_decode(file_get_contents("php://input"), true);



echo json_encode(["status" => $data]);

$pdo = new PDO("mysql:host=localhost;dbname=ehse", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


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

echo json_encode(["status" => "success"]); */
?>


<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

header("Content-Type: application/json");

// Read raw input
$jsonInput = file_get_contents("php://input",true);


// Decode JSON
$data = json_decode($jsonInput, true);

if ($data === null) {
    echo json_encode(["error" => "Invalid JSON format or empty request"]);
    exit;
}


$pdo = new PDO("mysql:host=sdb-82.hosting.stackcp.net;dbname=db_ehse-35303839647d", "db_ehse-35303839647d", "A4Z0&}.Ftndg");
// $pdo = new PDO("mysql:host=localhost;dbname=ehse", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



// Insert Template
$stmt = $pdo->prepare("INSERT INTO form_templates (title, description, template_type, created_by) VALUES (?, ?, ?, ?)");
$stmt->execute([$data['title'], $data['description'], "safety", 1]);
$template_id = $pdo->lastInsertId();

// Insert Questions
foreach ($data['questions'] as $q) {
    try {
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

        // Insert Options if applicable
        if (!empty($q['options'])) {
            foreach ($q['options'] as $opt) {
                $stmt = $pdo->prepare("INSERT INTO form_template_answer_options (question_id, template_id, option_value, answer_order) VALUES (?, ?, ?, ?)");
                $stmt->execute([$question_id, $template_id, $opt['text'], $opt['order']]);
            }
        }

    } catch (Exception $ex) {          
        file_put_contents("debug_log.txt", "Error: " . $ex->getMessage() . "\n", FILE_APPEND);
    }
}


// Return clean JSON response
echo json_encode(["received_data" => $data, "template_id" => $template_id]);
// exit;
