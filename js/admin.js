$(document).ready(function(){
	$('#Add').click(function(){
		$('#addModal').modal('show');
	});
	
	$('#addBtn').click(function(){
		var studentName = $('#name').val();
		var studentUsn = $('#usn').val();
		var studentBranch = $('#branch').val();
		var id = $('#updateId').val();
		
		if(studentName == ''){
			$('.error').text('Please Enter Student Name.').show();
			return false;
		}
		
		if(studentUsn == ''){
			$('.error').text('Please Enter Student Usn.').show();
			return false;
		}
		
		if(studentBranch == ''){
			$('.error').text('Please Enter Student Branch.').show();
			return false;
		}
		
		if($(this).text() == 'Add'){//Add operation
			$.ajax({
				url:'process.php'
				,type:'GET'
				,dataType:'json'
				,data:{
					type:'insert'
					,name:studentName
					,usn:studentUsn
					,branch:studentBranch
				}
				,success:function(resp){
					location.reload();
				}
			});
		}
		else//update Operation
		{
			$.ajax({
				url:'process.php'
				,type:'GET'
				,dataType:'json'
				,data:{
					type:'update'
					,id:id
					,name:studentName
					,usn:studentUsn
					,branch:studentBranch
				}
				,success:function(resp){
					location.reload();
				}
			});
		}	
	});
	
	$('.Edit').click(function(){
		var editRowId = $(this).parent().parent().prop('id');
		$('#updateId').val(editRowId);
		$.ajax({
			url:'process.php'
			,type:'GET'
			,dataType:'json'
			,data:{
				type:'edit'
				,id:editRowId
			}
			,success:function(resp){
				if(resp['status'] == 'success'){
					$('#name').val(resp['data'][0][0]);
					$('#usn').val(resp['data'][0][1]);
					$('#branch').val(resp['data'][0][2]);
					$('#addModal > .modal-dialog > .modal-content > .modal-header > .modal-title').text('Update Student');
					$('#addBtn').text('Save')
					$('#addModal').modal('show');
				}
			}
		});
	});
	
	$('.Delete').click(function(){
		var rowId = $(this).parent().parent().prop('id');
		$.ajax({
			url:'process.php'
			,type:'GET'
			,dataType:'json'
			,data:{
				type:'delete'
				,id:rowId
			}
			,success:function(resp){
				$('#'+rowId).remove();
				location.reload();
			}
		});
		
	});
	
	$('#searchBtn').click(function(){
		var search = $('#search').val();
		$.ajax({
			url:'process.php'
			,type:'GET'
			,dataType:'json'
			,data:{
				type:'search'
				,searchAttr:search
			}
			,success:function(resp){
				$('.dataTable').find('tbody').html(resp['data']);
			}
		});
	});
});