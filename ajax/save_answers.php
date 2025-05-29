<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include('../functionPDO.php');
try {
    $data = json_decode(file_get_contents("php://input"), true);
    // echo json_encode(["Message" => "Success", "data" => $input]);
    // Validate input
    if (!$data || !isset($data['template_id']) || !isset($data['responses']) || !is_array($data['responses'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid input data']);
        exit;
    }

    $created_by = $data['created_by'];

    $templateId = (int)$data['template_id'];
    $schedule_id = (int)$data['schedule_id'];
    $status = $data['status'];
    $scheduled_audit_id = $schedule_id;

    foreach ($data['responses'] as $response) {
        if (!isset($response['question_id']) || !isset($response['answer'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid response format']);
            exit;
        }

        // Handle array answers (e.g., multi_select)
        $answer = is_array($response['answer']) ? json_encode($response['answer']) : $response['answer'];

        // $stmt->execute([
        //     ':template_id' => $templateId,
        //     ':question_id' => (int)$response['question_id'],
        //     ':answer' => $answer
        // ]);
        $string = "";
        if($response['answer_id']){
            $string = implode(", ", $response['answer_id']);

        }
        $value = array(
            array('template_id', $templateId, 'STR'),
            array('question_id', (int)$response['question_id'], 'STR'),
            array('answer', $answer, 'STR'),
            array('option_id', $string, 'STR'),
            array('schedule_id', $schedule_id, 'STR')

            
             
            );
        $where =array(
                    array('schedule_id', $schedule_id, 'STR'),
                    array('template_id', $templateId, 'STR'),
                    array('question_id', (int)$response['question_id'], 'STR')

        );
           
        $existence = rowExists('form_answers',$where);

        if ($existence) {
                updaterow("form_answers",$value,$where);

        } else {
            $productid = insertrow('form_answers', $value);

        }
        

       
           

    }

    $values=array(
        array('status',$status,'STR'),
        array('created_by',$created_by,'INT'),
        array('scheduled_audit_id',$scheduled_audit_id,'INT')

    );
    $productid = insertrow('schedule_audit_status_log', $values);

    // Return success response
    http_response_code(200);
    echo json_encode(['message' => 'Answers saved successfully']);


exit;

} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>