<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


include('../functionPDO.php') ;

$data = json_decode(file_get_contents("php://input"), true);
$scheduled_audit_id = $data['id'];
$status = $data['status'];
$created_by = $data['created_by'];


// Check if both 'p_id' and 'product_status' are set in the POST request
if (isset($scheduled_audit_id) && isset($status)) {
   


    
    $values=array(
        array('status',$status,'STR'),
        array('created_by',$created_by,'INT'),
        array('scheduled_audit_id',$scheduled_audit_id,'INT')

    );
    $productid = insertrow('schedule_audit_status_log', $values);

    
    
   echo json_encode(['message' => 'success']);
    
    
} else {
    echo json_encode(['product_status' => 'error', 'message' => 'Invalid parameters', 'data' => $data]);
}
?>

