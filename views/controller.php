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
          
          case 'submit_assign_perrmission';
          approve_permissions();
          break;

        default:
        echo '404';
        //redirect(web_root."index.php");

}


function register_user()
{
  if(isset($_POST['send_datas']))
    {
      $user=new User();
      $user->id         = "";
      $user->full_names = $_POST['firstname'];;
      $user->id_group   = $_POST['group_val'];
      $user->create();
       redirect(web_root."index.php?route=user_register");
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


  function approve_permissions() {
    echo "test perissions";
  }
}
