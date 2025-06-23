<?php 
date_default_timezone_set("Asia/Bangkok");

//GET PAGE
// $page=$_GET['page'];
// GET PAGE
$page = isset($_GET['page']) ? $_GET['page'] : 'login'; // Default to 'login' if 'page' is not set


//HAndle Sessions
include ('get_login.php');



////INCLUDE PDO and funcntion
include ('functionPDO.php');
include ('main_function.php');
include ('encdecfunc.php');

//Checking Page exists
if($page=="")
$page="login";

//if($page=="login")
//$page=encrypt_url("login");
//$page=decrypt_url($page) ;

$layout0page = array("login","logout","proceed_login", "post_schedule_inspection");
$layout1page = array("home_page","add_product","edit_product","variant","view_product","forms_home", "form_template_list", "view_template", "schedule_inspection", "list_schedule_inspection",
 "form_template_list_view_cards", "view_schedule_inspection", "forms_master_layout","view_create_master_footer" ,"view_create_master_header", "list_schedule_inspection_calendar",
    "list_master_layouts", "view_master_layout_by_id", "view_schedule", "view_lead_auditor_approval_page", "form_design_audit_plan", "view_audit_plans", "create_audit_schedule",
    "list_audit_schedules", "view_audit_form" , "view_master_members", "view_master_companies", "view_master_roles", "view_master_departments", "view_master_audit_types" , "view_answers",
    "view_compliance_reports_list", "view_severity", "view_master_process");

$layout2page = array("pdf_print_html","pdf_print");

if (in_array($page,$layout0page))
$layout=0;

elseif(in_array($page,$layout2page))
$layout=2;


elseif(in_array($page,$layout1page))
$layout=1;


else
{
$page="blacklist";  
$layout=0;
}




//Prepare Lay0ut
if($layout=="1")
include('layout/header.php');

// Layout for logout pages
if($layout=="0")
include('layout_out/header.php');

include('pages/'.$page.'.php');
include('layout/footer.php');

//include ('modal_function.php');

?>