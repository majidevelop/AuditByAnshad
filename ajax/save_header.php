<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include('../functionPDO.php');
try {

$input = json_decode(file_get_contents("php://input"), true);

// Check if templateId is provided
if (!isset($input['header_name']) || ($input['header_name'] === '')) {
    echo json_encode(["error" => "Missing header_name"]);
    exit;
}


if (!isset($input['header_text']) || ($input['header_text'] === '<p><br data-cke-filler="true"></p>')) {
    echo json_encode(["error" => "Missing header_text"]);
    exit;
}




$header_name = $input['header_name'];
$header_desc = $input['header_desc'];
$header_text = $input['header_text'];


// echo json_encode(["error" => $header_text]);
// exit;


 $value = array(
    array('header_name', $header_name, 'STR'),
    array('header_desc', $header_desc, 'STR'),
    array('header_text', $header_text, 'HTML'),

     
    );


 $productid = insertrow('form_headers', $value);
//if ($success) {
//    echo json_encode(['success' => 1]);
//} else {
//    echo json_encode(['error' => 'Update failed']);
//}

echo json_encode(['success' => true,'header_id' => $productid]);

exit;
} catch (Exception $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
?>
