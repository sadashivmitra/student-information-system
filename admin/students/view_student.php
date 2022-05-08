<?php
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT *, CONCAT(firstname,' ', lastname) as fullname FROM `student_list` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<div class="content py-4">
    <div class="card card-outline card-navy shadow rounded-0">
        <div class="card-header">
            <h5 class="card-title">Student Details</h5>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary btn-flat" href="./?page=students/manage_student&id=<?= isset($id) ? $id : '' ?>"><i class="fa fa-edit"></i> Edit</a>
                <button class="btn btn-sm btn-danger btn-flat" id="delete_student"><i class="fa fa-trash"></i> Delete</button>
                <button class="btn btn-sm btn-info bg-info btn-flat" type="button" id="update_status">Updated Status</button>
                <a href="./?page=students" class="btn btn-default border btn-sm btn-flat"><i class="fa fa-angle-left"></i> Back to List</a>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label text-muted">Student Id</label>
                            <div class="pl-4">STM - <?= isset($id) ? $id : 'N/A' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label text-muted">Status</label>
                            <div class="pl-4">
                                <?php 
                                    switch ($status){
                                        case 0:
                                            echo '<span class="rounded-pill badge badge-secondary bg-gradient-secondary px-3">Inactive</span>';
                                            break;
                                        case 1:
                                            echo '<span class="rounded-pill badge badge-primary bg-gradient-primary px-3">Active</span>';
                                            break;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <fieldset class="border-bottom">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label text-muted">Name</label>
                                <div class="pl-4"><?= isset($fullname) ? $fullname : 'N/A' ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label text-muted">Date of Birth</label>
                                <div class="pl-4"><?= isset($dob) ? date("M d, Y",strtotime($dob)) : 'N/A' ?></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label text-muted">Contact #</label>
                                <div class="pl-4"><?= isset($contact) ? $contact : 'N/A' ?></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="text-muted">Subscription History</legend>
                    <table class="table table-stripped table-bordered" id="subscription-history">
                        <colgroup>
                            <col width="5%">
                            <col width="35%">
                            <col width="30%">
                            <col width="30%">
                        </colgroup>
                        <thead>
                            <tr class="bg-gradient-dark">
                                <th class="py-1 text-center">#</th>
                                <th class="py-1 text-center">Course Name</th>
                                <th class="py-1 text-center">Joining Date</th>
                                <th class="py-1 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i= 1;
                            $subscriptions = $conn->query("SELECT * FROM `subscription_list` s inner join course_list c on s.course_id = c.id inner join student_list st on s.student_id = st.id where student_id = '{$id}' order by  st.firstname asc");
                            while($row = $subscriptions->fetch_assoc()):
                            ?>
                            <tr>
                                <td class="px-2 py-1 align-middle text-center"><?= $i++; ?></td>
                                <td class="px-2 py-1 align-middle"><?= $row['name'] ?></td>
                                <td class="px-2 py-1 align-middle"><?= $row['date_created'] ?></td>
                                
                                <td class="px-2 py-1 align-middle text-center">
                                    <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            Action
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item edit_subscription" href="javascript:void(0)" data-id ="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item delete_subscription" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<noscript id="print-header">
    <div class="row">
        <div class="col-2 d-flex justify-content-center align-items-center">
            <img src="<?= validate_image($_settings->info('logo')) ?>" class="img-circle" id="sys_logo" alt="System Logo">
        </div>
        <div class="col-8">
            <h4 class="text-center"><b><?= $_settings->info('name') ?></b></h4>
            <h3 class="text-center"><b>Student Records</b></h3>
        </div>
        <div class="col-2"></div>
    </div>
</noscript>
<script>
    $(function() {
        $('#update_status').click(function(){
            uni_modal("Update Status of <b><?= isset($roll) ? $roll : "" ?></b>","students/update_status.php?student_id=<?= isset($id) ? $id : "" ?>")
        })
        $('#add_subscription').click(function(){
            uni_modal("Add Subscription Record for <b><?= isset($roll) ? $roll.' - '.$fullname : "" ?></b>","students/manage_subscription.php?student_id=<?= isset($id) ? $id : "" ?>",'mid-large')
        })
        $('.edit_subscription').click(function(){
            uni_modal("Edit Subscription Record of <b><?= isset($id) ? $id.' - '.$fullname : "" ?></b>","students/manage_subscription.php?student_id=<?= isset($id) ? $id : "" ?>&id="+$(this).attr('data-id'),'mid-large')
        })
        $('.delete_subscription').click(function(){
			_conf("Are you sure to delete this Student's Subscription Record?","delete_subscription",[$(this).attr('data-id')])
		})
        $('#delete_student').click(function(){
			_conf("Are you sure to delete this Student Information?","delete_student",['<?= isset($id) ? $id : '' ?>'])
		})
        $('.view_data').click(function(){
			uni_modal("Report Details","students/view_report.php?id="+$(this).attr('data-id'),"mid-large")
		})
        $('.table td, .table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable({
            columnDefs: [
                { orderable: false, targets: 5 }
            ],
        });
        
    })
    function delete_subscription($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Main.php?f=delete_subscription",
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
					location.href="./?page=students";
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>
