<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include('../functionPDO.php');

try {
    session_start();
    $company_id = $_SESSION['company_id'];

    $application_user_id    =   $_SESSION["application_user_id"];
    $session_username    =   $_SESSION["session_username"];

    $response = [];

    // Get JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    if (!isset($input['question_id']) || !isset($input['severity']) || !isset($input['description'])) {
        $response = ['status' => 'error', 'message' => 'Missing required fields: question_id, severity, or description.'];
        echo json_encode($response);
        exit;
    }
    $schedule_id = $input['schedule_id'];
    $templateId = $input['template_id'];

    $question_id = $input['question_id'];
    $severity = $input['severity'];
    $description = $input['description'];
    $file_id = isset($input['file_id']) ? $input['file_id'] : null;
    $file_path = isset($input['filepath']) ? $input['filepath'] : null;

    // Validate data
    if (empty($question_id) || !is_numeric($question_id)) {
        $response = ['status' => 'error', 'message' => 'Invalid question ID.'];
        echo json_encode($response);
        exit;
    }

    if (!in_array($severity, ['OFI', 'Minor NC', 'Major NC'])) {
        $response = ['status' => 'error', 'message' => 'Invalid severity value.'];
        echo json_encode($response);
        exit;
    }

    if (empty($description)) {
        $response = ['status' => 'error', 'message' => 'Description cannot be empty.'];
        echo json_encode($response);
        exit;
    }

    // Prepare data for database insertion
    $value = [
        ['scheduled_audit_id', $schedule_id, 'INT'],
        ['created_by', $application_user_id, 'INT'],

        ['template_id', $templateId, 'INT'],
        ['nc_question_id', $question_id, 'INT'],
        ['severity', $severity, 'STR'],
        ['description', $description, 'STR'],
        ['nc_image_id', $file_id, 'INT'], // NULL if no file
        ['nc_image', $file_path, 'STR'] // NULL if no file
    ];

    $where =array(
                    array('scheduled_audit_id', $schedule_id, 'STR'),
                    array('template_id', $templateId, 'STR'),
                    array('nc_question_id', (int)$question_id, 'STR')

        );
           
        $existence = rowExists('audit_non_confirmity_master',$where);

        if ($existence) {
                updaterow("audit_non_confirmity_master",$value,$where);
                 $response = [
                    'success' => true,
                    'message' => 'Non-conformity updated successfully',
                    'val' => $value
                ];

        } else {
            // Insert into database
            $non_conformity_id = insertrow('audit_non_confirmity_master', $value);
            if ($non_conformity_id) {
                $response = [
                    'success' => true,
                    'message' => 'Non-conformity saved successfully',
                    'val' => $value
                ];
            } else {
                $response = ['status' => 'error', 'message' => 'Failed to save non-conformity to database.', 'val' => $value];
               
            }

        }

    

     echo json_encode($response);
                exit;

    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    exit;
}


?>