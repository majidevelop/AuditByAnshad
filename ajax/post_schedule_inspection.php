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

$inspection_title = $input['inspection_title'];
$inspection_desc = $input['inspection_desc'];
$template_id = $input['templateId'];
// $assignees = $input['assigned_to'];
$audit_lead = $input['audit_lead'];
$audit_manager = $input['audit_manager'];
$audit_date = $input['auditDate'];

$site = $input['site'];
$asset = $input['asset'];
$auditee = $input['auditee'];
$report_template = $input['report_template'];



$assignees = isset($input['assigned_to']) ? implode(',', $input['assigned_to']) : '';

// Validate required fields
if (empty($inspection_title) || empty($inspection_desc)) {
    echo json_encode(['message' => 'Title and Description are required.']);
    exit;
}
 $value = array(
    array('title', $inspection_title, 'STR'),
    array('description', $inspection_desc, 'STR'),
    array('template_id', $template_id, 'STR'),
    array('assignees', $assignees, 'STR'),
    array('audit_lead', $audit_lead, 'STR'),
    array('audit_manager', $audit_manager, 'STR'),
    array('site', $site, 'STR'),
    array('asset', $asset, 'STR'),
    array('auditee', $auditee, 'STR'),
    array('report_template', $report_template, 'STR'),
     
    );
   

 $productid = insertrow('scheduled_inspections', $value);
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
