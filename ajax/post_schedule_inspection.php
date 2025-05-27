<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include('../functionPDO.php');
try {

$input = json_decode(file_get_contents("php://input"), true);

// Check if templateId is provided
if (!isset($input['checklist_id'])) {
    echo json_encode(["error" => "Missing templateId", "payload" => $input["audit_id"]]);
    exit;
}


$start = new DateTime($input['planned_start_date']);
$end = new DateTime($input['planned_end_date']);
$diff = $start->diff($end)->days;

// Define value array: field name, value, type (STR or INT)
$values = array(
    array('audit_id', $input['audit_id'], 'INT'),
    array('checklist_id', $input['checklist_id'], 'INT'),

    array('planned_start_date', $input['planned_start_date'], 'STR'),
    array('planned_end_date', $input['planned_end_date'], 'STR'),
    array('auto_calculated_duration', $diff, 'INT'),
    array('audit_process', $input['audit_process'], 'STR'),
    array('scheduled_audit_status' ,"SCHEDULED", 'STR')
);

   

 $productid = insertrow('scheduled_audits', $values);
//if ($success) {
//    echo json_encode(['success' => 1]);
//} else {
//    echo json_encode(['error' => 'Update failed']);
//}

echo json_encode(['pid' => $productid, 'message' => "Success"]);

exit;
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
