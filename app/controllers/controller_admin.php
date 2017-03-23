<?php

class Controller_Admin extends Controller
{
  function __construct()
  {
    $this->model = new Model_Admin();
    $this->view = new View();
    if(Controller::getLevel() != 1){
      $data['title'] = 'Not login';
    $this->view->generate('danied_view.php', 'temp_error_view.php', $data);
    die();
    }
  }

  function action_index()
  {
    $data["title"] = 'Dashboard';
    $this->view->generate('dashboard_view.php', 'template_view.php', $data);
  }

  function action_dashboard()
  {
    // session_start();
    // if ($_SESSION['admin'] == md5('admin')) {
      $data["body_class"] = "page-header-fixed";
      $data["title"] = "Dashboard";
      $this->view->generate('dashboard_view.php', 'template_view.php', $data);
    // } else {
    //   session_destroy();
    //   $this->view->generate('danied_view.php', 'template_view.php', '');
    // }
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
    $results = $this->model->countclent();
    $data['count'] = $results;
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
    $data['title'] = "Add new user";
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
    // session_start();
    session_destroy();
    header('Location:/login');
  }

  function action_reviewcust()
  {
    $results = $this->model->countmanclent();
    $data['count'] = $results;
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

  function action_addcli()
  {
    $data['title'] = 'Add new client';
    $this->view->generate("admin_addnewclient_view.php", "template_view.php", $data);

  }

  function action_addnewclient()
  {
    $res = $this->model->addclient();
    if($res){
      header('Location:/admin/allusers');
    }else{
      return 'Error db';
    }
  }

  function action_make()
  {
    $res = $this->model->make();
    header('Location:/admin/allusers');
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
      $this->view->generate("all_listing_view.php", "template_view.php", $data);
    }else{
      $this->view->generate("all_listing_view.php", "template_view.php", $data); 
    }
  }

  function action_addlisting()
  {
    $data['title'] = "Add new listing";
    $this->view->generate("add_listing_view.php", "template_view.php", $data); 
  }

  function action_addnewlisting()
  {
    $res = $this->model->addnewlisting();
    if($res){
      header('Location:/admin/listing');
    }else{
      return 'Error db';
    }
  }

  function action_editlisting()
  {
    $res = $this->model->editlisting();
    $data['inf'] = $res;
    $this->view->generate("admin_editlisting_view.php", "template_view.php", $data);
  }

  function action_updatelisting()
  {
    $res = $this->model->updatelisting();
    header('Location:/admin/listing');
  }

  function action_deletelisting()
  {
    $res = $this->model->deletelisting();
    if($res){
    header('Location:/admin/listing');
    }else{
      echo "Error db";
    }
  }

  function action_addlistingexel()
  {
    
    
    $uploadfile = "files/".$_FILES['userfile']['name'];
    move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);

    require_once 'PHPExcel.php';
    $ar=array();
    $inputFileType = PHPExcel_IOFactory::identify($uploadfile);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($uploadfile);
    $ar = $objPHPExcel->getActiveSheet()->toArray();
    unset($ar[0]);
    $res = $this->model->saveexel($ar);
    header('Location:/admin/listing');

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

  function action_sinc()
  {
    $results = $this->model->allsize();
    $data['size'] = $results;
    $result = $this->model->alltype();
    $data['type'] = $result;
    $res = $this->model->allproject();
    $data['inf'] = $res;
    $data['title'] = "Sinc";
    $this->view->generate("sinc_view.php", "template_view.php", $data); 
  }

  function action_ressync()
  {
    $res = $this->model->ressync();
    if($res == FALSE){
      $data['error'] == "Sorry, but no matches found";
      $this->view->generate("sincresult_view.php", "template_view.php", $data); 
    }else{
      $data['res'] = $res;
      $this->view->generate("sincresult_view.php", "template_view.php", $data); 
    }
  }

  function action_appointment()
  {
    $data['title'] = "Appointment";
    $this->view->generate("appoinment_view.php", "template_view.php", $data); 
  }

  function action_allclients()
  {
    $res = $this->model->allclients();
    $data['inf'] = $res;
    $data['title'] = "All clients";
    $this->view->generate("allclients_view.php", "template_view.php", $data); 
  }

  function action_editclient()
  {
    $res = $this->model->editclients();
    $data['inf'] = $res;
    $data['title'] = "Edit client";
    $this->view->generate("editclient_view.php", "template_view.php", $data); 
  }

  function action_updateclient()
  {
      $res = $this->model->updateclient();
    if($res){
       header('Location:/admin/allusers');
    }else{
      echo "Error";
    }
  }

  function action_deleteclient()
  {
    $res = $this->model->deletecli();
    if($res){
    header('Location:/admin/allusers');
    }else{
      echo "Error db";
    }
  }

  function action_calendar()
  {
      $data['title'] = "Calendar";
      $this->view->generate("calendar_view.php", "template_view.php", $data);
  }



}
