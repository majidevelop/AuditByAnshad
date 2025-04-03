<?php
header("Content-Type: application/json");
include('../functionPDO.php');

include('../get_login.php');
echo json_encode(["success" => true, "data" => "sad"]);


try {
    // $pdo = new PDO("mysql:host=localhost;dbname=ehse", "root", "");
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $stmt = $pdo->query("SELECT id, title, description, created_at FROM form_templates ORDER BY created_at DESC");
    // $templates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $templates = array();
$templates=allrows('form_templates',1,'created_at DESC');


    echo json_encode(["success" => true, "data" => $templates]);
} catch (Exception $e) {
    echo json_encode(["Fail" => false, "error" => $e->getMessage()]);
}
?>



<?php
// header('Content-Type: application/json');

// include('../functionPDO.php');

// include('../get_login.php');

// $seller=$user_id;
// $success=1;

// $id=$_POST['id'];


// $where = array(
//     array('seller', $seller, 'INT')
//               );

// $orders=array();
// $rows=allrows('seller_payments',$where,'id DESC');


// echo json_encode(array('success'=>$success,'seller'=>$seller,'payments'=>$rows));
//echo json_encode($js_options_array);

?>