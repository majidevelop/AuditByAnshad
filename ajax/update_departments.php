<?php


header('Content-Type: application/json');


include('../functionPDO.php') ;




// Get template ID from the URL
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo json_encode(["success" => false, "error" => "Invalid Process ID"]);
        exit;
    }
    session_start();
    $status = 1;
    $company_id = $_SESSION['company_id'];
    $user_id = $_SESSION['application_user_id'];
    $input = json_decode(file_get_contents("php://input"), true);
    if($input['status']){
        $status = $input['status'];
    }
    // Define value array: field name, value, type (STR or INT)
    $values = array(
        array('department_name', $input['department_name'], 'STR'),
        array('updated_by', $user_id, 'INT'),
        array('status', $status, 'INT')

    );

    $id = $_GET['id'];

    
    $where=array(array('department_id',$id,'INT'));

    updaterow('departments', $values, $where);
    
    
   echo json_encode(['department_update' => 'success']);
    
    

?>

