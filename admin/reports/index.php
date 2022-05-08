<style>
    .img-thumb-path{
        width:100px;
        height:80px;
        object-fit:scale-down;
        object-position:center center;
    }
</style>
<div class="card card-outline card-primary rounded-0 shadow">
	<div class="card-header">
		<h3 class="card-title">Reports</h3>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-hover table-striped">
				<colgroup>
					<col width="5%">
					<col width="15">
					<col width="20%">
					<col width="20%">
					<col width="10%">
					<col width="20%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr class="bg-gradient-dark text-light">
						<th>#</th>
						<th>Student Id</th>
						<th>Full Name</th>
						<th>Contact</th>
						<th>DOB</th>
                        <th>Course</th>
						<th>Date Created</th>
                        <th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as fullname FROM `student_list` st JOIN `subscription_list` s ON st.id = s.student_id JOIN `course_list` c ON s.course_id = c.id ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td class="">STM - <?php echo $row['id'] ?></td>
							<td class=""><?php echo $row['fullname'] ?></td>
							<td class=""><?php echo $row['contact'] ?></td>
							<td class=""><?php echo $row['dob'] ?></td>
                            <td class=""><?php echo $row['name'] ?></td>
							<td class=""><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
							
							<td class="text-center">
								<?php 
									switch ($row['status']){
										case 0:
											echo '<span class="rounded-pill badge badge-danger bg-gradient-danger px-3">Inactive</span>';
											break;
										case 1:
											echo '<span class="rounded-pill badge badge-success bg-gradient-success px-3">Active</span>';
											break;
									}
								?>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.table td, .table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable({
            columnDefs: [
                { orderable: false, targets: 5 }
            ],
        });
	})
	function delete_student($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Main.php?f=delete_student",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>