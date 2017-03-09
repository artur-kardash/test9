<?php
class Model_Manager extends Model {

public function allusers()
	{
		$id = $_COOKIE['user_id'];
		$sql = "SELECT * FROM `clients`";
		$sql .= "WHERE manager_id='$id'";
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

	public function addnewcli()
  	{
	    $id = $_COOKIE['user_id'];
	    $firstname = $_POST['firstname'];
	    $lastname = $_POST['lastname'];
	    $email = $_POST['email'];
	    $projectname = $_POST['projectname'];
	    $dt = $_POST['d&t'];
	    $phone = $_POST['phone'];
	    $remark = $_POST['remarks'];
	    
	    $sql_query = "INSERT INTO `clients`(firstname, lastname, date_time, phone, manager_id, email, projectname, remarks) VALUES ('$firstname', '$lastname', '$dt', '$phone', '$id', '$email', '$projectname', '$remark')";
	 
	    $con  = $this->db();
	    $result = $con->query($sql_query);
	    if($result){
	      return 'Success';
	    }else{
	      return 'Error';
	    }
	}

	public function delete()
  	{
	    $id = $_GET['id'];
	    $que = "DELETE FROM `clients`";
	    $que .= "WHERE id='$id'";
	    $con = $this->db();
	    $results = $con->query($que);

	    if($results){
	        return "Success";
	    }else{
	        return "Error db";
	    }
  	}

  	public function review()
	{
	  $id = $_GET['id'];
	  $sql = "SELECT * FROM `clients`";
	  $sql .= "WHERE id='$id'";
	  $con = $this->db();
	  $results = $con->query($sql);
	  $res = $results->fetch_assoc();
	   
	  return $res;
	}

	public function updateprofil()
	{
	    $firstname = $_POST['firstname'];
	    $lastname = $_POST['lastname'];
	    $dob = $_POST['d&t'];
	    $phone = $_POST['phone'];
	    $id = $_POST['id_sus'];
	    $email = $_POST['email'];
	    $remarks = $_POST['remarks'];

	    $query = "UPDATE `clients`";
	    $query .= "SET firstname='$firstname', lastname='$lastname', date_time='$dob', phone='$phone', email='$email', remarks='$remarks'";
	    $query .= "WHERE id='$id'";
	   
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

  	public function ressync()
  	{
    $district = trim($_POST['district']);
    $type = trim($_POST['type']);
    $size = trim($_POST['size']);
    $price = trim($_POST['price']);
    $tenure = trim($_POST['tenure']);

    $sql = "SELECT * FROM `listing`";
    $sql .= " WHERE district LIKE '%$district%' AND type LIKE '%$type%' AND size LIKE '%$size%' AND price LIKE '%$price%' AND tenure LIKE '%$tenure%'";
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






}