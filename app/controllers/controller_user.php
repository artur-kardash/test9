<?php

class Controller_User extends Controller
{
  function __construct()
  {
  	
  	if($_SESSION['level'] != 1){
  		   session_destroy();
      header('Location:/login');
  	}
    $this->model = new Model_User();
    $this->view = new View();
  }

 function action_index() {

 	$data["body_class"] = "page-header-fixed";
    $data["title"] = "Users";
    $data["title"] = "Users";
 	$res = $this->model->allusers();
 	$data['all'] = $res;
 	if($res == 'error'){
 		$data['all'] = "You don`t have a clients!";
 		$this->view->generate('admin_user_view.php', 'template_view.php', $data);
 	}else{
    $this->view->generate('admin_user_view.php', 'template_view.php', $data);
 	}
    // session_start();
   
    // if ( $_SESSION['admin'] == md5('admin'))
    // {
    //   header('Location:/user/alluser');
    //   $this->view->generate('admin_user_view.php', 'template_view.php', $data);
    // } else if ($_SESSION['user'] == md5('user')) {
    //   $data["user_id"] = $_SESSION["id"];

    //   header('Location:/client/dashboards');
    //   $this->view->generate('main_view.php', 'client_template_view.php', $data);
    // } else {
    //   session_destroy();
    //   header('Location:/login');
    //   $this->view->generate('danied_view.php', 'template_view.php', $data);
    // }
 }

 function action_alluser()
 {
 	// $data["title"] = "Users";
 	// $res = $this->model->allusers();
 	// $data['all'] = $res;
 	// if($res == 'error'){
 	// 	$data['all'] = "You don`t have a clients!";
 	// 	$this->view->generate('admin_user_view.php', 'template_view.php', $data);
 	// }else{
  //   $this->view->generate('admin_user_view.php', 'template_view.php', $data);
 	// }
 }

 function action_adduser()
 {	
 	$data['title'] = "Add new user";
 	$this->view->generate('admin_adduser_view.php', 'template_view.php', $data);
 }

function action_addnewuser()
{
	$res = $this->model->addnewuser();
}



}