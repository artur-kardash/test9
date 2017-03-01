<?php

class Controller_Admin extends Controller
{
  function __construct()
  {
    session_start();
    if($_SESSION['level'] != 1){
      session_destroy();
      header('Location:/login');
    }
    $this->model = new Model_Admin();
    $this->view = new View();
  }
  function action_index()
  {
    $data["title"] = 'Dashboard';
    $this->view->generate('dashboard_view.php', 'template_view.php', $data);
    // $data["body_class"] = "page-header-fixed";
    // $data["title"] = "Dashboard";
    // session_start();
    // if ( $_SESSION['admin'] == md5('admin'))
    // {
    //   header('Location:/admin/dashboard');
    //   $this->view->generate('admin_view.php', 'template_view.php', $data);
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

  function action_dashboard()
  {
    session_start();
    if ($_SESSION['admin'] == md5('admin')) {
      $data["body_class"] = "page-header-fixed";
      $data["title"] = "Dashboard";
      $data["order"] = $this->model->DistributionOrder();
      $data["MonthlyStats"] = $this->model->getMonthlyStats();
      $this->view->generate('dashboard_view.php', 'template_view.php', $data);
    } else {
      session_destroy();
      $this->view->generate('danied_view.php', 'template_view.php', '');
    }
  }



  function action_logout()
  {
    session_start();
    session_destroy();
    header('Location:/login');
  }

}