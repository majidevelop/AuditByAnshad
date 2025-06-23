<?php


header('Content-Type: application/json');


include('../functionPDO.php') ;




// Get template ID from the URL
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo json_encode(["success" => false, "error" => "Invalid Process ID"]);
        exit;
    }
    session_start();
    $company_id = $_SESSION['company_id'];
    $user_id = $_SESSION['application_user_id'];
    $input = json_decode(file_get_contents("php://input"), true);
        $status = $input['status'];
    // Define value array: field name, value, type (STR or INT)
    $values = array(
        array('updated_by', $user_id, 'INT'),
        array('status', $status, 'INT')


        // array('updated_by', $input['updated_by'], 'INT')
        // created_at and updated_at will be automatically handled by DB
    );

    $id = $_GET['id'];

    
    $where=array(array('process_id',$id,'INT'));

    updaterow('process_master', $values, $where);
    
    
   echo json_encode(['DeleteProcess' => 'success']);
    
    

?>

