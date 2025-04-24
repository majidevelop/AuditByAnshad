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
    // if (!$data || !isset($data['template_id']) || !isset($data['responses']) || !is_array($data['responses'])) {
    //     http_response_code(400);
    //     echo json_encode(['error' => 'Invalid input data']);
    //     exit;
    // }

    $value = array(
        array('title', $data['title'], 'STR'),
        array('description', $data['description'], 'STR'),
        array('template_type', "sample type", 'STR'),
        array('created_by', 1, 'STR'),

        );
       
    
     $template_id = insertrow('form_templates', $value);
        if(!$template_id){
            echo json_encode(["Fail" => false, "error" => $e->getMessage()]);

            exit;
        }
     // Insert Questions
foreach ($data['questions'] as $q) {
    try {


        $value = array(
            array('template_id', $template_id, 'STR'),
            array('question_title', $q['text'], 'STR'),
            array('question_description', $q['description'], 'STR'),
            array('question_order', $q['order'], 'STR'),
            array('answer_type', $q['type'], 'STR'),
            array('is_required', 0, 'STR')
    
            );

        $question_id = insertrow('form_template_questions', $value);

        // Insert Options if applicable
        if (!empty($q['options'])) {
            foreach ($q['options'] as $opt) {
                $value = array(
                    array('question_id', $question_id, 'STR'),
                    array('template_id', $template_id, 'STR'),
                    array('option_value', $opt['text'], 'STR'),
                    array('answer_order', $opt['order'], 'STR'),
            
                    );
        

        $option_id = insertrow('form_template_answer_options', $value);


               
            }
        }

    } catch (Exception $ex) {          
        file_put_contents("debug_log.txt", "Error: " . $ex->getMessage() . "\n", FILE_APPEND);
    }
}


    // Return success response
    http_response_code(200);
    echo json_encode(['message' => 'Template saved successfully', "template_id" => $template_id]);


exit;

} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>