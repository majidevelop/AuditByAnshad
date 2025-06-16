<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include('../functionPDO.php');

// include('../get_login.php');
// echo json_encode(["success" => true, "data" => "sad"]);

try {
    // Get template ID from the URL
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo json_encode(["success" => false, "error" => "Invalid template ID"]);
        exit;
    }
    $input = json_decode(file_get_contents("php://input"), true);
    $where = "1";
    // Validate required fields
    if (!isset($input['scheduleId']) || !isset($input['templateId']) ) {
        $response = ['status' => 'error', 'message' => 'Missing required fields: scheduleId or templateId.'];
        if(isset($input['scheduleId'])){
        $where = array(
            array('scheduled_audit_id',$input['scheduleId'],'INT')
        );
    }
    }else{
        $schedule_id = $input['scheduleId'];
        $template_id = $input['templateId'];

        $where = array(
            array('scheduled_audit_id',$schedule_id,'INT'),
            array('template_id',$template_id,'INT')
        );
    }

    $template_id = $_GET['id'];
// $where=array(array('template_id',$template_id,'STR'));

    // $pdo = new PDO("mysql:host=localhost;dbname=ehse", "root", "");
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $stmt = $pdo->query("SELECT id, title, description, created_at FROM form_templates ORDER BY created_at DESC");
    // $templates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $templates = array();
    $templates=allrows('form_template_questions',$where,'created_at DESC');


    echo json_encode(["success" => true, "data" => $templates]);
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
