<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include('../functionPDO.php');
try {

session_start();
$created_by_company_id = $_SESSION['company_id'];
$created_by = $_SESSION['application_user_id'];


   
   
// Decode JSON input
$input = json_decode(file_get_contents("php://input"), true);

// Convert audit_team (array) to comma-separated string
$audit_team_str = '';
if (isset($input['audit_team']) && is_array($input['audit_team'])) {
    $audit_team_str = implode(",", $input['audit_team']);
}

// Define value array: field name, value, type (STR or INT)
$values = array(
    // array('audit_id', $input['audit_id'], 'INT'),
    array('audit_title', $input['audit_title'], 'STR'),
    array('audit_type', $input['audit_type'], 'INT'),
    array('department_name', $input['department_name'], 'STR'),
    array('department_poc', $input['department_poc'], 'INT'),
    array('audit_scope', $input['audit_scope'], 'STR'),
    array('audit_criteria', $input['audit_criteria'], 'STR'),
    array('planned_start_date', $input['planned_start_date'], 'STR'),
    array('planned_end_date', $input['planned_end_date'], 'STR'),
    array('auto_calculated_duration', $input['auto_calculated_duration'], 'INT'),
    array('lead_auditor', $input['lead_auditor'], 'INT'),
    array('audit_team', $audit_team_str, 'STR'),
    array('Comments', $input['Comments'], 'STR'),
    array('created_by' , $created_by, 'STR'),
    array('created_by_company_id' , $created_by_company_id, 'STR'),

);

 $productid = insertrow('audit_plans', $values);
//if ($success) {
//    echo json_encode(['success' => 1]);
//} else {
//    echo json_encode(['error' => 'Update failed']);
//}
$_SESSION['success_message'] = "Audit plan created successfully!";
echo json_encode(['pid' => $productid, 'message' => "Success"]);

exit;
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
