<?php

class Controller_User extends Controller
{
  function __construct()
  {
    $this->model = new Model_User();
    $this->view = new View();
    if(Controller::getLevel() != 2){
      $data['title'] = 'Not login';
    $this->view->generate('danied_view.php', 'temp_error_view.php', $data);
    die();
    }
  }

 function action_index() 
 {
    $data["title"] = 'Dashboard';
    $this->view->generate('user_dashboard_view.php', 'user_template_view.php', $data);
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

  function action_editlisting()
  {
    $res = $this->model->editlisting();
    $data['inf'] = $res;
    $this->view->generate("user_editlisting_view.php", "user_template_view.php", $data);
  }

  function action_updatelisting()
  {
    $res = $this->model->updatelisting();
    header('Location:/user/listing');
  }

  function action_deletelisting()
  {
    $res = $this->model->deletelisting();
    if($res){
    header('Location:/user/listing');
    }else{
      echo "Error db";
    }
  }

  function action_listing()
  {
    $res = $this->model->listing();
    $data['inf'] = $res;
     if($res == 'error'){
      $data['all'] = "You don`t have a listing!";
      $this->view->generate("user_listing_view.php", "user_template_view.php", $data);
    }else{
      $this->view->generate("user_listing_view.php", "user_template_view.php", $data); 
    }
  }

  function action_table()
  {

$table = 'listing';
 
$primaryKey = 'id';
 
$columns = array(
          array('db' => 'id', 'dt' => 0, 'field'=>'id'),
          array('db' => 'district', 'dt' => 1, 'field'=>'district'),
          array('db' => 'huttons', 'dt' => 2, 'field'=>'huttons'),
          array('db' => 'project_name', 'dt' => 3, 'field'=>'project_name'),
          array('db' => 'location', 'dt' => 4, 'field'=>'location'),
          array('db' => 'type', 'dt'=> 5, 'field'=>'type'),
          array('db' => 'size', 'dt'=> 6, 'field'=>'size'),
          array('db' => 'price', 'dt'=> 7, 'field'=>'price'),
          array('db' => 'tenure', 'dt'=> 8, 'field'=>'tenure'),
          array('db' => 'commission', 'dt'=> 9, 'field'=>'commission'),
          array('db' => 'contact_person', 'dt'=> 10, 'field'=>'contact_person'),
          array('db' => 'tagging', 'dt'=> 11, 'field'=>'tagging'),
          array('db' => 'remarks', 'dt'=> 12, 'field'=>'remarks'),
          array('db' => 'est', 'dt'=> 13, 'field'=>'est'),
          array('db' => 'usp', 'dt'=> 14, 'field'=>'usp'),
          array('db' => 'id', 'dt' => 15, 'field'=>'id', 'formatter' => function($d, $row) {
        $string = "<a href='/user/editlisting?id=".$d."'>"."<input class='btn btn-info pull-left newbutton' type='submit' value='Edit'>"."</a>";
        $string .= "<a href='/user/deletelisting?id=".$d."'>"."<input class='btn btn-info pull-left newbutton' type='submit' value='Delete'>"."</a>";
        return $string;
      }),
);
 
$sql_details = array(
    'user' => DB_USER,
    'pass' => DB_PASS,
    'db'   => DB_NAME,
    'host' => DB_HOST
);
 
ob_clean();

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
);
exit();
  }

  // function action_deletelisting()
  // {
  //   $res = $this->model->deletelisting();
  //   if($res){
  //   header('Location:/admin/listing');
  //   }else{
  //     echo "Error db";
  //   }
  // }
  function action_logout()
  {
    // session_start();
    session_destroy();
    header('Location:/login');
  }


}