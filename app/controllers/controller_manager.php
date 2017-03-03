<?php
class Controller_Manager extends Controller
{

  function __construct()
  {
    $this->model = new Model_Manager();
    $this->view = new View();
  }

 function action_index()
  {
    $data["title"] = 'Dashboard';
    $this->view->generate('manager_dashboard_view.php', 'manager_template_view.php', $data);
  }

 function action_dashboard()
 {  
  $data['title'] = "Dashboard";
  $this->view->generate('manager_dashboard_view.php', 'manager_template_view.php', $data);
 }

  function action_allusers()
  {
    $data["body_class"] = "page-header-fixed";
    $data["title"] = "Clients";
    $res = $this->model->allusers();
    $data['all'] = $res;
    if($res == 'error'){
      $data['all'] = "You don`t have a clients!";
      $this->view->generate('manager_view.php', 'manager_template_view.php', $data);
    }else{
      $this->view->generate('manager_view.php', 'manager_template_view.php', $data);
    }
  }

  function action_addclient()
  { 
    $data['title'] = "Add new client";
    $this->view->generate('manager_addcli_view.php', 'manager_template_view.php', $data);
  }

  function action_addnewcli()
  {
    $res = $this->model->addnewcli();
    if($res){
      header('Location:/manager/allusers');
    }
  }

   function action_delete()
  {
    $res = $this->model->delete();
    if($res){
    header('Location:/manager/allusers');
    }else{
      echo "Error db";
    }
  }

  function action_review()
  {
    $res = $this->model->review();
    $data['inf'] = $res;
    $this->view->generate("manager_review_view.php", "manager_template_view.php", $data);
  }

   function action_updateprofil()
  {
    $res = $this->model->updateprofil();
    if($res){
       header('Location:/manager/allusers');
    }else{
      echo "Error";
    }
  }


}
