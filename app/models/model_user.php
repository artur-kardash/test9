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





}