<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/config.db.php');

	class Database
	{
		public $data = array();
		public $result = Null;

		function Database(){
			mysql_connect(DB_HOST, DB_USER, DB_PASS);
			mysql_select_db(DB_NAME);
		}
		
		function insert($name, $usn, $branch){
			if(mysql_query("INSERT INTO student values(0,'$name','$usn','$branch')"))
				return true;
			else
				return false;
		}
		
		function edit($id){
			$row = array();
			if($result = mysql_query("SELECT Name, USN, Branch FROM student where id = $id")){
				$i = 0;
				while($data = mysql_fetch_row($result))
				{
					$row[$i] = $data; 
					$i++;
				}
				return $row;
			}
			else
				return false;
		}
		
		function update($id, $name, $usn, $branch){
			if($result = mysql_query("UPDATE student SET Name = '$name', USN='$usn', Branch='$branch' where id = $id"))
				return true;
			else
				return false;
		}
		
		function delete($id){
			$query = 'DELETE FROM student where id ='.$id;
			if(mysql_query($query))
				return true;
			else
				return false;
		}
		
		function fetchAll(){
			$row = array();
			$query = 'SELECT * FROM student';
				
			$result = mysql_query($query);
			
			$i= 0;
			while($data = mysql_fetch_array($result))
			{
				$row[$i] = $data; 
				$i++;
			}
			return $row;
		}
		
		function search($name){
			$row = array();
				
			$result = mysql_query("SELECT * FROM student WHERE name = '$name' ");
			
			$i= 0;

			while($data = mysql_fetch_row($result))
			{
				$row[$i] = $data; 
				$i++;
			}
			return $row;
		}
	}
?>