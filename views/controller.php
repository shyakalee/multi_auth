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
          
          case 'save_assign';
          register_assign();
          break;

        default:
        echo '404';
        //redirect(web_root."index.php");

}


function register_assign()
{
  if(isset($_POST['assign_now']))
    {
      global $mydb;

      $id=1;
      $checkItem = $_POST["checkItem"];
                            
      $a = count($checkItem);  
    for($i=0;$i<$a;$i++){

      $sql="insert into tbl_group_permissions(id_group,id_permission)values('$id','$checkItem[$i]')";
      $mydb->setQuery($sql);
      $query=$mydb->executeQuery();

      if ($query) {
        return true;
      } else {
        return false;
      }
      redirect(web_root."index.php?route=assign_permission");

      // $ass=new Assignment();
      // $ass->id="";
      // $ass->id_group=1;
      // $ass->id_permission=$_POST[''];
      // $ass->create();
      
    } 
  }  
	
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


  
}
