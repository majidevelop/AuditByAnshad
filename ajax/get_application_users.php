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

    // Read raw POST input
    $input = json_decode(file_get_contents("php://input"), true);


    $company_id = $_SESSION['company_id'];
    $where = array(
            array('company_id', $company_id, 'INT'),
            array('status', 1, 'INT')

        );
        
    if(!$company_id){
        $where = "1";
    }else{

    }

// Check if templateId is provided
// if (!isset($input['templateId'])) {
//     echo json_encode(["error" => "Missing templateId"]);
//     exit;
// }



    // $pdo = new PDO("mysql:host=localhost;dbname=ehse", "root", "");
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $stmt = $pdo->query("SELECT id, title, description, created_at FROM form_templates ORDER BY created_at DESC");


              
    // $templates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $templates = array();
    $templates=allrows('application_users',$where,'name ASC');


    echo json_encode(["success" => true, "data" => $templates]);
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
