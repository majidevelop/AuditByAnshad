<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include('../functionPDO.php');

// include('../get_login.php');
// echo json_encode(["success" => true, "data" => "sad"]);

try {
    // $pdo = new PDO("mysql:host=localhost;dbname=ehse", "root", "");
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $stmt = $pdo->query("SELECT id, title, description, created_at FROM form_templates ORDER BY created_at DESC");
    // $templates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $templates = array();
$templates=allrows('form_templates',"1",'created_at DESC');


    echo json_encode(["success" => true, "data" => $templates]);
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
