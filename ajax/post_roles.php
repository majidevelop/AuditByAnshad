<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include('../functionPDO.php');
try {

    $input = json_decode(file_get_contents("php://input"), true);

    // Define value array: field name, value, type (STR or INT)
    $values = array(
        array('role_name', $input['role_name'], 'STR')

    
    );

    $productid = insertrow('roles', $values);

$_SESSION['success_message'] = "Role created successfully!";

    echo json_encode(['pid' => $productid, 'message' => "Success"]);

    exit;
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
