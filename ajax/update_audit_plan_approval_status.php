<?php


header('Content-Type: application/json');


include('../functionPDO.php') ;




// Check if both 'p_id' and 'product_status' are set in the POST request
if (isset($_GET['id'])) {
    $plan_id = $_GET['id'];

    $input = json_decode(file_get_contents("php://input"), true);


    
    $value=array(array('audit_plan_status', $input['status'],'STR'));
     $where=array(array('audit_id',$plan_id,'INT'));
     updaterow('audit_plans', $value, $where);
    
    
   echo json_encode(['audit_plan_status' => 'success']);
    
    
} else {
    echo json_encode(['audit_plan_status' => 'error', 'message' => 'Invalid parameters']);
}
?>

