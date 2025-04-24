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

    $templateId = (int)$data['template_id'];
    $schedule_id = (int)$data['schedule_id'];
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
           
        
         $productid = insertrow('form_answers', $value);
    }

    // Return success response
    http_response_code(200);
    echo json_encode(['message' => 'Answers saved successfully']);


exit;

} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>