<?php
	require_once('/classes/Database.class.php');
	
	$db = new Database();
	
	$arr = array();
	$type = $_GET['type'];
	
	if($type == 'insert'){
		$name = $_GET['name'];
		$usn = $_GET['usn'];
		$branch = $_GET['branch'];
		
		if($db -> insert($name, $usn, $branch))
			$arr['status'] = 'success';
		else
			$arr['status'] = 'faliure';
			
		echo json_encode($arr);
	}
	
	if($type == 'edit'){
		$id = $_GET['id'];
		if($result = $db -> edit($id)){
			$arr['data'] = $result;
			$arr['status'] = 'success';
		}
		else
			$arr['status'] = 'failure';
			
		echo json_encode($arr);
	}
	
	if($type == 'update'){
		$id = $_GET['id'];
		$name = $_GET['name'];
		$usn = $_GET['usn'];
		$branch = $_GET['branch'];
		
		if($db -> update($id, $name, $usn, $branch))
			$arr['status'] = 'success';
		else
			$arr['status'] = 'faliure';
			
		echo json_encode($arr);
	}
	
	if($type == 'delete'){
		$id = $_GET['id'];
		
		if($db -> delete($id))
			$arr['status'] = 'success';
		else
			$arr['status'] = 'failure';
			
		echo json_encode($arr);
	}
	
	if($type == 'search'){
		$search = $_GET['searchAttr'];
		
		if($result = $db -> search($search)){
			$data = '';
			foreach($result as $row){
				$data.='<tr id='.$row[0][0].'>
							<td>'.$row[1].'</td>
							<td>'.$row[2].'</td>
							<td>'.$row[3].'</td>
							<td>
								<button class="btn btn-xs btn-danger Delete">
									<i class="glyphicon glyphicon-trash"></i>
								</button>
								<button class="btn btn-xs btn-primary Edit">
									<i class="glyphicon glyphicon-pencil"></i>
								</button>
							</td>';
			}
			$data .= '</tr>';
			
			$arr['data'] = $data;
			$arr['status'] = 'success';
		}
		else
			$arr['status'] = 'failure';
			
		echo json_encode($arr);
	}
?>