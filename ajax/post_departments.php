<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include('../functionPDO.php');
try {
    session_start();

    $input = json_decode(file_get_contents("php://input"), true);
    $department_company_id = $_SESSION['company_id'];
    $created_by = $_SESSION['application_user_id'];

    // Define value array: field name, value, type (STR or INT)
    $values = array(
        array('department_name', $input['department_name'], 'STR'),
        array('department_company_id', $department_company_id, 'STR'),
        array('created_by', $created_by, 'STR')


    
    );

    $productid = insertrow('departments', $values);

    echo json_encode(['pid' => $productid, 'message' => "Success"]);
$_SESSION['success_message'] = "Department created successfully!";

    exit;
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
