<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include('../functionPDO.php');
try {

$input = json_decode(file_get_contents("php://input"), true);

// Check if templateId is provided
if (!isset($input['templateId'])) {
    echo json_encode(["error" => "Missing templateId"]);
    exit;
}


$template_id = $input['templateId'];
// $assignees = $input['assigned_to'];
$audit_lead = $input['audit_lead'];
$audit_manager = $input['audit_manager'];
$audit_date = $input['auditDate'];


$assignees = isset($input['assigned_to']) ? implode(',', $input['assigned_to']) : '';


 $value = array(
    array('template_id', $template_id, 'STR'),
    array('assignees', $assignees, 'STR'),
    array('audit_lead', $audit_lead, 'STR'),
    array('audit_manager', $audit_manager, 'STR'),
    array('audit_date', $audit_date, 'STR'),


     
    );


 $productid = insertrow('scheduled_inspections', $value);
//if ($success) {
//    echo json_encode(['success' => 1]);
//} else {
//    echo json_encode(['error' => 'Update failed']);
//}

echo json_encode(['pid' => $assignees]);

exit;
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
