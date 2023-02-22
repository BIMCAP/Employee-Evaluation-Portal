<div class="content-wrapper">
            <div class="container-xxl flex-grow-1">
            <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"><a href="<?php echo base_url('Admin/showEmployeeInfo/'.$empinfo->main_employee_id); ?>"><i class="bx bx-left-arrow-alt"></i> Back</a></span></h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                          <div class="d-flex align-items-start align-items-sm-center gap-4">
                          <img
                            src="<?php echo base_url($empdata->employee_image); ?>"
                            alt="user-avatar"
                            class="d-block rounded img-d-emp-print"
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
                                  <?php $main_avg= $empinfo->main_emp_avg; ?>
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
                          <div class="mb-1 col-md-4 col-sm-4 col-sm-4 col-xs-6">
                            <label for="email" class="form-label"><b>E-mail:</b> </label>
                            <span><?php echo $empdata->employee_email; ?></span>
                           
                          </div>
                          <div class="mb-1 col-md-4 col-sm-4 col-xs-6">
                            <label for="organization" class="form-label"><b>Phone Number:</b> </label>
                            <span><?php echo $empdata->employee_number; ?></span>                          
                          </div>
                          <div class="mb-1 col-md-4 col-sm-4 col-xs-6">
                            <label for="address" class="form-label"><b>Address:</b> </label>
                            <span><?php echo $empdata->employee_address; ?></span>
                          </div>
                          <div class="mb-1 col-md-4 col-sm-4 col-xs-6">
                            <label for="state" class="form-label"><b>City:</b></label>
                            <span><?php echo $empdata->employee_city; ?></span>
                          </div>
                          <div class="mb-1 col-md-4 col-sm-4 col-xs-6">
                            <label class="form-label" for="country"><b>Country:</b></label>
                            <span><?php echo $empdata->employee_country; ?></span>
                          </div>
                          <div class="mb-1 col-md-4 col-sm-4 col-xs-6">
                            <label for="designation" class="form-label"><b>Date Of Joining:</b> </label>
                            <span><?php echo $empdata->employee_doj; ?></span>
                          </div>
                          <div class="mb-1 col-md-4 col-sm-4 col-xs-6">
                            <label for="designation" class="form-label"><b>Date Of Termination:</b></label>
                            <span><?php echo $empdata->employee_dot; ?></span>
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
            <div class="col-xl-6">
                   <div class="nav-align-top">
                    <h4>Communication</h4>
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                        <td class="print_head_p" colspan="2">
                                            <h4>Comments:</h4>
                                            <p><?php echo $empinfo->communication_comments; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                   <div class="nav-align-top">
                    <h4 class="print_top_head">Productivity</h4>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-justified-productivity" role="tabpanel">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                      <td class="print_head_p" colspan="2">
                                          <h4>Comments:</h4>
                                          <p><?php echo $empinfo->productivity_comments; ?></p>
                                      </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-xl-6">
                   <div class="nav-align-top">
                    <h4 class="print_top_head">Quality of Work</h4>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-justified-quality" role="tabpanel">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                        <td class="print_head_p" colspan="2">
                                          <h4>Comments:</h4>
                                          <p><?php echo $empinfo->quality_comments; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="col-xl-6">
                   <div class="nav-align-top">
                    <h4 class="print_top_head">Knowledge of Job</h4>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-justified-knowledge" role="tabpanel">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>INDICATOR</th>
                                        <th>ASSESSMENT
                                            <i class='bx bx-info-circle' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" 
                                            title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"></i>
                                            (Out of 5)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                        <td class="print_head_p" colspan="2">
                                            <h4>Comments</h4>
                                            <p><?php echo $empinfo->knowledge_comments; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-xl-6">
                   <div class="nav-align-top">
                    <h4 class="print_top_head">Knowledge of Software</h4>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-justified-software" role="tabpanel">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                        <td class="print_head_p" colspan="2">
                                            <h4>Comments</h4>
                                            <p><?php echo $empinfo->software_comments; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                   <div class="nav-align-top">
                    <h4 class="print_top_head">Reliability and Dependability</h4>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-justified-reliability-dependability" role="tabpanel">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                        <td class="print_head_p" colspan="2">
                                            <h4>Comments</h4>
                                            <p><?php echo $empinfo->dependability_comments; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-xl-6">
                   <div class="nav-align-top">
                    <h4 class="print_top_head">Time Management</h4>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-justified-time-management" role="tabpanel">
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
                            <tr class="remove_bb padd_bb">
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
                            <tr class="remove_bb padd_bb">
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
                            <tr class="remove_bb padd_bb">
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
                            <tr class="remove_bb padd_bb">
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
                            <tr class="remove_bb padd_bb">
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
                                <td class="print_head_p" colspan="2">
                                    <h4>Comments</h4>
                                    <p><?php echo $empinfo->time_management_comments; ?></p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>   


        
                  <div class="col-xl-6">
                    <div class="nav-align-top">
                      <h4 class="print_top_head">Adaptability</h4>
                      <div class="tab-content">
                          <div class="tab-pane fade show active" id="navs-justified-adaptability" role="tabpanel">
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
                                          <tr class="remove_bb padd_bb">
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
                                          <tr class="remove_bb padd_bb">
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
                                          <tr class="remove_bb padd_bb">
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
                                          <tr class="remove_bb padd_bb">
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
                                          <tr class="remove_bb padd_bb">
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
                                          <tr class="remove_bb padd_bb">
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
                                              <td class="print_head_p" colspan="2">
                                                  <h4>Comments</h4>
                                                  <p><?php echo $empinfo->adaptability_comments; ?></p>
                                              </td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-xl-6">
                          <div class="nav-align-top">
                            <h4 class="print_top_head">Initiative and Proactive</h4>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="navs-justified-initiative-proactive" role="tabpanel">
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
                                              <tr class="remove_bb padd_bb">
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
                                              <tr class="remove_bb padd_bb">
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
                                              <tr class="remove_bb padd_bb">
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
                                              <tr class="remove_bb padd_bb">
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
                                              <tr class="remove_bb padd_bb">
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
                                              <tr class="remove_bb padd_bb">
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
                                                  <td class="print_head_p" colspan="2">
                                                      <h4>Comments</h4>
                                                      <p><?php echo $empinfo->initiative_proactive_comments; ?></p>
                                                  </td>
                                              </tr>
                                          </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>  
            <div class="col-xl-6">
                  <div class="nav-align-top">
                    <h4 class="print_top_head">Creativity and Problem Solving</h4>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-justified-creativity-problem-solving" role="tabpanel">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                    <tr class="remove_bb padd_bb">
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
                                        <td class="print_head_p" colspan="2">
                                            <h4>Comments</h4>
                                            <p><?php echo $empinfo->creativity_problem_solving_comments; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                              </table>
                          </div>  
                      </div>
                  </div>
              </div>  
          </div>
          <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"><a href="<?php echo base_url('Admin/showEmployeeInfo/'.$empinfo->main_employee_id); ?>"><i class="bx bx-left-arrow-alt"></i> Back</a></span></h4>
  </div>
<?php endif ?>

</div>
</div>
</div>

<script>
  window.onload = function () {
    window.print();
}
</script>