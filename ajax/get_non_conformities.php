<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include('../functionPDO.php');

// include('../get_login.php');
// echo json_encode(["success" => true, "data" => "sad"]);

try {
      $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    if (!isset($input['scheduleId']) || !isset($input['templateId']) ) {
        $response = ['status' => 'error', 'message' => 'Missing required fields: scheduleId or templateId.'];
        echo json_encode($response);
        exit;
    }
    $schedule_id = $input['scheduleId'];
    $template_id = $input['templateId'];

$where = array(
    array('scheduled_audit_id',$schedule_id,'INT'),
    array('template_id',$template_id,'INT')
);
    $templates  =   array();
    $templates  =   allrows('audit_non_confirmity_master',$where,'created_at DESC');


    echo json_encode(["success" => true, "data" => $templates]);
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
