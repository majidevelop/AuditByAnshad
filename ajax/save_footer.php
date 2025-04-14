<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include('../functionPDO.php');
try {

$input = json_decode(file_get_contents("php://input"), true);

// Check if templateId is provided
if (!isset($input['footer_name']) || ($input['footer_name'] === '')) {
    echo json_encode(["error" => "Missing footer_name"]);
    exit;
}


if (!isset($input['footer_text']) || ($input['footer_text'] === '<p><br data-cke-filler="true"></p>')) {
    echo json_encode(["error" => "Missing footer_text"]);
    exit;
}



$footer_name = $input['footer_name'];
$footer_desc = $input['footer_desc'];
$footer_text = $input['footer_text'];




 $value = array(
    array('footer_name', $footer_name, 'STR'),
    array('footer_desc', $footer_desc, 'STR'),
    array('footer_text', $footer_text, 'HTML'),

     
    );


 $productid = insertrow('form_footers', $value);
//if ($success) {
//    echo json_encode(['success' => 1]);
//} else {
//    echo json_encode(['error' => 'Update failed']);
//}

echo json_encode(['success' => true,'footer_id' => $productid]);

exit;
} catch (Exception $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
?>
