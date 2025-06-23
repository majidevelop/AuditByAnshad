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
// Read raw POST input
$input = json_decode(file_get_contents("php://input"), true);
$where=array(
    array('company_id',$company_id,'INT'),
    array('status',1,'INT')


);


    $templates = array();
    $templates=allrows('process_master',$where,'process_name ASC');


    echo json_encode(["success" => true, "data" => $templates]);
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
