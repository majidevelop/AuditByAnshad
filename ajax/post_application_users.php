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
        array('name', $input['name'], 'STR'),
        array('roles', $input['roles'], 'STR'),
        array('company_id', $input['company_id'], 'INT'),
        array('email', $input['email'], 'STR'),
        array('phone', $input['phone'], 'STR')



    
    );

    $username = explode('@', $input['email'])[0];

    $productid = insertrow('application_users', $values);

    $data = array(
        array('application_user_id', $productid, 'STR'),
        array('eid', $username, 'STR'),
        array('password', $input['phone'], 'STR'),
        array('name', $input['name'], 'STR'),
        array('email', $input['email'], 'STR')

    );
    $user_id = insertrow('users', $data);

    echo json_encode(['pid' => $productid, 'message' => "Success"]);

    exit;
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
