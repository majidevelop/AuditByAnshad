<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include('../functionPDO.php');

try {
    session_start();
    
    $company_id = $_SESSION['company_id'];
    $user_id = $_SESSION['application_user_id'];

    $input = json_decode(file_get_contents("php://input"), true);

    // Define value array: field name, value, type (STR or INT)
    $values = array(
        array('process_name', $input['process_name'], 'STR'),
        array('department_id', $input['department_id'], 'INT'),
        array('company_id', $company_id, 'INT'),
        array('created_by', $user_id, 'INT'),
        array('status', 1, 'INT')


        // array('updated_by', $input['updated_by'], 'INT')
        // created_at and updated_at will be automatically handled by DB
    );

    $processId = insertrow('process_master', $values);

    echo json_encode(['process_id' => $processId, 'message' => "Success"]);
    exit;

} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
