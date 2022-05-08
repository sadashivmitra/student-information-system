<?php
require_once('../../config.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `subscription` JOIN `student_list` JOIN `course_list` ON subscription.student_id = student_list.id AND subscription.course_id = course_list.id where id = '{$_GET['id']}'");
    if($qry){
        if($qry->num_rows > 0){
            $res = $qry->fetch_array();
            foreach($res as $k => $v){
                if(!is_numeric($k))
                $$k = $v;
            }
        }
    }
    
}
?>
<style>
	img#cimg{
		height: 17vh;
		width: 25vw;
		object-fit: scale-down;
	}
</style>
<div class="container-fluid">
    <form action="" id="subscription-form">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="form-group">
            <label for="course_id" class="control-label">Course</label>
            <select name="course_id" id="course_id" class="form-control form-control-sm form-control-border" required>
            <?php 
                $courses = $conn->query("SELECT * FROM `course_list` where delete_flag = 0 and `status` = 1 ".(isset($course_id)? " or id = '{$course_id}'" : "")." order by `name` asc");
                while($row = $courses->fetch_assoc()):
                ?>


             <?php 
                // $departments = $conn->query("SELECT * FROM `department_list` where delete_flag = 0 and `status` = 1 ".(isset($deartment_id)? " or id = '{$department_id}'" : "")." order by `name` asc");
                // while($row = $departments->fetch_assoc()):
                ?>
               
                    <option value="<?= $row['id'] ?>" <?= isset($course_id) && $course_id == $row['id'] ? 'selected' : '' ?>> <?= $row['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="student_id" class="control-label">Select Student</label>
            <select name="student_id" id="student_id" class="form-control form-control-sm form-control-border" required>
                <option value="" disabled <?= !isset($student_id) ? "selected" : "" ?>></option>
                <?php 
                $students = $conn->query("SELECT * FROM `student_list` ".(isset($student_id)? " or id = '{$student_id}'" : "")." order by `firstname` asc");
                while($row = $students->fetch_assoc()):
                ?>
                    <option value="<?= $row['id'] ?>" <?= isset($student_id) && $student_id == $row['id'] ? 'selected' : '' ?>><?= $row['firstname'] .' '.$row['lastname'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="status" class="control-label">Status</label>
            <select name="status" id="status" class="form-control form-control-sm form-control-border" required>
                <option value="1" <?= isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
                <option value="0" <?= isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
            </select>
        </div>
    </form>
</div>
<script>
    $(function(){
        // $('#uni_modal').on('shown.bs.modal',function(){
        //     $('#department_id').select2({
        //         placeholder:'Please Select Here',
        //         width:'100%',
        //         dropdownParent:$('#uni_modal')
        //     })
        // })
        $('#uni_modal #subscription-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.pop-msg').remove()
            var el = $('<div>')
                el.addClass("pop-msg alert")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Main.php?f=save_subscription",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
                success:function(resp){
                    if(resp.status == 'success'){
                        location.reload();
                    }else if(!!resp.msg){
                        el.addClass("alert-danger")
                        el.text(resp.msg)
                        _this.prepend(el)
                    }else{
                        el.addClass("alert-danger")
                        el.text("An error occurred due to unknown reason.")
                        _this.prepend(el)
                    }
                    el.show('slow')
                    $('html,body,.modal').animate({scrollTop:0},'fast')
                    end_loader();
                }
            })
        })
    })
</script>