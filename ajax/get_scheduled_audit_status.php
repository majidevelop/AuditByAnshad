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

    $template_id = $_GET['id'];
    $where=array(array('scheduled_audit_id',$template_id,'INT'));

   
    $schedule_audit_status_log = array();
    $schedule_audit_status_log= getLatestRow("schedule_audit_status_log ", $where, 'created_at DESC');


    echo json_encode(["success" => true, "data" => $templates, "schedule_audit_status_log" => $schedule_audit_status_log]);
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
