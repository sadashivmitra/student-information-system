<h1></h1>
<hr class="border-purple">
<div class="row">
<div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-user-friends"></i></span>

            <div class="info-box-content">
            <span class="info-box-text"><a href="<?php echo base_url ?>admin/?page=students">Students</a></span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `student_list`")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-scroll"></i></span>

            <div class="info-box-content">
            <span class="info-box-text"><a href="<?php echo base_url ?>admin/?page=courses"> Courses</a></span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `course_list` where delete_flag= 0 and `status` = 1 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-building"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="<?php echo base_url ?>admin/?page=subscriptions"> Subscription</a></span>
                <span class="info-box-number text-right">
                        <?php 
                            echo $conn->query("SELECT * FROM `subscription_list` where  `status` = 1 ")->num_rows;
                        ?>
                    </span>
                    
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-file-alt"></i></span>

            <div class="info-box-content">
            <span class="info-box-text"><a href="<?php echo base_url ?>admin/?page=reports">Reports</a></span>
            <span class="info-box-number text-right">
                <?php 
                    // echo $conn->query("SELECT * FROM `academic_history`")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
