<?php

class Controller_Admin extends Controller
{
  function __construct()
  {
    $this->model = new Model_Admin();
    $this->view = new View();
  }

  function action_index()
  {
    $data["title"] = 'Dashboard';
    $this->view->generate('dashboard_view.php', 'template_view.php', $data);
  }

  function action_dashboard()
  {
    session_start();
    if ($_SESSION['admin'] == md5('admin')) {
      $data["body_class"] = "page-header-fixed";
      $data["title"] = "Dashboard";
      $this->view->generate('dashboard_view.php', 'template_view.php', $data);
    } else {
      session_destroy();
      $this->view->generate('danied_view.php', 'template_view.php', '');
    }
  }
  function action_allusers()
  {
    // var_dump(Controller::getLevel());
    // die;
    $data["body_class"] = "page-header-fixed";
    $data["title"] = "Users";
    $res = $this->model->allusers();
    $data['all'] = $res;
    if($res == 'error'){
      $data['all'] = "You don`t have a clients!";
      $this->view->generate('admin_user_view.php', 'template_view.php', $data);
    }else{
      $this->view->generate('admin_user_view.php', 'template_view.php', $data);
    }
  }

  function action_adduser()
  { 
    $data['title'] = "Add new user";
    $this->view->generate('admin_adduser_view.php', 'template_view.php', $data);
  }

  function action_addnewuser()
  {
    $res = $this->model->addnewuser();
    if($res){
      header('Location:/admin/allusers');
    }
  }

  function action_delete()
  {
    $res = $this->model->delete();
    if($res){
    header('Location:/admin/allusers');
    }else{
      echo "Error db";
    }
  }

  function action_review()
  {
    $result = $this->model->getclients();
    $data['cli'] = $result;
    $res = $this->model->review();
    $data['inf'] = $res;
    $this->view->generate("admin_review_view.php", "template_view.php", $data);
  }

  function action_updateprofil()
  {
    $res = $this->model->updateprofil();
    if($res){
       header('Location:/admin/allusers');
    }else{
      echo "Error";
    }
  }

  function action_addcustomer()
  {
    $data['title'] = "Add new customer";
    $this->view->generate('admin_addcustom_view.php', 'template_view.php', $data);
  }

  function action_addnewcust()
  {
    $res = $this->model->addnewcust();
    if($res){
      header('Location:/admin/allusers');
    }
  }

  function action_deletecust()
  {
    $res = $this->model->deletecust();
    if($res){
    header('Location:/admin/allusers');
    }else{
      echo "Error db";
    }
  }

  function action_logout()
  {
    session_start();
    session_destroy();
    header('Location:/login');
  }

  function action_reviewcust()
  {
    $res = $this->model->reviewcust();
    $data['inf'] = $res;
    $this->view->generate("admin_reviewcust_view.php", "template_view.php", $data);
  }

  function action_updateprofilcust()
  {
    $res = $this->model->updateprofilcust();
    if($res){
       header('Location:/admin/allusers');
    }else{
      echo "Error";
    }
  }

}
