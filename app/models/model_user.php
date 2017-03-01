<?php
class Model_User extends Model {

	public function allusers()
	{
		$sql = "SELECT * FROM `clients`";
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