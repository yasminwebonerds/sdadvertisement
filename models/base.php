<?php

 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);

class Base{

	public $conn; 

	function __construct(){

		if($_SERVER['HTTP_HOST']==='localhost')
		{
			$this->conn = new PDO("mysql:host=localhost;dbname=sdadvertisements_db",'root','password');
		}
		

	}


	public function findAll($conditions = array(),$options=array())
	{
		try{

			if(isset($options['limit']))
			{
				$limit = " limit ".$options['limit'];
			}
			else
			{
				$limit = "" ; 
			}

			if(isset($options['offset']))
			{
				$offset = " offset ".$options['offset'];
			}
			else
			{
				$offset = "" ; 
			}

			$where = "" ; 
			if(empty($conditions))
			{
				$where = "" ; 
			}
			else
			{

				$where = " WHERE "; 
				foreach($conditions as $key=>$val)
				{
					$where.=" $key $val[0] '$val[1]' AND";

				}

				$where = rtrim($where,' AND'); 

			}
				$statement =  $this->conn->prepare("select * from {$this->tableName()} $where  $limit $offset");
				$statement->execute(); 
	    		$result = $statement->setFetchMode(PDO::FETCH_ASSOC); 
				return $statement->fetchAll(); 
			
		}catch(PDOException $e)
		{
			print_r($e); 
		}
	}

	public function findByPk($id)
	{
		try{
				$statement =  $this->conn->prepare("SELECT * FROM {$this->tableName()} WHERE {$this->primary}={$id}");				

				$statement->execute();

	    		$result = $statement->setFetchMode(PDO::FETCH_ASSOC); 
				
				return $statement->fetch(); 
			
		}catch(PDOException $e)
		{
			print_r($e); 
		}
	}

	public function deleteByPk($id)
	{
		try{

				$statement =  $this->conn->prepare("DELETE FROM {$this->tableName()} WHERE {$this->primary}={$id}");

					return $statement->execute(); 

			
		}catch(PDOException $e)
		{
			print_r($e); 
		}
	}

	public function save()
	{
		try{

			$dbColumns = $this->getAttributes(); 
			$tableName = $this->tableName(); 

			$sql = " INSERT INTO {$tableName} ";
			$columns = "("; 		
			$values = " VALUES ("; 		

			foreach($this as $key=>$val)
			{

				if(in_array($key, $dbColumns))
				{
					$columns.=$key.",";
					$values.=":".$key.",";

				}
			}		


			$columns = rtrim($columns,',').")"; 


			$values = rtrim($values,',').")"; 

	
			$sql.= 	$columns.$values;


			$statement =  $this->conn->prepare($sql);
			

			foreach($this as $key=>$val)
			{
				if(in_array($key, $dbColumns))
				{
					$statement->bindParam(":{$key}",$this->$key);
					
				}
			}	
			return	$statement->execute();

		}catch(PDOException $e)
		{
			print_r($e); 
		}
	}


	public function update()
	{
		try{

			$dbColumns = $this->getAttributes(); 
			$tableName = $this->tableName(); 

			$sql = " UPDATE {$tableName}  SET ";
			$columns = ""; 		
			$values = ""; 		

			foreach($this as $key=>$val)
			{
				if(in_array($key, $dbColumns))
				{
					$columns.=$key."=:".$key." , ";
				
				}
			}		

			$columns = rtrim($columns,' , '); 

			$sql.=$columns. " WHERE {$this->primary}=:id";
		
			$statement =  $this->conn->prepare($sql);
			
			foreach($this as $key=>$val)
			{
				if(in_array($key, $dbColumns))
				{
					$statement->bindParam(":{$key}",$this->$key);
				}
			}	
			
			$statement->bindParam(":id",$_GET['id']);
			

			return	$statement->execute();

		}catch(PDOException $e)
		{
			print_r($e); 
		}
	}

}
