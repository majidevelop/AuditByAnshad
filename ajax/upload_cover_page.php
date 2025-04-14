<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include('../functionPDO.php');
try {

$input = json_decode(file_get_contents("php://input"), true);

$response = [];

if (!isset($_FILES['cover_page']) || $_FILES['cover_page']['error'] !== UPLOAD_ERR_OK) {
    $response = ['status' => 'error', 'message' => 'No file uploaded or error occurred.'];
    echo json_encode($response);
    exit;
}

// Set the destination directory
$uploadDir = 'uploads/cover_pages/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Get file info
$fileTmpPath = $_FILES['cover_page']['tmp_name'];
$fileName = basename($_FILES['cover_page']['name']);
$fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9\._-]/', '', $fileName); // sanitize
$destPath = $uploadDir . $fileName;

// Move file
if (move_uploaded_file($fileTmpPath, $destPath)) {
    $response = ['status' => 'success', 'file_name' => $fileName];

    // Optional: Save file name in DB using your functionsPDO
    // include 'functions_pdo.php';
    // saveFileNameToDatabase($fileName); // ← your custom function

    
 $value = array(
    array('file_name', $fileName, 'STR'),
    array('file_path', $destPath, 'STR')
     
    );


 $productid = insertrow('uploaded_files', $value);

} else {
    $response = ['status' => 'error', 'message' => 'Failed to move uploaded file.'];
}

echo json_encode($response);


exit;
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>
