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
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dt = $_POST['d&t'];
    $phone = $_POST['phone'];
    $projectname = $_POST['projectname'];
    $email = $_POST['email'];
    $remark = $_POST['remark'];

    $sql = "INSERT INTO `clients`(email, firstname, lastname, date_time, phone, projectname, remarks, superuser_id) VALUES ('$email', '$firstname', '$lastname', '$dt', '$phone', '$projectname', '$remark', '$id')";
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






}
