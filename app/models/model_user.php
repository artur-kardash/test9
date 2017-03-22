<?php
class Model_User extends Model {

	public function allusers()
	{
		$id = $_COOKIE['user_id'];
		$sql = "SELECT * FROM `manager`";
		$sql .= "WHERE id_suser='$id'";
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

	public function addnewmanag()
  	{
    
    $id = $_COOKIE['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO `users`(email, password, level) VALUES ('$email', '$password', '3')";
    $con  = $this->db();
    $res = $con->query($sql);
    $last_id = $con->insert_id;
    
    $sql_query = "INSERT INTO `manager`(firstname, lastname, dob, phone, id_suser, user_id) VALUES ('$firstname', '$lastname', '$dob', '$phone', '$id', '$last_id')";
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
	    $query = "DELETE FROM `users`";
	    $query .= "WHERE id='$id'";
	    $con = $this->db();
	    $result = $con->query($query);
	    $que = "DELETE FROM `manager`";
	    $que .= "WHERE user_id='$id'";
	    $con = $this->db();
	    $results = $con->query($que);

	    if($result || $results){
	        return "Success";
	    }else{
	        return "Error db";
	    }
  	}

  	public function review()
	{
	  $id = $_GET['id'];
	  $que = "SELECT `m`.`id` as `id_ag`, `m`.`firstname`, `u`.`id`, `m`.`lastname`, `m`.`dob`, `m`.`phone`, `m`.`user_id`, `u`.`email`, `u`.`password`, `u`.`level` FROM `manager` as `m`";
	  $que .="INNER JOIN `users` as `u`";
	  $que .="ON u.id=m.user_id AND `m`.`user_id`=".$id;
	  $con = $this->db();
	  $results = $con->query($que);
	  $res = $results->fetch_assoc();
	   
	  return $res;
	}

	public function countclent()
	{
	  $id = $_GET['id'];
	  $sql = "SELECT count(*) as lim FROM `clients`";
	  $sql .= "WHERE manager_id=$id";
	  $con = $this->db();
	  $res = $con->query($sql);
	  $count = $res->fetch_assoc();

	  return $count;
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

	public function listing()
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
      if($type == 1){
         $e = "`type` = '1 rm' OR `type` = '1 rm Duplex' OR `type` = '1 rm PES' OR `type` = '1 rm PH' OR `type` = '1+S' OR `type` = '1+S PH' OR";
      }else if($type == 2){
         $e = "`type` = '2 rm' OR type = '2 rm Duplex' OR `type` = '2 rm PES' OR `type` = '2 rm PH' OR `type` = '2+S' OR `type` = '2+S PH' OR `type` = '2DK' OR ";
      }else if($type == 3){
         $e = "`type` = '3 rm' OR `type` = '3 rm Duplex' OR `type` = '3 rm PH' OR `type` = '3+S' OR `type` = '3+S PH' OR `type` = '3DK' OR ";
      }else if($type == 4){
         $e = "`type` = '4 rm' OR `type` = '4 rm Duplex' OR `type` = '4 rm PH' OR `type` = '4+S PH' OR `type` = '4DK' OR ";
      }else if($type == 5){
         $e = "`type` = '5 rm' OR `type` = '5 rm PH' OR";
      }else if($type == 6){
         $e = "`type` = '6 rm PH' OR ";
      }else{
        $e = "`type` = '$type' OR";
      }



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
      $sql = trim($sql);
    $sql = substr($sql, 0, -3);
    }

    if($type != "1rm" && $type != "2rm" && $type != "3rm" && $type != "4rm" && $type != "5rm" && $type != "6rm"){
      $sql = str_replace("OR", "AND", $sql);
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
    $sql .= "WHERE superuser_id='$id'";
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
    $sql = "INSERT INTO `clients`(email, firstname, lastname, date_time, phone, development, investment, superuser_id) VALUES ('$email', '$firstname', '$lastname', '$dt', '$phone', '$development', '$investment', '$id')";
  }

    $con  = $this->db();
    $res = $con->query($sql);
   
    if($res){
      return 'Success';
    }else{
      return 'Error db';
    }
  
}

public function alllisting()
  {
    $sql = "SELECT `district` FROM `listing`";
    $sql .= "GROUP BY `district`";
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

  public function allprojects()
  {
    $sql = "SELECT `project_name` FROM `listing`";
    $sql .= "GROUP BY `project_name`";
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

  public function allloc()
  {
    $sql = "SELECT `location` FROM `listing`";
    $sql .= "GROUP BY `location`";
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

  public function alltypes()
  {
    $sql = "SELECT `type` FROM `listing`";
    $sql .= "GROUP BY `type`";
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

  public function allsizes()
  {
    $sql = "SELECT `size` FROM `listing`";
    $sql .= "GROUP BY `size`";
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

  public function allcom()
  {
    $sql = "SELECT `commission` FROM `listing`";
    $sql .= "GROUP BY `commission`";
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

  public function allcon()
  {
    $sql = "SELECT `contact_person` FROM `listing`";
    $sql .= "GROUP BY `contact_person`";
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
  public function allest()
  {
    $sql = "SELECT `est` FROM `listing`";
    $sql .= "GROUP BY `est`";
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
  public function allusp()
  {
    $sql = "SELECT `usp` FROM `listing`";
    $sql .= "GROUP BY `usp`";
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






}