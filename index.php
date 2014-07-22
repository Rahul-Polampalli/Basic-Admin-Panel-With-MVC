<!DOCTYPE html>
<html>
	<head>
		<title>Student Admin Panel </title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/admin.js"></script>
	</head>
	<body>
		<?php
			require_once('/classes/Database.class.php');
			
			$db = new Database();
			$result = $db -> fetchAll();
		?>
		<div class="rowC col-xs-12">
			<h3>Administration > Student</h3><hr>
		</div>
		<input type="hidden" id="updateId"/>
		<div class="rowC">
			<div class="col-xs-4">
				<div class="col-xs-6" style="padding-left:0px;">
					<input type="text" class="form-control" id="search" style="height:24px;"/>
				</div>
				<button class="btn btn-xs btn-primary" id="searchBtn">
					<i class="glyphicon glyphicon-search"></i> Search
				</button>
			</div>
			<div class="col-xs-7" style="padding-right:0px;">
				<button class="btn btn-xs btn-primary pull-right" id="Add">
					<i class="glyphicon glyphicon-plus"></i>Add
				</button>
			</div>
		</div>
		<div class="rowC col-xs-12"><br>
			<div class="table-responsive">
				<table class="table table-striped table-condensed table-bordered dataTable">
					<thead>
						<tr>
							<th>Name</th>
							<th>USN</th>
							<th>Branch</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($result as $row){
								echo '<tr id='.$row['id'].'>
										<td>'.$row['Name'].'</td>
										<td>'.$row['USN'].'</td>
										<td>'.$row['Branch'].'</td>
										<td>
											<button class="btn btn-xs btn-danger Delete">
												<i class="glyphicon glyphicon-trash"></i>
											</button>
											<button class="btn btn-xs btn-primary Edit">
												<i class="glyphicon glyphicon-pencil"></i>
											</button>
										</td>
									</tr>';			
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
<!--Add Modal-->
<div class="modal fade" id="addModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Student</h4>
      </div>
	   <div class="modal-body">
	   <div class="alert alert-danger error" style="display:none;"></div>
        <div class="rowC col-md-offset-2">
			<form role="form" class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-2">Name</label>
					<div class="col-xs-6">
						<input type="text" class="form-control" id="name"/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2">Usn</label>
					<div class="col-xs-6">
						<input type="text" class="form-control" id="usn"/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2">Branch</label>
					<div class="col-xs-6">
						<input type="text" class="form-control" id="branch"/>
					</div>
				</div>
			</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addBtn">Add</button>
      </div>
  </div>
</div>
