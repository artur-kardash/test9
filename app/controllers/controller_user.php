<?php

class Controller_User extends Controller
{
  function __construct()
  {

    $this->model = new Model_User();
    $this->view = new View();
  }

 function action_index() 
 {
    $data["title"] = 'Dashboard';
    $this->view->generate('user_dashboard_view.php', 'template_view.php', $data);
 }

 function action_dashboard()
 {	
 	$data['title'] = "Dashboard";
 	$this->view->generate('user_dashboard_view.php', 'user_template_view.php', $data);
 }

  function action_allusers()
  {
    $data["body_class"] = "page-header-fixed";
    $data["title"] = "Users";
    $res = $this->model->allusers();
    $data['all'] = $res;
    if($res == 'error'){
      $data['all'] = "You don`t have a managers!";
      $this->view->generate('user_view.php', 'user_template_view.php', $data);
    }else{
      $this->view->generate('user_view.php', 'user_template_view.php', $data);
    }
  }

  function action_addmanag()
  { 
    $data['title'] = "Add new manager";
    $this->view->generate('user_addmanag_view.php', 'user_template_view.php', $data);
  }

  function action_addnewmanag()
  {
    $res = $this->model->addnewmanag();
    if($res){
      header('Location:/user/allusers');
    }
  }

  function action_delete()
  {
    $res = $this->model->delete();
    if($res){
    header('Location:/user/allusers');
    }else{
      echo "Error db";
    }
  }

  function action_review()
  {
    $results = $this->model->countclent();
    $data['count'] = $results;
    $res = $this->model->review();
    $data['inf'] = $res;
    $this->view->generate("user_review_view.php", "user_template_view.php", $data);
  }

  function action_updateprofil()
  {
    $res = $this->model->updateprofil();
    if($res){
       header('Location:/user/allusers');
    }else{
      echo "Error";
    }
  }



}