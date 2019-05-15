<?php

if(!isset($_SESSION)) { session_start(); }


class DB{
	// Database configuration
	private $dbHost     = "localhost";
	private $dbUsername = "u333976797_lpix";
	private $dbPassword = "H4PFxLkHfnqT2ygHrH";
	private $dbName     = "u333976797_jovia";
	private $imgTbl     = 'design_images';

	function __construct(){
		if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
	}

	/*
	 * Get rows from images table
	 */
	function getRows(){
		$designid=$_SESSION['designid'];
		$query = $this->db->query("SELECT * FROM ".$this->imgTbl." where designid=".$designid." and img_order NOT IN (0,100) ORDER BY img_order ASC");
		if($query->num_rows > 0){
			while($row = $query->fetch_assoc()){
				$result[] = $row;
			}
		}else{
			$result = FALSE;
		}
		return $result;
	}

	/*
	 * Update image order
	 */
	function updateOrder($id_array){
		$count = 1;
		foreach ($id_array as $id){
			$update = $this->db->query("UPDATE ".$this->imgTbl." SET img_order = $count, modified = NOW() WHERE id = $id");
			$count ++;
		}
		return TRUE;
	}
}
