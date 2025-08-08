<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include('../functionPDO.php');
try {

    $input = json_decode(file_get_contents("php://input"), true);
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo json_encode(["success" => false, "error" => "Invalid Process ID"]);
        exit;
    }
    session_start();
    $status = 1;
    $company_id = $_SESSION['company_id'];
    $user_id = $_SESSION['application_user_id'];
    $id = $_GET['id'];

    // Define value array: field name, value, type (STR or INT)
    $values = array(
        array('name', $input['name'], 'STR'),
        array('roles', $input['roles'], 'STR'),
        array('company_id', $input['company_id'], 'INT'),
        array('email', $input['email'], 'STR'),
        array('phone', $input['phone'], 'STR'),
        array('department', $input['department'], 'STR')



    
    );

    $username = explode('@', $input['email'])[0];

    $where=array(array('user_id',$id,'INT'));

    updaterow('application_users', $values, $where);

    $data = array(
        array('application_user_id', $id, 'STR'),
        array('eid', $username, 'STR'),
        array('password', $input['password'], 'STR'),
        array('name', $input['name'], 'STR'),
        array('email', $input['email'], 'STR')

    );
    $where=array(array('application_user_id',$id,'INT'));

    updaterow('users', $data, $where);

    echo json_encode(['User_id' => $id, 'message' => "Update Success"]);

    exit;
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
