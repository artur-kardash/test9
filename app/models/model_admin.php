<?php
class Model_Admin extends Model {

  public function get_data() {
    $loginUser = array(
      "login_status" => 1
    );
    return $loginUser;
  }

  public function allusers()
  {
    $sql = "SELECT * FROM `superuser`";
    $con  = $this->db();
    $res = $con->query($sql);
    if($res->num_rows>0){
    $all = array();
    while($result = $res->fetch_assoc()){
      $all[] = $result;
    }
      return $all;
    }else{
      return "error";
    }
  }

  public function addnewuser()
  {
    
    $id = $_COOKIE['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO `users`(email, password, level) VALUES ('$email', '$password', '2')";
    $con  = $this->db();
    $res = $con->query($sql);
    $last_id = $con->insert_id;
    
    $sql_query = "INSERT INTO `superuser`(firstname, lastname, dob, phone, user_id) VALUES ('$firstname', '$lastname', '$dob', '$phone', '$last_id')";
    $con  = $this->db();
    $result = $con->query($sql_query);
    if($res && $result){
      return 'Success';
    }else{
      return 'Error';
    }
    
  }

  public function delete()
  {
    $id = $_GET['id'];
    $sql = "DELETE FROM `superuser`";
    $sql .= "WHERE user_id='$id'";
    $con = $this->db();
    $res = $con->query($sql);
    $query = "DELETE FROM `users`";
    $query .= "WHERE id='$id'";
    $con = $this->db();
    $result = $con->query($query);
    $que = "DELETE FROM `manager`";
    $que .= "WHERE id_suser='$id'";
    $con = $this->db();
    $results = $con->query($que);

    if($res || $result || $results){
        return "Success";
    }else{
        return "Error db";
    }
  }

public function review()
{
  $id = $_GET['id'];
  $que = "SELECT `s`.`id` as `id_ag`, `s`.`firstname`, `u`.`id`, `s`.`lastname`, `s`.`dob`, `s`.`phone`, `s`.`user_id`, `u`.`email`, `u`.`password`, `u`.`level` FROM `superuser` as `s`";
  $que .="INNER JOIN `users` as `u`";
  $que .="ON u.id=s.user_id AND `s`.`user_id`=".$id;
  $con = $this->db();
  $results = $con->query($que);
  $res = $results->fetch_assoc();
   
  return $res;
}

public function getclients()
{
  $id = $_GET['id'];
  $sql = "SELECT * FROM `manager`";
  $sql .= "WHERE id_suser='$id'";
  $con = $this->db();
  $result = $con->query($sql);
  $res = array();
  while($all = $result->fetch_assoc())
  {
    $res[] = $all;
  }
  return $res;
}

public function updateprofil()
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $id_sus = $_POST['id'];
    $id = $_POST['id_sus'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    if(!empty($password)){
    $sql = "UPDATE `users`";
    $sql .= "SET email='$email', password='$password'";
    $sql .= "WHERE id='$id'";
    $con = $this->db();
    $res = $con->query($sql);
    }else{
    $sql = "UPDATE `users`";
    $sql .= "SET email='$email'";
    $sql .= "WHERE id='$id'";
    $con = $this->db();
    $res = $con->query($sql);
    }

    $query = "UPDATE `superuser`";
    $query .= "SET firstname='$firstname', lastname='$lastname', dob='$dob', phone='$phone'";
    $query .= "WHERE user_id='$id'";
   
    $con = $this->db();
    $result = $con->query($query);

    if($result){
      return 'Success';
    }else{
      return 'Error db';
    }

}

public function addnewcust()
{
    // $id = $_COOKIE['user_id'];
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO `users`(email, password, level) VALUES ('$email', '$password', '3')";
    $con  = $this->db();
    $res = $con->query($sql);
    $last_id = $con->insert_id;
    
    $sql_query = "INSERT INTO `manager`(firstname, lastname, dob, phone, user_id, id_suser) VALUES ('$firstname', '$lastname', '$dob', '$phone', '$last_id', '$id')";
    $con  = $this->db();
    $result = $con->query($sql_query);
    if($res && $result){
      return 'Success';
    }else{
      return 'Error';
    }
}

public function deletecust()
{
  $id = $_GET['id'];
  $sql = "SELECT `user_id` FROM `manager`";
  $sql .= "WHERE id='$id'";
  $con = $this->db();
  $resid = $con->query($sql);
  $id_res = $resid->fetch_assoc();
  $id_res_us = $id_res['user_id'];

  $que = "DELETE FROM `manager`";
  $que .= "WHERE id='$id'";
  $con = $this->db();
  $results = $con->query($que);

  $query = "DELETE FROM `users`";
  $query .= "WHERE id='$id_res_us'";
  $con = $this->db();
  $result = $con->query($query);

  if($result || $results){
      return "Success";
  }else{
      return "Error db";
  }
}

public function reviewcust()
{
  $id = $_GET['id'];
  $que = "SELECT `m`.`id` as `id_ag`, `m`.`firstname`, `u`.`id`, `m`.`lastname`, `m`.`dob`, `m`.`phone`, `m`.`user_id`, `m`.`id_suser`, `u`.`email`, `u`.`password`, `u`.`level` FROM `manager` as `m`";
  $que .="INNER JOIN `users` as `u`";
  $que .="ON u.id=m.user_id AND `m`.`id`=".$id;
  $con = $this->db();
  $results = $con->query($que);

  $res = $results->fetch_assoc();
   
  return $res;
}

public function updateprofilcust()
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $id_sus = $_POST['id'];
    $id = $_POST['id_sus'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    if(!empty($password)){
    $sql = "UPDATE `users`";
    $sql .= "SET email='$email', password='$password'";
    $sql .= "WHERE id='$id'";
    $con = $this->db();
    $res = $con->query($sql);
    }else{
    $sql = "UPDATE `users`";
    $sql .= "SET email='$email'";
    $sql .= "WHERE id='$id'";
    $con = $this->db();
    $res = $con->query($sql);
    }

    $query = "UPDATE `manager`";
    $query .= "SET firstname='$firstname', lastname='$lastname', dob='$dob', phone='$phone'";
    $query .= "WHERE user_id='$id'";
   
    $con = $this->db();
    $result = $con->query($query);

    if($result){
      return 'Success';
    }else{
      return 'Error db';
    }
}

public function countclent()
{
  $id = $_GET['id'];
  $sql_query = "SELECT `id` FROM `superuser`";
  $sql_query .= "WHERE user_id='$id'";
  $con = $this->db();
  $result = $con->query($sql_query);
  $id_sup = $result->fetch_assoc();
  $sup = $id_sup['id'];

  $sql = "SELECT count(*) as lim FROM `clients`";
  $sql .= "WHERE superuser_id=$sup";
  $con = $this->db();
  $res = $con->query($sql);
  $count = $res->fetch_assoc();

  return $count;
}

public function addclient()
{

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dt = $_POST['d&t'];
    $phone = $_POST['phone'];
    $development = $_POST['development'];
    $email = $_POST['email'];
    $investment = $_POST['investment'];
 if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $sql = "INSERT INTO `clients`(email, firstname, lastname, date_time, phone, development, investment, superuser_id) VALUES ('$email', '$firstname', '$lastname', '$dt', '$phone', '$development', '$investment', '$id')";
  }else{
    $id = $_COOKIE['user_id'];
    $sql = "INSERT INTO `clients`(email, firstname, lastname, date_time, phone, development, investment, admin_id) VALUES ('$email', '$firstname', '$lastname', '$dt', '$phone', '$development', '$investment', '$id')";
  }

    $con  = $this->db();
    $res = $con->query($sql);
   
    if($res){
      return 'Success';
    }else{
      return 'Error db';
    }
  
}

public function countmanclent()
{
  $id = $_GET['id'];
  // $sql_query = "SELECT `id` FROM `superuser`";
  // $sql_query .= "WHERE user_id='$id'";
  // $con = $this->db();
  // $result = $con->query($sql_query);
  // $id_sup = $result->fetch_assoc();
  // $sup = $id_sup['id'];

  $sql = "SELECT count(*) as lim FROM `clients`";
  $sql .= "WHERE manager_id='$id'";

  $con = $this->db();
  $res = $con->query($sql);
  $count = $res->fetch_assoc();

  return $count;
}

public function make()
{
  $id_man = $_GET['id'];
  $sql = "SELECT * FROM `manager`";
  $sql .= "WHERE id='$id_man'";
  $con = $this->db();
  $res = $con->query($sql);
  $manag = $res->fetch_assoc();

    $firstname = $manag['firstname'];
    $lastname = $manag['lastname'];
    $dob = $manag['dob'];
    $phone = $manag['phone'];
    $id_user = $manag['user_id'];

    $sql_query = "INSERT INTO `superuser`(firstname, lastname, phone, dob, user_id) VALUES ('$firstname', '$lastname', '$phone', '$dob', '$id_user')";
    $con = $this->db();
    $result = $con->query($sql_query);


    $sql_upd = "UPDATE `users`";
    $sql_upd .= "SET level='2'";
    $sql_upd .= "WHERE id='$id_user'";
    $con = $this->db();
    $results = $con->query($sql_upd);
   

    $sql_del = "DELETE FROM `manager`";    
    $sql_del .= "WHERE id='$id_man'";
    $con = $this->db();
    $result_del = $con->query($sql_del);

}


  public function alllisting()
  {
    $sql = "SELECT * FROM `listing`";
    $con  = $this->db();
    $res = $con->query($sql);
    if($res->num_rows>0){
    $all = array();
    while($result = $res->fetch_assoc()){
      $all[] = $result;
    }
      return $all;
    }else{
      return "error";
    }
  }

  public function addnewlisting()
  {
    $district = $_POST['district'];
    $huttons = $_POST['huttons'];
    $projectname = $_POST['projectname'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $tenure = $_POST['tenure'];
    $commission = $_POST['commission'];
    $contact_person = $_POST['contact_person'];
    $tagging = $_POST['tagging'];
    $building_status = $_POST['building_status'];
    $remarks = $_POST['remarks'];
    $location = $_POST['location'];
    $est = $_POST['est'];
    $usp = $_POST['usp'];
    $sql = "INSERT INTO `listing`";
    $sql .= "(district, huttons, project_name, location, type, size, price, tenure, commission, contact_person, tagging, remarks, est, usp)";
    $sql .= " VALUES ('$district', '$huttons', '$projectname', '$location', '$type', '$size', '$price', '$tenure', '$commission', '$contact_person', '$tagging', '$remarks', '$est', '$usp')";
    $con  = $this->db();
    $res = $con->query($sql);
    if($res){
      return 'Success';
    }else{
      return 'Error db';
    }
    
  }

  public function editlisting()
  {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `listing`";
    $sql .= "WHERE id = '$id'";
    $con  = $this->db();
    $res = $con->query($sql);
    $listing = $res->fetch_assoc();

    return $listing;

  }

  public function updatelisting()
  {
    $id = $_POST['id'];
    $district = $_POST['district'];
    $huttons = $_POST['huttons'];
    $projectname = $_POST['projectname'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $tenure = $_POST['tenure'];
    $commission = $_POST['commission'];
    $contact_person = $_POST['contact_person'];
    $tagging = $_POST['tagging'];
    // $building_status = $_POST['building_status'];
    $remarks = $_POST['remarks'];
    $location = $_POST['location'];
    $est = $_POST['est'];
    $usp = $_POST['usp'];
    $sql = "UPDATE `listing`";
    $sql .= "SET district='$district', huttons='$huttons', project_name='$projectname', location='$location', type='$type', size='$size', price='$price', tenure='$tenure', commission='$commission', contact_person='$contact_person', tagging='$tagging', remarks='$remarks', est='$est', usp='$usp'";
    $sql .= " WHERE id='$id'";   
    $con  = $this->db();
    $res = $con->query($sql);
    if($res){
      return 'Success';
    }else{
      return 'Error db';
    }
  }

  public function deletelisting()
  {
    $id = $_GET['id'];
    $sql = "DELETE FROM `listing`";
    $sql .= "WHERE id='$id'";
    $con = $this->db();
    $results = $con->query($sql);
    if($results){
      return "Success";
    }else{
        return "Error db";
    }
  }

  public function saveexel($ar)
  {
  
    foreach ($ar as $ar_item) {
  
    $district = $ar_item[0];
    $huttons = $ar_item[1];
    $projectname = $ar_item[2];
    $location = $ar_item[3];
    $type = $ar_item[4];
    $size = $ar_item[5];
    $price = trim($ar_item[6]);
    $price = substr($price, 1);
    $tenure = $ar_item[7];
    $commission = $ar_item[8];
    $contact_person = $ar_item[9];
    $tagging = $ar_item[10];
    // $building_status = $ar_item[11];
    $remarks = $ar_item[11];
    $est = $ar_item[12];
    $usp = $ar_item[13];
      
// var_dump($key);
    
    $sql = "INSERT INTO `listing`";
    $sql .= "(district, huttons, project_name, location, type, size, price, tenure, commission, contact_person, tagging, remarks, est, usp)";
      // foreach($key as $val){
   
    $sql .= " VALUES ('$district', '$huttons', '$projectname', '$location', '$type', '$size', '$price', '$tenure', '$commission', '$contact_person', '$tagging', '$remarks', '$est', '$usp')";
   
    $con = $this->db();
    $results = $con->query($sql);

    }
  }

  public function allproject()
  {
    $sql = "SELECT `project_name` FROM `listing`";
    $sql .= "WHERE project_name<>''";
    $sql .= "GROUP BY `project_name`";
    $con = $this->db();
    $res = $con->query($sql);
    $all = array();    
      while($result = $res->fetch_assoc()){
        $all[] = $result;
      }
      return $all;
  }

  public function allsize()
  {
    $sql = "SELECT `size` FROM `listing`";
    // $sql .= "WHERE size<>''";
    $sql .= "GROUP BY `size`";
    $con = $this->db();
    $res = $con->query($sql);
    $all = array();    
      while($result = $res->fetch_assoc()){
        $all[] = $result;
      }
      return $all;
  }

  public function alltype()
  {
    $sql = "SELECT `type` FROM `listing`";
    $sql .= "WHERE type<>''";
    $sql .= "GROUP BY `type`";
    $con = $this->db();
    $res = $con->query($sql);
    $all = array();    
      while($result = $res->fetch_assoc()){
        $all[] = $result;
      }
      return $all;
  }



  public function ressync()
  {

    // var_dump($_POST);
    // exit();
    
    $project = trim($_POST['project']);
    $district = trim($_POST['district']);
    $tenure = trim($_POST['tenure']);
    $size = trim($_POST['size']);
    $type = trim($_POST['type']);
    // $tenure = trim($_POST['tenure']);
      $a = "district = '$district' AND";
      $b = "project_name = '$project' AND";
      $c = "tenure = '$tenure' AND";
      $d = "size = '$size' AND";
      $e = "type = '$type' AND";


  if(empty($_POST['district'])){
    unset($a);
  }
  if(empty($_POST['project'])){
    unset($b);
  }
  if(empty($_POST['tenure'])){
    unset($c);
  }
  if(empty($_POST['size'])){
    unset($d);
  }
  if(empty($_POST['type'])){
    unset($e);
  }

$k="";
if(empty($_POST['type']) && empty($_POST['district']) && empty($_POST['project']) && empty($_POST['tenure']) && empty($_POST['size'])){
  $k = "AND";
}else{
  unset($k);
}
$f = "";
if($_POST['price'] == 'below 500'){
  $f = "price >= '500'";
}else if($_POST['price'] == '500-1'){
  $f = "price BETWEEN '500' AND '1000000'";
}else if($_POST['price'] == '1-2'){
  $f = "price BETWEEN '1000000' AND '2000000'";
}else if($_POST['price'] == '2-3'){
  $f = "price BETWEEN '2000000' AND '3000000'";
}else{
  $f = "price >='3000000'";
}

if(empty($_POST['price'])){
  unset($f);
}
//     $sqlq = "SELECT `price` FROM `listing`";
//     $con = $this->db();
//     $res = $con->query($sqlq);
//     $all = array();
//     while($result = $res->fetch_assoc()){
//       $all[] = $result;
//     }
// foreach($all as $alls){
//     var_dump($alls['price']);

// }
//     exit();

    $sql = "SELECT * FROM `listing`";
    if($_POST['price'] == 'below 500'){
    $sql .= " WHERE $a $c $d $e $b $f";
    }else if($_POST['price'] == '500-1'){
      $sql .= " WHERE $a $c $d $e $b $f";
    }else if($_POST['price'] == '1-2'){
      $sql .= " WHERE $a $c $d $e $b $f";
    }else if($_POST['price'] == '2-3'){
      $sql .= " WHERE $a $c $d $e $b $f";
    }else{
      $sql .= " WHERE $a $c $d $e $b $f";
    }

    if(empty($_POST['price'])){
    $sql = substr($sql, 0, -8);
    }
    // var_dump($sql);
    // exit();
    // $sql .= " WHERE district LIKE '%$district%' AND type LIKE '%$type%' AND size LIKE '%$size%' AND price LIKE '%$price%' AND tenure LIKE '%$tenure%'";
    $con = $this->db();
    $res = $con->query($sql);
    if($res->num_rows>0){
      $all = array();    
      while($result = $res->fetch_assoc()){
        $all[] = $result;
      }
      return $all;
    }else{
      return FALSE;
    }
  }


  public function allclients()
  {
    $id = $_COOKIE['user_id'];
    $sql = "SELECT * FROM `clients`";
    $sql .= "WHERE admin_id='$id'";
    $con = $this->db();
    $res = $con->query($sql);
    $all = array();
    if($res->num_rows>0){
      while ($result = $res->fetch_assoc()) {
       $all[] = $result; 
      }
      return $all;
    }else{
      return "error";
    }
  }

  public function editclients()
  {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `clients`";
    $sql .= "WHERE id = '$id'";
    $con  = $this->db();
    $res = $con->query($sql);
    $client = $res->fetch_assoc();

    return $client; 
  }

  public function updateclient()
  {
 
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $date = $_POST['date_time'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $development = $_POST['development'];
    $investment = $_POST['investment'];
    
    $sql = "UPDATE `clients`";
    $sql .= " SET firstname='$firstname', lastname='$lastname', date_time='$date', phone='$phone', email='$email', development='$development', investment='$investment'";
    $sql .= " WHERE id='$id'";
    $con = $this->db();
    $res = $con->query($sql);

    if($res){
      return 'Success';
    }else{
      return 'Error db';
    }

  }

  public function deletecli()
  {
    $id = $_GET['id'];
    $sql = "DELETE FROM `clients`";
    $sql .= "WHERE id='$id'";
    $con = $this->db();
    $res = $con->query($sql);
 
    if($res){
        return "Success";
    }else{
        return "Error db";
    }
  }







}
