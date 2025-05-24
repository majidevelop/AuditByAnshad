<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include('../functionPDO.php');
try {

    $input = json_decode(file_get_contents("php://input"), true);
    session_start();
    
    $company_id = $_SESSION['company_id'];
    $user_id = $_SESSION['application_user_id'];


    // Define value array: field name, value, type (STR or INT)
    $values = array(
        array('audit_type_name', $input['audit_type_name'], 'STR'),
        array('audit_type_company_id', $company_id, 'STR'),
        array('created_by', $user_id, 'STR')


    
    );

    $productid = insertrow('audit_types', $values);

    echo json_encode(['pid' => $productid, 'message' => "Success"]);

    exit;
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
