<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include('../functionPDO.php');
try {

$input = json_decode(file_get_contents("php://input"), true);

// Check if templateId is provided
if (!isset($input['cover_name']) || ($input['cover_name'] === '')) {
    echo json_encode(["error" => "Missing cover_name"]);
    exit;
}


if (!isset($input['cover_text']) || ($input['cover_text'] === '<p><br data-cke-filler="true"></p>')) {
    echo json_encode(["error" => "Missing cover_text"]);
    exit;
}



$cover_name = $input['cover_name'];
$cover_desc = $input['cover_desc'];
$cover_text = $input['cover_text'];




 $value = array(
    array('cover_name', $cover_name, 'STR'),
    array('cover_desc', $cover_desc, 'STR'),
    array('cover_text', $cover_text, 'HTML'),

     
    );


 $productid = insertrow('form_covers', $value);
//if ($success) {
//    echo json_encode(['success' => 1]);
//} else {
//    echo json_encode(['error' => 'Update failed']);
//}

echo json_encode(['success' => true,'cover_id' => $productid]);

exit;
} catch (Exception $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
?>
