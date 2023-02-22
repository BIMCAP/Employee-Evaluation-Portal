
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="<?php echo base_url('Admin'); ?>"><i class='bx bx-left-arrow-alt'></i> Dashboard</a> / <a href="<?php echo base_url('Admin/employeesList'); ?>"> Employee List</a> /</span> Employee Details</h4>
              <div class="row">
                <div class="col-md-12">

                <?php if($uploaded = $this->session->flashdata('emp_update_success')): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <strong><?php echo $uploaded; ?></strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      <?php elseif($tryAgain = $this->session->flashdata('emp_not_updated')): ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        <strong><?php echo $tryAgain; ?></strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      <?php endif; ?>
                    </div>
                  
                    <?php if($uploaded = $this->session->flashdata('emp_update_score_success')): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <strong><?php echo $uploaded; ?></strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      <?php elseif($tryAgain = $this->session->flashdata('emp_update_score_not')): ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        <strong><?php echo $tryAgain; ?></strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      <?php endif; ?>
                   
                      <?php if($uploaded = $this->session->flashdata('signature_upload_success')): ?>
                      <div class="alert alert-success alert-dismissible" role="alert">
                        <strong><?php echo $uploaded; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <?php elseif($tryAgain = $this->session->flashdata('signature_not_uploaded')): ?>
                          <div class="alert alert-danger alert-dismissible" role="alert">
                          <strong><?php echo $tryAgain; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        <?php endif; ?>
                    
                      <?php if($uploaded = $this->session->flashdata('signature_delete_success')): ?>
                      <div class="alert alert-success alert-dismissible" role="alert">
                        <strong><?php echo $uploaded; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <?php elseif($tryAgain = $this->session->flashdata('signature_not_uploaded')): ?>
                          <div class="alert alert-danger alert-dismissible" role="alert">
                          <strong><?php echo $tryAgain; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        <?php endif; ?>
                </div>
                <div class="col-md-12">
                  <div class="card mb-2">
                    <div class="card-body">
                        <span class="emp_edit_btn">
                            <a data-bs-toggle="modal" data-bs-target="<?php echo '#empEdit'.$empdata->main_employee_id; ?>" href="javascript:void(0);">
                              <i class='bx bx-edit'></i>
                            </a>
                        </span>
                          <div class="d-flex align-items-start align-items-sm-center gap-4">
                          <img
                            src="<?php echo base_url($empdata->employee_image); ?>"
                            alt="user-avatar"
                            class="d-block rounded img-d-emp"
                          /> 
                        <div class="emp_info">
                            <div>
                                <h3><?php echo $empdata->employee_first_name; ?> <?php echo $empdata->employee_last_name; ?></h3>
                            </div>
                            <div id="emp-d-dd">
                                <span><i class='bx bxs-briefcase-alt-2'></i> <?php echo $empdata->department_name; ?></span> / <span><?php echo $empdata->employee_designation; ?></span></span>
                            </div>
                            <?php if($empinfo): ?>
                                <div class="emp-d-avg-btn">
                                  <?php $main_avg = $empinfo->main_emp_avg; ?>
                                  <?php if($main_avg <= 1): ?>
                                    <span class="badge bg-label-danger me-1">Not sufficient <?php echo $main_avg; ?> <i class='bx bx-tachometer' ></i></span>
                                  <?php elseif($main_avg > 1 && $main_avg <= 2): ?>
                                    <span class="badge bg-label-danger me-1">Not sufficient <?php echo $main_avg; ?> <i class='bx bx-tachometer' ></i></span>
                                  <?php elseif($main_avg > 2 && $main_avg < 3): ?>
                                    <span class="badge bg-label-warning me-1">Sufficient <?php echo $main_avg; ?> <i class='bx bx-tachometer' ></i></span>
                                  <?php elseif($main_avg >=3 && $main_avg <=4): ?>
                                    <span class="badge bg-label-success me-1">Good <?php echo $main_avg; ?> <i class='bx bx-tachometer' ></i></span>
                                  <?php elseif($main_avg <= 5): ?>
                                    <span class="badge bg-label-success me-1">Very good <?php echo $main_avg; ?> <i class='bx bx-tachometer' ></i></span>
                                  <?php else: ?>
                                    <span class="badge bg-label-success me-1">Excellent <?php echo $main_avg; ?> <i class='bx bx-tachometer' ></i></span>
                                  <?php endif; ?>

                                  <span class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                      <div class="dropdown-menu" style="">
                                          <a class="dropdown-item" href="<?php echo base_url('Admin/printEmpDetails/'.$empdata->main_employee_id); ?>"><i class='bx bx-printer'></i> Print</a>
                                          <?php if($signature_img!==0): ?>
                                            <div class="signature_img_sec">
                                                <!-- <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="<?php //echo '#updateSignature'.$empdata->main_employee_id; ?>" href="javascript:void(0);"><i class="bx bx-edit"></i> Edit Signature</a> -->
                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="<?php echo '#deleteSignature'.$empdata->main_employee_id; ?>" href="javascript:void(0);"><i class='bx bxs-trash' ></i> Delete Signature</a>
                                            </div>
                                          <?php else: ?>
                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="<?php echo '#addSignature'.$empdata->main_employee_id; ?>" href="javascript:void(0);"><i class='bx bx-pencil'></i> Add Signature</a>
                                          <?php endif; ?>
                                      </div>
                                  </span>
                                </div>
                            <?php else: ?>
                            <?php endif; ?>
                        </div>

                        <div class="emp_info">
                            <?php if($empinfo): ?>
                                <?php if($signature_img!==0): ?>
                                  <div class="signature_img_sec">
                                      <img src="<?php echo base_url($signature_img->p_signature_img); ?>" alt="">
                                  </div>
                                <?php else: ?>
                                <?php endif; ?>
                            <?php else: ?>
                            <?php endif; ?>
                        </div>

                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label"><b>E-mail:</b> </label>
                            <span><?php echo $empdata->employee_email; ?></span>
                           
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label"><b>Phone Number:</b> </label>
                            <span><?php echo $empdata->employee_number; ?></span>                          
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label"><b>Address:</b> </label>
                            <span><?php echo $empdata->employee_address; ?></span>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label"><b>City:</b></label>
                            <span><?php echo $empdata->employee_city; ?></span>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country"><b>Country:</b></label>
                            <span><?php echo $empdata->employee_country; ?></span>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label"><b>Date Of Joining:</b> </label>
                            <span><?php echo $empdata->employee_doj; ?></span>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label"><b>Date Of Termination:</b></label>
                            <span><?php echo $empdata->employee_dot; ?></span>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label"><b>Status:</b> </label>
                          
                                <?php if(($empdata->employee_status)=='1'): ?>
                                    <span class="badge bg-label-success me-1">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-label-danger">Deactivate</span>
                                <?php endif; ?>  
                           
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          


<?php if ($empinfo): ?>
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
              <section class="color_indicators_sec">
                  <span>
                      <img src="<?php echo base_url('assets_admin/icons/danger.png'); ?>" alt=""> &nbsp;<b>ASSESSMENT < 2</b> &nbsp;&nbsp;
                      <img src="<?php echo base_url('assets_admin/icons/warning.png'); ?>" alt=""> &nbsp;<b>ASSESSMENT > 2 and < 3</b> &nbsp;&nbsp;
                      <img src="<?php echo base_url('assets_admin/icons/success.png'); ?>" alt=""> &nbsp;<b>ASSESSMENT > 3</b> &nbsp;&nbsp;
                  </span>
              </section>
                <h6 class="text-muted">
                  Employee Performance
                  <a class="" data-bs-toggle="modal" data-bs-target="<?php echo '#empScoreEdit'.$empdata->main_employee_id; ?>" href="javascript:void(0);">
                      <i class='bx bx-edit me-1' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Click and edit</span>"></i>
                  </a>
                </h6>
            
                   <div class="nav-align-top mb-2">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-communication" aria-controls="navs-justified-communication" aria-selected="true">
                          Communication
                        </button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-productivity" aria-controls="navs-justified-productivity" aria-selected="false">
                          Productivity
                        </button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-quality" aria-controls="navs-justified-quality" aria-selected="false">
                          Quality
                        </button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-knowledge" aria-controls="navs-justified-knowledge" aria-selected="false">
                          Knowledge of Job
                        </button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-software" aria-controls="navs-justified-software" aria-selected="false">
                          Knowledge of Software

                        </button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-reliability-dependability" aria-controls="navs-justified-reliability-dependability" aria-selected="false">
                          Reliability & Dependability

                        </button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-time-management" aria-controls="navs-justified-time-management" aria-selected="false">
                          Time Management

                        </button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-adaptability" aria-controls="navs-justified-adaptability" aria-selected="false">
                          Adaptability

                        </button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-initiative-proactive" aria-controls="navs-justified-initiative-proactive" aria-selected="false">

                        Initiative & Proactive

                        </button>
                        </li>


                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-creativity-problem-solving" aria-controls="navs-justified-creativity-problem-solving" aria-selected="false">

                        Creativity & Problem Solving

                        </button>
                        </li>

                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="navs-justified-communication" role="tabpanel">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>INDICATOR</th>
                                        <th>ASSESSMENT
                                            <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"></i>
                                            (Out of 5)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr class="remove_bb">
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Good</span>">3</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Very good</span>">4</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Excellent</span>">5</span>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>1. Proactively asking clarification questions</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->communication_proactively_asking==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>2. Responds to messages/calls within a given time frame</p>
                                        </td>
                                        <td>
                                          <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->communication_responds_to_messages==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>3. Proactively informing about delays or issues</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->communication_proactively_informing==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>4. Level of English in project related communication</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->communication_level_of_english==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>5. Communicates well with the team/client</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->communication_team_client==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>6. Informs the supervisor about leave plans</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->communication_Informs_the_supervisor==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p><strong>Average <i class='bx bx-calculator'></i></strong></p>
                                        </td>
                                        <td>

                                        <?php  $comm_avg= $empinfo->communication_emp_avg; ?>

                                        <?php if($comm_avg <= 1): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 1 && $comm_avg <= 2): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 2 && $comm_avg < 3): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-warning">Sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg >=3 && $comm_avg <=4): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Good <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg <= 5): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Very good <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php else: ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Excellent <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php endif; ?>
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Comments
                                                <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>">
                                                </i>
                                            </h4>
                                            <textarea class="form-control" cols="3" rows="3" disabled><?php echo $empinfo->communication_comments; ?></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="navs-justified-productivity" role="tabpanel">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>INDICATOR</th>
                                        <th>ASSESSMENT
                                            <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"></i>
                                            (Out of 5)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr class="remove_bb">
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Good</span>">3</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Very good</span>">4</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Excellent</span>">5</span>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>1. Speed of modelling</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->productivity_speed_of_modelling==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>2. Absence or minimum redundant work</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->productivity_absence_or_minimum==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>3. Complies with the set timelines and deadlines</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->productivity_timelines_and_deadlines==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p><strong>Average <i class='bx bx-calculator'></i></strong></p>
                                        </td>
                                        <td>

                                        <?php  $comm_avg= $empinfo->productivity_emp_avg; ?>

                                        <?php if($comm_avg <= 1): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 1 && $comm_avg <= 2): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 2 && $comm_avg < 3): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-warning">Sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg >=3 && $comm_avg <=4): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Good <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg <= 5): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Very good <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php else: ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Excellent <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php endif; ?>
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Comments
                                                <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>">
                                                </i>
                                            </h4>
                                            <textarea class="form-control" name="productivity_comments" cols="3" rows="3" placeholder="Please Enter Comments" disabled><?php echo $empinfo->productivity_comments; ?></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="navs-justified-quality" role="tabpanel">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>INDICATOR</th>
                                        <th>ASSESSMENT
                                            <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"></i>
                                            (Out of 5)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr class="remove_bb">
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Good</span>">3</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Very good</span>">4</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Excellent</span>">5</span>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>1. Attention to details</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->quality_attention_to_details==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>2. Incur minimum volume of mistakes requiring correction</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->quality_mistakes_requiring_correction==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>3. Meets the expectations for the quality of drawings and models</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->quality_meets_the_expectations==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>4. Conducts QA/QC on drawing and model outputs</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->quality_conducts_qa_qc==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>5. Follows the correct workflow set for modelling and drawings</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->quality_follows_the_correct_workflow_set==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p><strong>Average <i class='bx bx-calculator'></i></strong></p>
                                        </td>
                                        <td>

                                        <?php  $comm_avg= $empinfo->quality_emp_avg; ?>

                                        <?php if($comm_avg <= 1): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 1 && $comm_avg <= 2): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 2 && $comm_avg < 3): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-warning">Sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg >=3 && $comm_avg <=4): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Good <?php echo $comm_avg; ?><i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg <= 5): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Very good <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php else: ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Excellent <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php endif; ?>
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Comments
                                                <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>">
                                                </i>
                                            </h4>
                                            <textarea class="form-control" name="quality_comments" id="" cols="3" rows="3" disabled><?php echo $empinfo->quality_comments; ?></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="navs-justified-knowledge" role="tabpanel">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>INDICATOR</th>
                                        <th>ASSESSMENT
                                            <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"></i>
                                            (Out of 5)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr class="remove_bb">
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Good</span>">3</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Very good</span>">4</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Excellent</span>">5</span>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>1. Understanding of BIM project standards and portfolio</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->knowledge_standards_and_portfolio==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>2. Understanding of BIM project requirements</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->knowledge_bim_project_requirements==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>3. Knowledge of the construction industry including ARC, STR, MEP, and BIM standards</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->knowledge_of_the_construction_industry==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p><strong>Average <i class='bx bx-calculator'></i></strong></p>
                                        </td>
                                        <td>

                                        <?php  $comm_avg= $empinfo->knowledge_emp_avg; ?>

                                        <?php if($comm_avg <= 1): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 1 && $comm_avg <= 2): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 2 && $comm_avg < 3): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-warning">Sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg >=3 && $comm_avg <=4): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Good <?php echo $comm_avg; ?><i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg <= 5): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Very good <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php else: ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Excellent <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php endif; ?>
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Comments
                                                <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>">
                                                </i>
                                            </h4>
                                            <textarea class="form-control" name="knowledge_comments" id="" cols="3" rows="3" disabled><?php echo $empinfo->knowledge_comments; ?></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        <div class="tab-pane fade" id="navs-justified-software" role="tabpanel">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>INDICATOR</th>
                                        <th>ASSESSMENT
                                            <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"></i>
                                            (Out of 5)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">

                                    <tr class="remove_bb">
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Good</span>">3</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Very good</span>">4</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Excellent</span>">5</span>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>1. Follows the correct format for Bitrix tasks and leaves</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->software_bitrix_tasks_and_leaves==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>2. Consider the knowledge of the digital tools necessary to carry out production and communication tasks</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->software_digital_tools_production_communication==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p><strong>Average <i class='bx bx-calculator'></i></strong></p>
                                        </td>
                                        <td>

                                        <?php  $comm_avg= $empinfo->software_emp_avg; ?>

                                        <?php if($comm_avg <= 1): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 1 && $comm_avg <= 2): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 2 && $comm_avg < 3): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-warning">Sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg >=3 && $comm_avg <=4): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Good <?php echo $comm_avg; ?><i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg <= 5): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Very good <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php else: ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Excellent <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php endif; ?>
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Comments
                                                <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>">
                                                </i>
                                            </h4>
                                            <textarea class="form-control" name="software_comments" id="" cols="3" rows="3" disabled><?php echo $empinfo->software_comments; ?></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="navs-justified-reliability-dependability" role="tabpanel">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>INDICATOR</th>
                                        <th>ASSESSMENT
                                            <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"></i>
                                            (Out of 5)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr class="remove_bb">
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Good</span>">3</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Very good</span>">4</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Excellent</span>">5</span>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>1. Ability to handle a team</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->dependability_handle_a_team==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>2. Ability to handle a project</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->dependability_handle_a_project==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>3. Ability to finish the tasks with minimum supervision within the set deadlines</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->dependability_the_set_deadlines==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p><strong>Average <i class='bx bx-calculator'></i></strong></p>
                                        </td>
                                        <td>

                                        <?php  $comm_avg= $empinfo->dependability_emp_avg; ?>

                                        <?php if($comm_avg <= 1): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 1 && $comm_avg <= 2): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 2 && $comm_avg < 3): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-warning">Sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg >=3 && $comm_avg <=4): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Good <?php echo $comm_avg; ?><i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg <= 5): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Very good <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php else: ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Excellent <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php endif; ?>
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Comments
                                                <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>">
                                                </i>
                                            </h4>
                                            <textarea class="form-control" name="dependability_comments" id="" cols="3" rows="3" disabled><?php echo $empinfo->dependability_comments; ?></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="navs-justified-time-management" role="tabpanel">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>INDICATOR</th>
                                        <th>ASSESSMENT
                                            <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"></i>
                                            (Out of 5)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">

                                    <tr class="remove_bb">
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Good</span>">3</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Very good</span>">4</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Excellent</span>">5</span>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>1. Follows the scheduled work shift</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->time_management_scheduled_work_shift==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>2. Meets the required working hours</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->time_management_required_working_hours==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>3. Uses Bitrix24 to keep internal and external deadlinesclearly with your teammates</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->time_management_deadlinesclearly_with_your_teammates==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p><strong>Average <i class='bx bx-calculator'></i></strong></p>
                                        </td>
                                        <td>

                                        <?php  $comm_avg= $empinfo->time_management_emp_avg; ?>

                                        <?php if($comm_avg <= 1): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 1 && $comm_avg <= 2): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 2 && $comm_avg < 3): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-warning">Sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg >=3 && $comm_avg <=4): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Good <?php echo $comm_avg; ?><i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg <= 5): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Very good <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php else: ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Excellent <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php endif; ?>
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Comments
                                                <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>">
                                                </i>
                                            </h4>
                                            <textarea class="form-control" name="time_management_comments" id="" cols="3" rows="3" disabled><?php echo $empinfo->time_management_comments; ?></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="tab-pane fade" id="navs-justified-adaptability" role="tabpanel">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>INDICATOR</th>
                                        <th>ASSESSMENT
                                            <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"></i>
                                            (Out of 5)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">

                                    <tr class="remove_bb">
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Good</span>">3</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Very good</span>">4</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Excellent</span>">5</span>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>1. Ability to learn new project standards in a short amount of time</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->adaptability_short_amount_of_time==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>2. Ability to adjust depending on the project needs</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->adaptability_ability_to_adjust_depending==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>3. Ability to work on multiple projects</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->adaptability_work_on_multiple_projects==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>4. Ability to learn new disciplines, software, and adapt this knowledge to new challenges</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->adaptability_learn_new_disciplines_software==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p><strong>Average <i class='bx bx-calculator'></i></strong></p>
                                        </td>
                                        <td>

                                        <?php  $comm_avg= $empinfo->p_adaptability_emp_avg; ?>

                                        <?php if($comm_avg <= 1): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 1 && $comm_avg <= 2): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 2 && $comm_avg < 3): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-warning">Sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg >=3 && $comm_avg <=4): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Good <?php echo $comm_avg; ?><i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg <= 5): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Very good <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php else: ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Excellent <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php endif; ?>
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Comments
                                                <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>">
                                                </i>
                                            </h4>
                                            <textarea class="form-control" name="adaptability_comments" id="" cols="3" rows="3" disabled><?php echo $empinfo->adaptability_comments; ?></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="tab-pane fade" id="navs-justified-initiative-proactive" role="tabpanel">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>INDICATOR</th>
                                        <th>ASSESSMENT
                                            <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"></i>
                                            (Out of 5)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr class="remove_bb">
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Good</span>">3</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Very good</span>">4</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Excellent</span>">5</span>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>1. Ability to learn new project standards in a short amount of time</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->initiative_proactive_ability_to_learn_new_project==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>2. Ability to adjust depending on the project needs</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->initiative_proactive_adjust_depending_on_the_project==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>3. Ability to work on multiple projects</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->initiative_proactive_work_on_multiple_projects==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>4. Ability to learn new disciplines, software, and adapt this knowledge to new challenges</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->initiative_proactive_learn_new_disciplines_software==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p><strong>Average <i class='bx bx-calculator'></i></strong></p>
                                        </td>
                                        <td>

                                        <?php  $comm_avg= $empinfo->p_initiative_proactive_emp_avg; ?>

                                        <?php if($comm_avg <= 1): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 1 && $comm_avg <= 2): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 2 && $comm_avg < 3): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-warning">Sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg >=3 && $comm_avg <=4): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Good <?php echo $comm_avg; ?><i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg <= 5): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Very good <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php else: ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Excellent <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php endif; ?>
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Comments
                                                <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>">
                                                </i>
                                            </h4>
                                            <textarea class="form-control" name="initiative_proactive_comments" cols="3" rows="3" disabled><?php echo $empinfo->initiative_proactive_comments; ?></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="navs-justified-creativity-problem-solving" role="tabpanel">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>INDICATOR</th>
                                        <th>ASSESSMENT
                                            <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"></i>
                                            (Out of 5)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr class="remove_bb">
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Good</span>">3</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Very good</span>">4</span>

                                            <span class="radio-inline-num" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<span>Excellent</span>">5</span>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>1. Ability to learn new project standards in a short amount of time</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->creativity_problem_solving_learn_new_project==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>2. Ability to adjust depending on the project needs</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->creativity_problem_solving_depending_project_needs==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>3. Ability to work on multiple projects</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->creativity_problem_solving_work_multiple_projects==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>4. Ability to learn new disciplines, software, and adapt this knowledge to new challenges</p>
                                        </td>
                                        <td>
                                            <?php
                                            $x = 1;
                                            while($x <= 5) {
                                              if($empinfo->creativity_problem_solving_knowledge_to_new_challenges==$x){
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' checked disabled /> &nbsp;&nbsp;&nbsp;&nbsp; </label>";
                                              }else{
                                                echo "<label class='radio-inline'> <input type='radio' class='form-check-input' value='$x' disabled /> &nbsp;&nbsp;&nbsp; </label>";
                                              }
                                              $x++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p><strong>Average <i class='bx bx-calculator'></i></strong></p>
                                        </td>
                                        <td>

                                        <?php  $comm_avg= $empinfo->p_creativity_problem_solving_emp_avg; ?>

                                        <?php if($comm_avg <= 1): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 1 && $comm_avg <= 2): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-danger">Not sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg > 2 && $comm_avg < 3): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-warning">Sufficient <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg >=3 && $comm_avg <=4): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Good <?php echo $comm_avg; ?><i class='bx bx-tachometer' ></i></button>
                                        <?php elseif($comm_avg <= 5): ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Very good <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php else: ?>
                                          <button type="button" class="btn-p-avg btn btn-outline-success">Excellent <?php echo $comm_avg; ?> <i class='bx bx-tachometer' ></i></button>
                                        <?php endif; ?>
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Comments
                                                <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>">
                                                </i>
                                            </h4>
                                            <textarea class="form-control" name="creativity_problem_solving_comments" id="" cols="3" rows="3" disabled><?php echo $empinfo->creativity_problem_solving_comments; ?></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
<?php endif ?>
</div>
</div>
</div>




<!-- Edit Employee Details -->

<form action="<?php echo base_url('Admin/editEmpData'); ?>" method="POST" enctype="multipart/form-data">
<div class="card-body">
    <div class="row gy-3">
        <div class="col-lg-4 col-md-6">
            <div class="modal fade" id="<?php echo 'empEdit'.$empdata->main_employee_id; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Update Employee Information?</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                    <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <input type="hidden" name="main_employee_id" value="<?php echo $empdata->main_employee_id; ?>">
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <div class="holder">
                          <img
                            src="<?php echo base_url($empdata->employee_image); ?>"
                            alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="imgPreview"
                            value="<?php echo base_url($empdata->employee_image); ?>"
                          /> 
                        </div>
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                              name="employee_image"
                            />
                            <input type="hidden" name="old_emp_img" value="<?php echo ($empdata->employee_image); ?>">
                          </label>
                          <p class="text-muted mb-0">Allowed JPG, JPEG or PNG. Image Resolution: 225px * 225px. Max size of 800K </p>
                        </div>
                      </div>
                    </div>

                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="employee_first_name"
                              placeholder="John"
                              value="<?php echo $empdata->employee_first_name; ?>"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control" type="text" name="employee_last_name" id="lastName"  value="<?php echo $empdata->employee_last_name; ?>" placeholder="Doe" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail <span>*</span></label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="employee_email"
                              placeholder="john.doe@example.com"
                              value="<?php echo $empdata->employee_email; ?>"
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Phone Number</label>
                            <div class="form-group md-group show-label">
                              <input class="form-control" name="employee_number" type="tel" id="phone" placeholder="e.g. +1 702 123 4567" value="<?php echo $empdata->employee_number; ?>" required data-parsley-trigger="keyup">
                            </div>
                          </div>

                          <div class="mb-3 col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="employee_address" value="<?php echo $empdata->employee_address; ?>" placeholder="Address" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">City</label>
                            <input class="form-control" type="text" id="city" name="employee_city" value="<?php echo $empdata->employee_city; ?>" placeholder="City" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <div class="form-group md-group show-label">
                            <label class="form-label" for="country">Country</label>
                                <select name="employee_country" id="address-country"  class="select2 form-select form-control">
                                  <option value="" selected><?php echo $empdata->employee_country; ?></option>
                                </select>
                              </div>
                              <input type="hidden" name="old_country" value="<?php echo $empdata->employee_country; ?>">
                          </div>
                          <input type="hidden" name="old_department" value="<?php echo $empdata->employee_department; ?>">
                          <input type="hidden" name="old_designation" value="<?php echo $empdata->employee_designation; ?>">

                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">Departments</label>
                            <select id="department_id" name="employee_department" class="select2 form-select">
                              <option selected disabled><?php echo $empdata->department_name; ?></option>
                              <?php if($departments): ?>
                                  <?php foreach($departments as $department): ?>
                                    <option value="<?php echo $department->department_id; ?>"><?php echo $department->department_name; ?></option>
                                  <?php endforeach; ?>
                              <?php endif; ?>
                            </select> 
                            
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">Designation </label>
                            <select id="designation_id" value="<?php echo $empdata->employee_designation; ?>" name="employee_designation" class="select2 form-select">
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">Date Of Joining</label>
                            <input class="form-control" name="employee_doj" type="date" id="html5-date-input" value="<?php echo $empdata->employee_doj; ?>" >
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">Date Of Termination</label>
                            <input class="form-control" type="date" name="employee_dot" id="html5-date-input" value="<?php echo $empdata->employee_dot; ?>">
                          </div>

                        </div>
                    </div>
                  </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</form>

<!-- End Edit Employee Details -->

<!-- Edit Employee Details -->

<form action="<?php echo base_url('Admin/'); ?>" method="POST" enctype="multipart/form-data">
  <div class="card-body">
      <div class="row gy-3">
          <div class="col-lg-4 col-md-6">
              <div class="modal fade" id="<?php echo 'empScoreEdit'.$empdata->main_employee_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="modalCenterTitle">Are you sure you want to update the score?</h5>
                          <button
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                          ></button>
                      </div>
                      <div class="modal-footer footer-flex">
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Close
                          </button>
                          <a href="<?php echo base_url('Admin/showEmployeeScores/'.$empinfo->main_employee_id); ?>"><button type="button" class="btn btn-info">Go To Edit</button></a>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </div>
      </div>
  </div>
</form>

<!-- Start Add Signature -->

<form action="<?php echo base_url('Admin/uploadManagerSignature'); ?>" method="POST" enctype="multipart/form-data">
  <div class="card-body">
      <div class="row gy-3">
          <div class="col-lg-4 col-md-6">
              <div class="modal fade" id="<?php echo 'addSignature'.$empdata->main_employee_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="modalCenterTitle">Please upload you signature!!</h5>
                          <button
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                          ></button>
                      </div>
                      <div class="card-body">
                        <div class="align-items-start align-items-sm-center gap-2">
                          <input type="hidden" name="employee_id" value="<?php echo $empdata->main_employee_id; ?>">
                          <div>
                              <input class="form-control" type="file" name="p_signature_img" id="formFile" required data-parsley-trigger="keyup">
                          </div>
                          <br>
                          <p class="text-muted mb-0">Allowed JPG, JPEG or PNG. Image Resolution: 225px * 225px. Max size of 800K </p>
                        </div>
                      </div>
                      <div class="modal-footer footer-flex">
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Close
                          </button>
                          <button type="submit" class="btn btn-success">Upload Signature</button>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </div>
      </div>
  </div>
</form>

<!-- End Signature -->

<!-- Start Edit Signature -->

<form action="<?php echo base_url('Admin/updateManagerSignature'); ?>" method="POST" enctype="multipart/form-data">
  <div class="card-body">
      <div class="row gy-3">
          <div class="col-lg-4 col-md-6">
              <div class="modal fade" id="<?php echo 'updateSignature'.$empdata->main_employee_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="modalCenterTitle">Update you signature!!</h5>
                          <button
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                          ></button>
                      </div>
                      <div class="card-body">
                        <div class="align-items-start align-items-sm-center gap-2">
                          <input type="hidden" name="employee_id" value="<?php echo $empdata->main_employee_id; ?>">
                          <div>
                              <input class="form-control" type="file" name="p_signature_img" required>
                          </div>
                          <br>
                          <p class="text-muted mb-0">Allowed JPG, JPEG or PNG. Image Resolution: 225px * 225px. Max size of 800K </p>
                        </div>
                      </div>
                      <div class="modal-footer footer-flex">
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Close
                          </button>
                          <button type="submit" class="btn btn-success">Update Signature</button>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </div>
      </div>
  </div>
</form>

<!-- End Edit Signature -->

<!-- Start Delete Signature -->

<form action="<?php echo base_url('Admin/deleteManagerSignature'); ?>" method="POST" enctype="multipart/form-data">
  <div class="card-body">
      <div class="row gy-3">
          <div class="col-lg-4 col-md-6">
              <div class="modal fade" id="<?php echo 'deleteSignature'.$empdata->main_employee_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="modalCenterTitle">Delete Signature?</h5>
                          <button
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                          ></button>
                      </div>
                      <input type="hidden" name="employee_id" value="<?php echo $empdata->main_employee_id; ?>">
                      <div class="modal-footer footer-flex">
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Close
                          </button>
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </div>
      </div>
  </div>
</form>

<!-- End Delete Signature -->