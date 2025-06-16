<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
<?php
ini_set('display_errors', 1); // Show errors in browser (for development only)
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 $myusername=$_POST['username']; 
 $mypassword=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);

$tbl_name="users";
$where=array(array('eid',$myusername,'STR'),array('password',$mypassword,'STR'));
$count= rownum($tbl_name,$where);


if($count==1)
{
$row=getrow($tbl_name,$where);
$eid=$row['eid'];
$password=$row['password'];
$name=$row['name'];
$application_user_id=$row['application_user_id'];


$application_user_tbl_name="application_users";
$application_user_where=array(array('user_id',$application_user_id,'STR'));
$row=getrow($application_user_tbl_name,$application_user_where);

$company_id = $row['company_id'];
$roles_string = $row['roles'];
$roles_array = explode(",",$roles_string);
session_start();
$_SESSION['session_user']=$eid;
$_SESSION['session_username']=$name;
$_SESSION['session_privilege']="0";
$_SESSION['loggedin']="true";
$_SESSION['company_id']= $company_id;
$_SESSION['roles_array']= $roles_array;
$_SESSION['application_user_id']  = $application_user_id;



date_default_timezone_set('Asia/Calcutta');
$t=time();
$ctime=date("Y-m-d H:i:s",$t);


$value=array(array('lastlog',$ctime,'STR'));
updaterow($tbl_name,$value,$where);

$loginpage=encrypt_url('home_page'); 
echo "<script> window.location='".$loginpage."';</script>";
header("Location: ".$loginpage);

}


elseif($count!=1)
{
$tbl_name="admins";
$where=array(array('username',$myusername,'STR'),array('password',$mypassword,'STR'));
print_r($where);
$countad= rownum($tbl_name,$where);


  if($countad==1)
  {
    $row=getrow($tbl_name,$where);
    $eid=0000;
    $password=$row['password'];
    $name=$row['name'];

    session_start();
    $_SESSION['session_user']=$eid;
    $_SESSION['session_username']=$name;
    $_SESSION['session_privilege']="10";

    date_default_timezone_set('Asia/Calcutta');
    $t=time();
    $ctime=date("Y-m-d H:i:s",$t);

    $value=array(array(lastlog,$ctime,'STR'));
    updaterow($tbl_name,$value,$where);
    $loginpage=encrypt_url('home_page'); 
    echo "<script> window.location='".$loginpage."';</script>";
    header("Location: ".$loginpage);
  }
  else
  {
    
    session_start();
    $_SESSION['session_login_show']="<br/>Error: Wrong Login Credentials.";

    $loginpage=encrypt_url('login')."?show=fine"; 
    echo '<script> alert("Error: Wrong Login Credetials.");</script>';
    echo "<script> window.location='".$loginpage."';</script>";
    header("Location: ".$loginpage);   
  }
    
}
else
{
	session_start();
$_SESSION['session_login_show']="Fine";

$_SESSION['session_login_show']="<br/>Error: Wrong Login Credentials."; 
echo '<script> alert("Error: Wrong Login Credetials.");</script>';
echo "<script> window.location='".$loginpage."';</script>";
header("Location: ".$loginpage);
}



?>


          </div>
        </div>
        <!-- /page content -->