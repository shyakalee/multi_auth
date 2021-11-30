<?php

require_once ("include/initialize.php");

$contents='home.php';
$view = (isset($_GET['route']) && $_GET['route'] != '') ? $_GET['route'] : '';

switch ($view) {
 
	case 'home' :
        $title="Dashboard";	
		$contents='views/home.php';		
		break;

        case 'user_register' :
            $title="Register User";	
            $contents='views/user_register.php';		
            break;
            
            case 'add_group' :
                $title="Add Group";	
                $contents='views/add_group.php';
                break;

                case 'existing_groups' :
                    $title="Manage Groups";	
                    $contents='views/groups.php';
                    break;

                    case 'manage_user' :
                        $title="Manage Users";	
                        $contents='views/manage_users.php';
                        break;

                        case 'assign_permission';
                            $title="Assign Permisiions";	
                            $contents='views/permission_assignment.php';
                            break;

                            case 'add_permission':
                                $contents='views/add_permission.php';
                                break;
 	
	default :
	    $title="Dashboard";	
		$contents='views/home.php';			

}

require_once("views/templates.php");

?>