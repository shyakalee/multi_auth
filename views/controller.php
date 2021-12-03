<?php
require_once ("../include/initialize.php");

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {

    case 'insert';
      register_user();    
        break;

        case 'save_group';
          save_group();
          break;

          case 'submit_permission';
          new_permission();
          break;
          
          case 'assign_perrmission';
          approve_permissions();
          break;

        default:
        echo '404';
        //redirect(web_root."index.php");
}


function approve_permissions() 
  {    
    if(isset($_POST['assign_now'])) 
    {
      global $mydb;

      $all_perms= new Assigned_permissions();      
      $selections=$_POST['checkItems'];
      for($i=0; $i < count($selections); $i++)
       {
         $group=$_POST['group_id'];       
      
        $sql= "INSERT INTO tbl_group_permissions(id_group, id_permission) VALUES ('$group' ,'$selections[$i]')";
	      $mydb->setQuery($sql);	
	      $mydb->executeQuery();   
        redirect(web_root."index.php?route=assign_permission");
        
      // foreach($_POST['checkItems'] as $key=>$selections) {
      //   print_r($selections[0]);        
      // }
    }
  }
}

function register_user()
{
  if(isset($_POST['send_datas']))
    {
      if (!empty($_POST['firstname'])&& !empty($_POST['group_val']) ) {
        $user=new User();
        $user->id         = "";
        $user->full_names = $_POST['firstname'];;
        $user->id_group   = $_POST['group_val'];
        $user->create();
        redirect(web_root."index.php?route=user_register");
        } else {
        // return false;
          redirect(web_root."index.php?route=user_register");
        }      
    } 
	}

  function save_group() 
  {
    $group=new Group();
    $group->id          = "";
    $group->title       =   $_POST['group_title'];
    $group->description =   $_POST['group_desc'];
    $group->create();
    redirect(web_root."index.php?route=add_group");
  }

  function new_permission() 
  {
    if(isset($_POST['save_permission']))
    {
    $permission=new Permission();
    $permission_name = preg_replace('/\s+/', '_', $_POST['permission_name']);
    $permission->id   =   "";
    $permission->permission_name = $permission_name;
    $permission->description = $_POST['description'];
    $permission->operations = $permission_name;
    $permission->create();
    redirect(web_root."index.php?route=add_permission");
  }

}
