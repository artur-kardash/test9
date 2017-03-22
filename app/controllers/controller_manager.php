<?php
class Controller_Manager extends Controller
{

  function __construct()
  {
    $this->model = new Model_Manager();
    $this->view = new View();
    if(Controller::getLevel() != 3){
      $data['title'] = 'Not login';
    $this->view->generate('danied_view.php', 'temp_error_view.php', $data);
    die();
    }
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

  function action_listing()
  {
    $res = $this->model->alllisting();
    $proj = $this->model->allprojects();
    $data['proj'] = $proj;
    $proj = $this->model->allloc();
    $data['allloc'] = $proj;
    $type = $this->model->alltypes();
    $data['alltype'] = $type;
    $size = $this->model->allsizes();
    $data['allsize'] = $size;
    $com = $this->model->allcom();
    $data['allcom'] = $com;
    $con = $this->model->allcon();
    $data['allcon'] = $con;
    $est = $this->model->allest();
    $data['allest'] = $est;
    $usp = $this->model->allusp();
    $data['allusp'] = $usp;
    $data['title'] = 'All listing';
    $data['all'] = $res;
  
     if($res == 'error'){
      $data['all'] = "You don`t have a listing!";
      $this->view->generate("manager_listing_view.php", "manager_template_view.php", $data);
    }else{
      $this->view->generate("manager_listing_view.php", "manager_template_view.php", $data); 
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
        $string = "<a href='/admin/editlisting?id=".$d."'>"."<input class='btn btn-info pull-left newbutton' type='submit' value='Edit'>"."</a>";
        $string .= "<a href='/admin/deletelisting?id=".$d."'>"."<input class='btn btn-info pull-left newbutton' type='submit' value='Delete'>"."</a>";
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

  function action_logout()
  {
    // session_start();
    session_destroy();
    header('Location:/login');
  }

  function action_sinc()
  {
    $results = $this->model->allsize();
    $data['size'] = $results;
    $result = $this->model->alltype();
    $data['type'] = $result;
    $res = $this->model->allproject();
    $data['inf'] = $res;
    $data['title'] = "Sinc";
    $this->view->generate("manager_sinc_view.php", "manager_template_view.php", $data); 
  }

  function action_ressync()
  {
    $res = $this->model->ressync();
    if($res == FALSE){
      $data['error'] == "Sorry, but no matches found";
      $this->view->generate("manager_sincresult_view.php", "manager_template_view.php", $data); 
    }else{
      $data['res'] = $res;
      $this->view->generate("manager_sincresult_view.php", "manager_template_view.php", $data); 
    }
  }

  function action_calendar()
  {
    $this->view->generate("manager_calendar_view.php", "manager_template_view.php", $data); 
  }



}
