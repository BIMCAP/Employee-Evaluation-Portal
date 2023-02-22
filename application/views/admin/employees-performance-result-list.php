<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"><a href="<?php echo base_url('Admin'); ?>"><i class="bx bx-left-arrow-alt"></i> Dashboard</a> / Performance Page /</span> Employee Performance Result</h4>
        
        <span class="emp-list-addbtn">
            <a href="<?php echo base_url('Admin/addEmployeesPerformance'); ?>" class="btn btn-outline-primary"><i class='bx bx-plus'></i> Performance</a>
        </span>
    
        <section class="color_indicators_sec">
            <span>
                <img src="<?php echo base_url('assets_admin/icons/danger.png'); ?>" alt=""> &nbsp;<b>ASSESSMENT < 2</b> &nbsp;&nbsp;
                <img src="<?php echo base_url('assets_admin/icons/warning.png'); ?>" alt=""> &nbsp;<b>ASSESSMENT > 2 and < 3</b> &nbsp;&nbsp;
                <img src="<?php echo base_url('assets_admin/icons/success.png'); ?>" alt=""> &nbsp;<b>ASSESSMENT > 3</b> &nbsp;&nbsp;
             </span>
        </section>


        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                <thead class="table-light">
                    <tr>
                    <th>Employee</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Average</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php if($rerformancedata): ?>
                        <?php foreach( $rerformancedata as $data ): ?>

                            <?php 
                                $sumTotal = $data->communication_emp_avg + $data->p_adaptability_emp_avg + $data->p_creativity_problem_solving_emp_avg + $data->dependability_emp_avg + $data->p_initiative_proactive_emp_avg + $data->knowledge_emp_avg + $data->productivity_emp_avg + $data->quality_emp_avg + $data->software_emp_avg + $data->time_management_emp_avg; 
                                $avgTotal = $sumTotal / 10;
                                $finalAvg = number_format((float)$avgTotal, 2, '.', '');
                            ?>
                            
                            <?php if($finalAvg <= 2): ?>
                                <tr class="emp_improved">
                            <?php else: ?>
                                <tr class="emp_normal">
                            <?php endif; ?>
                            
                                <td>
                                    <div class="avatar3">
                                        <img src="<?php echo base_url($data->employee_image); ?>" alt="<?php echo $data->employee_first_name; ?>" class="w-px-40 h-auto rounded-circle">&nbsp;
                                        <strong><a href="<?php echo base_url('Admin/showEmployeeInfo/'.$data->main_employee_id); ?>"><?php echo $data->employee_first_name; ?> <?php echo $data->employee_last_name; ?>  <i class='bx bx-link' ></i></a></strong>
                                    </div>
                                </td>
                                <td><?php echo $data->department_name; ?></td>
                                <td><?php echo $data->employee_designation; ?></td>

                                <td><?php echo $data->emp_performance_start_date; ?></td>
                                <td><?php echo $data->emp_performance_end_date; ?></td>

                                <?php 
                                    $sumTotal = $data->communication_emp_avg + $data->p_adaptability_emp_avg + $data->p_creativity_problem_solving_emp_avg + $data->dependability_emp_avg + $data->p_initiative_proactive_emp_avg + $data->knowledge_emp_avg + $data->productivity_emp_avg + $data->quality_emp_avg + $data->software_emp_avg + $data->time_management_emp_avg; 
                                    $avgTotal = $sumTotal / 10;
                                    $finalAvg = number_format((float)$avgTotal, 2, '.', '');
                                ?>

                                <?php if($finalAvg <= 1): ?>
                                    <td class="set_td_size set_bg_result_dr"><?php echo $finalAvg; ?></td>
                                <?php elseif($finalAvg > 1 && $finalAvg <= 2): ?>

                                    <td class="set_bg_result_r"><?php echo $finalAvg; ?></td>
                                <?php elseif($finalAvg > 2 && $finalAvg < 3): ?>
                                    <td class="set_td_size set_bg_result_w bg-warning"><?php echo $finalAvg; ?></td>

                                <?php elseif($finalAvg >=3 && $finalAvg <=4): ?>
                                    <td class="set_td_size set_bg_result_g"><?php echo $finalAvg; ?></td>

                                <?php elseif($finalAvg <= 5): ?>
                                    <td class="set_td_size set_bg_result_g"><?php echo $finalAvg; ?></td>
                                <?php else: ?>
                                    <td class="set_td_size set_bg_result_g"><?php echo $finalAvg; ?></td>
                                <?php endif; ?>

                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <?php endif; ?>

                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?php if($rerformancedata): ?>
<?php foreach( $rerformancedata as $data ): ?>
    <div class="modal fade" id="<?php echo 'empComment_Communication'.$data->emp_performance_id; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                    <div class="model_comment_text">
                        <p><?php echo $data->communication_comments; ?></p>
                    </div>
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>


<?php if($rerformancedata): ?>
<?php foreach( $rerformancedata as $data ): ?>
    <div class="modal fade" id="<?php echo 'empComment_Performance'.$data->emp_performance_id; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                    <div class="model_comment_text">
                        <p><?php echo $data->performance_comments; ?></p>
                    </div>
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>


<?php if($rerformancedata): ?>
<?php foreach( $rerformancedata as $data ): ?>
    <div class="modal fade" id="<?php echo 'empComment_Quality'.$data->emp_performance_id; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                    <div class="model_comment_text">
                        <p><?php echo $data->quality_comments; ?></p>
                    </div>
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>