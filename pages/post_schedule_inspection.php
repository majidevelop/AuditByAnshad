<?php

// Display errors in the browser
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$host = 'sdb-82.hosting.stackcp.net';
$username = 'db_ehse-35303839647d';
$password = 'A4Z0&}.Ftndg';
$database = 'db_ehse-35303839647d';
$pdo = new PDO("mysql:host=sdb-82.hosting.stackcp.net;dbname=db_ehse-35303839647d", "db_ehse-35303839647d", "A4Z0&}.Ftndg");

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {

    die('Connection failed: ' . $conn->connect_error);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $template = $_POST['templates'] ?? '';

    $site = !empty($_POST['sites']) ? $_POST['sites'] : '1';
    $asset = !empty($_POST['assets']) ? $_POST['assets'] : '1';
    $assignee = !empty($_POST['assignee']) ? $_POST['assignee'] : '1';
    $schedule = !empty($_POST['schedule']) ? $_POST['schedule'] : '1';


    if ($template && $site && $asset && $assignee && $schedule) {
        try{


        $stmt = $conn->prepare("INSERT INTO schedule_inspections (template_id, site_id, asset_id, assignee, schedule, created_by, due_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $due_date = NULL;
$created_by = "1"; // This should also be a variable, not a direct value

$stmt->bind_param("sssssss", $template, $site, $asset, $assignee, $schedule, $created_by, $due_date);



        if ($stmt->execute()) {
            echo "<script>alert('Inspection scheduled successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Failed to schedule inspection.');</script>";
        }

        $stmt->close();
    }
    catch (Exception $ex) {
        echo "<script>alert('Failed to schedule inspection: " . $ex->getMessage() . "');</script>";
    }
    } else {
        echo "<script>alert('All fields are required.".$template."');</script>";
    }
}

$conn->close();
?>
