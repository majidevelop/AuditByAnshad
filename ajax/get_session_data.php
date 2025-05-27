<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include('../functionPDO.php');

// include('../get_login.php');
// echo json_encode(["success" => true, "data" => "sad"]);

try {
    session_start();
    $company_id = $_SESSION['company_id'];

    $session_data["company_id"] = $company_id;
    $session_data["application_user_id"]    =   $_SESSION["application_user_id"];
    $session_data["session_username"]    =   $_SESSION["session_username"];

    
    echo json_encode(["success" => true, "data" => $session_data]);

} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
