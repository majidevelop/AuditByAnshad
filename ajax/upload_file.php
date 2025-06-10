<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include('../functionPDO.php');

try {
    $response = [];

    // Check if the 'file' field was uploaded
    if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        $response = ['status' => 'error', 'message' => 'No file uploaded or error occurred.'];
        echo json_encode($response);
        exit;
    }

    // Get file info
    $file = $_FILES['file'];
    $fileTmpPath = $file['tmp_name'];
    $fileName = basename($file['name']);
    $fileSize = $file['size'];
    $fileType = $file['type'];

    // Validate file
    $maxFileSize = 5 * 1024 * 1024; // 5MB
    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf', 'text/plain']; // Adjust as needed
    if ($fileSize > $maxFileSize) {
        $response = ['status' => 'error', 'message' => 'File size exceeds 5MB limit.'];
        echo json_encode($response);
        exit;
    }
    if (!in_array($fileType, $allowedTypes)) {
        $response = ['status' => 'error', 'message' => 'Invalid file type. Allowed types: JPEG, PNG, PDF, TXT'];
        echo json_encode($response);
        exit;
    }

    // Set the destination directory
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Sanitize and generate unique filename
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $sanitizedFileName = time() . '_' . preg_replace('/[^a-zA-Z0-9\._-]/', '', $fileName);
    $destPath = $uploadDir . $sanitizedFileName;

    // Move file
    if (move_uploaded_file($fileTmpPath, $destPath)) {
        // Save file metadata to database
        $value = [
            ['file_name', $sanitizedFileName, 'STR'],
            ['file_path', $destPath, 'STR']
        ];

        // Insert into database and get file_id
        $fileId = insertrow('uploaded_files', $value); // Assumes 'files' table; adjust as needed

        if ($fileId) {
            $response = [
                'success' => true,
                'file_id' => $fileId,
                'filepath' => $destPath
            ];
        } else {
            $response = ['status' => 'error', 'message' => 'Failed to save file metadata to database.'];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Failed to move uploaded file.'];
    }

    echo json_encode($response);
    exit;
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    exit;
}
?>