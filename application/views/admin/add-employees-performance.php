
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"><a href="<?php echo base_url('Admin'); ?>"><i class="bx bx-left-arrow-alt"></i> Dashboard</a> / Performance Page /</span> Add Employee Performance</h4>
              <span class="emp-list-addbtn">
                  <a href="<?php echo base_url('Admin/employeesPerformanceResultList'); ?>" class="btn btn-outline-primary"><i class='bx bx-list-ul' ></i> Performance</a>
              </span>
              <div class="row">
                <div class="col-md-12">
                    <?php if($uploaded = $this->session->flashdata('performance_upload_success')): ?>
                      <div class="alert alert-success alert-dismissible" role="alert">
                        <strong><?php echo $uploaded; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <?php elseif($tryAgain = $this->session->flashdata('department_not_uploaded')): ?>
                          <div class="alert alert-danger alert-dismissible" role="alert">
                          <strong><?php echo $tryAgain; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>
                </div>
                  <div class="card mb-4">
                    <h5 class="card-header">Employee Details</h5>
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" action="<?php echo base_url('Admin/postEmployeePerformance'); ?>" data-parsley-validate data-toggle="validator">
                        <div class="row">
                          <div class="mb-3 col-md-12">
                            <label for="employee" class="form-label">Employee</label>
                            <select id="main_employee_id" name="main_employee_id" class="select2 form-select" required>
                              <option value="">Select Employee</option>
                              <?php if($emplist): ?>
                                <?php foreach($emplist as $data): ?>
                                    <option value="<?php echo $data->main_employee_id; ?>"><?php echo $data->employee_first_name; ?> <?php echo $data->employee_last_name; ?></option>
                                <?php endforeach; ?>
                              <?php else: ?>
                              <?php endif; ?>
                            </select>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">Department</label>
                            <input type="text" class="form-control" id="department_name" placeholder="Your Department" disabled />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation_name" placeholder="Your Designation" disabled />
                          </div>
                          <div class="mb-2 col-md-12">
                              <label for="designation" class="form-label"><b>Select Date Range</b></label>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">Start</label>
                            <input class="form-control" type="date" name="emp_performance_start_date" id="html5-date-input" required />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">End</label>
                            <input class="form-control" type="date" name="emp_performance_end_date" id="html5-date-input" required />
                          </div>
                          <div class="mb-3 col-md-12">
                            <hr>
                          </div>


                  <div class="col-xl-12">
                  <h6 class="text-muted">Add Performance</h6>
                  <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs nav-fill" role="tablist">

                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link active"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-communication"
                          aria-controls="navs-justified-communication"
                          aria-selected="true"
                        >
                          Communication
                        </button>
                      </li>

                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-productivity"
                          aria-controls="navs-justified-productivity"
                          aria-selected="false"
                        >
                          Productivity
                        </button>
                      </li>

                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-quality"
                          aria-controls="navs-justified-quality"
                          aria-selected="false"
                        >
                          Quality
                        </button>
                      </li>

                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-knowledge"
                          aria-controls="navs-justified-knowledge"
                          aria-selected="false"
                        >
                          Knowledge of Job
                        </button>
                      </li>

                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-software"
                          aria-controls="navs-justified-software"
                          aria-selected="false"
                        >
                          Knowledge of Software

                        </button>
                      </li>

                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-reliability-dependability"
                          aria-controls="navs-justified-reliability-dependability"
                          aria-selected="false"
                        >
                          Reliability & Dependability

                        </button>
                      </li>

                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-time-management"
                          aria-controls="navs-justified-time-management"
                          aria-selected="false"
                        >
                          Time Management

                        </button>
                      </li>

                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-adaptability"
                          aria-controls="navs-justified-adaptability"
                          aria-selected="false"
                        >
                          Adaptability

                        </button>
                      </li>

                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-initiative-proactive"
                          aria-controls="navs-justified-initiative-proactive"
                          aria-selected="false"
                        >

                        Initiative & Proactive

                        </button>
                      </li>


                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-creativity-problem-solving"
                          aria-controls="navs-justified-creativity-problem-solving"
                          aria-selected="false"
                        >

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
                                    <i class='bx bx-info-circle'
                                      data-bs-toggle="tooltip"
                                      data-bs-offset="0,4"
                                      data-bs-placement="right"
                                      data-bs-html="true"
                                      title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"
                                      ></i>
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
                                            <span class="radio-inline-num" 
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" 
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Good</span>">3</span>

                                          <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Very good</span>">4</span>

                                          <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Excellent</span>">5</span>
                                      </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>1. Proactively asking clarification questions</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_communication" name="communication_proactively_asking" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_communication" name="communication_proactively_asking" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_communication" name="communication_proactively_asking" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_communication" name="communication_proactively_asking" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_communication" name="communication_proactively_asking" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>2. Responds to messages/calls within a given time frame</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect1" name="communication_responds_to_messages" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect2" name="communication_responds_to_messages" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect3" name="communication_responds_to_messages" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect4" name="communication_responds_to_messages" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect5" name="communication_responds_to_messages" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>3. Proactively informing about delays or issues</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect1" name="communication_proactively_informing" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect2" name="communication_proactively_informing" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect3" name="communication_proactively_informing" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect4" name="communication_proactively_informing" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect5" name="communication_proactively_informing" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>4. Level of English in project related communication</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect1" name="communication_level_of_english" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect2" name="communication_level_of_english" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect3" name="communication_level_of_english" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect4" name="communication_level_of_english" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect5" name="communication_level_of_english" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>5. Communicates well with the team/client</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect1" name="communication_team_client" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect2" name="communication_team_client" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect3" name="communication_team_client" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect4" name="communication_team_client" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect5" name="communication_team_client" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>6. Informs the supervisor about leave plans</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect1" name="communication_Informs_the_supervisor" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect2" name="communication_Informs_the_supervisor" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect3" name="communication_Informs_the_supervisor" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect4" name="communication_Informs_the_supervisor" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input communication_checkSelect5" name="communication_Informs_the_supervisor" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <h4>Comments  
                                      <i class='bx bx-info-circle'
                                          data-bs-toggle="tooltip"
                                          data-bs-offset="0,4"
                                          data-bs-placement="right"
                                          data-bs-html="true"
                                          title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>"
                                          >
                                      </i>
                                    </h4>
                                    <textarea class="form-control" name="communication_comments" id="" cols="3" rows="3" placeholder="Please Enter Comments"></textarea>
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
                                    <i class='bx bx-info-circle'
                                      data-bs-toggle="tooltip"
                                      data-bs-offset="0,4"
                                      data-bs-placement="right"
                                      data-bs-html="true"
                                      title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"
                                      ></i>
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
                                            <span class="radio-inline-num" 
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" 
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Good</span>">3</span>

                                          <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Very good</span>">4</span>

                                          <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Excellent</span>">5</span>
                                      </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>1. Speed of modelling</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_productivity" name="productivity_speed_of_modelling" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_productivity" name="productivity_speed_of_modelling" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_productivity" name="productivity_speed_of_modelling" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_productivity" name="productivity_speed_of_modelling" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_productivity" name="productivity_speed_of_modelling" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>2. Absence or minimum redundant work</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input productivity_checkSelect1" name="productivity_absence_or_minimum" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input productivity_checkSelect2" name="productivity_absence_or_minimum" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input productivity_checkSelect3" name="productivity_absence_or_minimum" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input productivity_checkSelect4" name="productivity_absence_or_minimum" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input productivity_checkSelect5" name="productivity_absence_or_minimum" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>3. Complies with the set timelines and deadlines</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input productivity_checkSelect1" name="productivity_timelines_and_deadlines" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input productivity_checkSelect2" name="productivity_timelines_and_deadlines" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input productivity_checkSelect3" name="productivity_timelines_and_deadlines" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input productivity_checkSelect4" name="productivity_timelines_and_deadlines" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input productivity_checkSelect5" name="productivity_timelines_and_deadlines" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <h4>Comments  
                                      <i class='bx bx-info-circle'
                                          data-bs-toggle="tooltip"
                                          data-bs-offset="0,4"
                                          data-bs-placement="right"
                                          data-bs-html="true"
                                          title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>"
                                          >
                                      </i>
                                    </h4>
                                    <textarea class="form-control" name="productivity_comments" id="" cols="3" rows="3" placeholder="Please Enter Comments"></textarea>
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
                                          <i class='bx bx-info-circle'
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"
                                            ></i>
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
                                                  <span class="radio-inline-num" 
                                                  data-bs-toggle="tooltip"
                                                  data-bs-offset="0,4"
                                                  data-bs-placement="right"
                                                  data-bs-html="true"
                                                  title="<span>Not sufficient</span>">1</span>

                                                  <span class="radio-inline-num" 
                                                  data-bs-toggle="tooltip"
                                                  data-bs-offset="0,4"
                                                  data-bs-placement="right"
                                                  data-bs-html="true"
                                                  title="<span>Sufficient</span>">2</span>

                                                  <span class="radio-inline-num"
                                                  data-bs-toggle="tooltip"
                                                  data-bs-offset="0,4"
                                                  data-bs-placement="right"
                                                  data-bs-html="true"
                                                  title="<span>Good</span>">3</span>

                                                <span class="radio-inline-num"
                                                  data-bs-toggle="tooltip"
                                                  data-bs-offset="0,4"
                                                  data-bs-placement="right"
                                                  data-bs-html="true"
                                                  title="<span>Very good</span>">4</span>

                                                <span class="radio-inline-num"
                                                  data-bs-toggle="tooltip"
                                                  data-bs-offset="0,4"
                                                  data-bs-placement="right"
                                                  data-bs-html="true"
                                                  title="<span>Excellent</span>">5</span>
                                            </td>
                                      </tr>
                                      <tr class="remove_bb">
                                          <td>
                                              <p>1. Attention to details</p>
                                          </td>
                                          <td>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_quality" name="quality_attention_to_details" value="1" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_quality" name="quality_attention_to_details" value="2" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_quality" name="quality_attention_to_details" value="3" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_quality" name="quality_attention_to_details" value="4" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_quality" name="quality_attention_to_details" value="5" /> &nbsp;&nbsp; </label>
                                          </td>
                                      </tr>
                                      <tr class="remove_bb">
                                          <td>
                                              <p>2. Incur minimum volume of mistakes requiring correction</p>
                                          </td>
                                          <td>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect1" name="quality_mistakes_requiring_correction" value="1" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect2" name="quality_mistakes_requiring_correction" value="2" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect3" name="quality_mistakes_requiring_correction" value="3" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect4" name="quality_mistakes_requiring_correction" value="4" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect5" name="quality_mistakes_requiring_correction" value="5" /> &nbsp;&nbsp; </label>
                                          </td>
                                      </tr>
                                      <tr class="remove_bb">
                                          <td>
                                              <p>3. Meets the expectations for the quality of drawings and models</p>
                                          </td>
                                          <td>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect1" name="quality_meets_the_expectations" value="1" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect2" name="quality_meets_the_expectations" value="2" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect3" name="quality_meets_the_expectations" value="3" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect4" name="quality_meets_the_expectations" value="4" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect5" name="quality_meets_the_expectations" value="5" /> &nbsp;&nbsp; </label>
                                          </td>
                                      </tr>
                                      <tr class="remove_bb">
                                          <td>
                                              <p>4. Conducts QA/QC on drawing and model outputs</p>
                                          </td>
                                          <td>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect1" name="quality_conducts_qa_qc" value="1" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect2" name="quality_conducts_qa_qc" value="2" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect3" name="quality_conducts_qa_qc" value="3" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect4" name="quality_conducts_qa_qc" value="4" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect5" name="quality_conducts_qa_qc" value="5" /> &nbsp;&nbsp; </label>
                                          </td>
                                      </tr>
                                      <tr class="remove_bb">
                                          <td>
                                              <p>5. Follows the correct workflow set for modelling and drawings</p>
                                          </td>
                                          <td>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect1" name="quality_follows_the_correct_workflow_set" value="1" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect2" name="quality_follows_the_correct_workflow_set" value="2" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect3" name="quality_follows_the_correct_workflow_set" value="3" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect4" name="quality_follows_the_correct_workflow_set" value="4" /> &nbsp;&nbsp; </label>
                                              <label class="radio-inline"> <input type="radio" class="form-check-input quality_checkSelect5" name="quality_follows_the_correct_workflow_set" value="5" /> &nbsp;&nbsp; </label>
                                          </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2">
                                          <h4>Comments  
                                            <i class='bx bx-info-circle'
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>"
                                                >
                                            </i>
                                          </h4>
                                          <textarea class="form-control" name="quality_comments" id="" cols="3" rows="3" placeholder="Please Enter Comments"></textarea>
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
                                    <i class='bx bx-info-circle'
                                      data-bs-toggle="tooltip"
                                      data-bs-offset="0,4"
                                      data-bs-placement="right"
                                      data-bs-html="true"
                                      title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"
                                      ></i>
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
                                            <span class="radio-inline-num" 
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" 
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Good</span>">3</span>

                                          <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Very good</span>">4</span>

                                          <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Excellent</span>">5</span>
                                      </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>1. Understanding of BIM project standards and portfolio</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_knowledge" name="knowledge_standards_and_portfolio" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_knowledge" name="knowledge_standards_and_portfolio" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_knowledge" name="knowledge_standards_and_portfolio" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_knowledge" name="knowledge_standards_and_portfolio" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_knowledge" name="knowledge_standards_and_portfolio" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>2. Understanding of BIM project requirements</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input knowledge_checkSelect1" name="knowledge_bim_project_requirements" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input knowledge_checkSelect2" name="knowledge_bim_project_requirements" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input knowledge_checkSelect3" name="knowledge_bim_project_requirements" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input knowledge_checkSelect4" name="knowledge_bim_project_requirements" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input knowledge_checkSelect5" name="knowledge_bim_project_requirements" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>3. Knowledge of the construction industry including ARC, STR, MEP, and BIM standards</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input knowledge_checkSelect1" name="knowledge_of_the_construction_industry" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input knowledge_checkSelect2" name="knowledge_of_the_construction_industry" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input knowledge_checkSelect3" name="knowledge_of_the_construction_industry" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input knowledge_checkSelect4" name="knowledge_of_the_construction_industry" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input knowledge_checkSelect5" name="knowledge_of_the_construction_industry" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <h4>Comments  
                                      <i class='bx bx-info-circle'
                                          data-bs-toggle="tooltip"
                                          data-bs-offset="0,4"
                                          data-bs-placement="right"
                                          data-bs-html="true"
                                          title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>"
                                          >
                                      </i>
                                    </h4>
                                    <textarea class="form-control" name="knowledge_comments" id="" cols="3" rows="3" placeholder="Please Enter Comments"></textarea>
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
                                    <i class='bx bx-info-circle'
                                      data-bs-toggle="tooltip"
                                      data-bs-offset="0,4"
                                      data-bs-placement="right"
                                      data-bs-html="true"
                                      title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"
                                      ></i>
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
                                            <span class="radio-inline-num" 
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" 
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Good</span>">3</span>

                                          <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Very good</span>">4</span>

                                          <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Excellent</span>">5</span>
                                      </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>1. Follows the correct format for Bitrix tasks and leaves</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_software" name="software_bitrix_tasks_and_leaves" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_software" name="software_bitrix_tasks_and_leaves" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_software" name="software_bitrix_tasks_and_leaves" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_software" name="software_bitrix_tasks_and_leaves" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_software" name="software_bitrix_tasks_and_leaves" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>2. Consider the knowledge of the digital tools necessary to carry out production and communication tasks</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input software_checkSelect1" name="software_digital_tools_production_communication" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input software_checkSelect2" name="software_digital_tools_production_communication" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input software_checkSelect3" name="software_digital_tools_production_communication" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input software_checkSelect4" name="software_digital_tools_production_communication" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input software_checkSelect5" name="software_digital_tools_production_communication" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <h4>Comments  
                                      <i class='bx bx-info-circle'
                                          data-bs-toggle="tooltip"
                                          data-bs-offset="0,4"
                                          data-bs-placement="right"
                                          data-bs-html="true"
                                          title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>"
                                          >
                                      </i>
                                    </h4>
                                    <textarea class="form-control" name="software_comments" id="" cols="3" rows="3" placeholder="Please Enter Comments"></textarea>
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
                                    <i class='bx bx-info-circle'
                                      data-bs-toggle="tooltip"
                                      data-bs-offset="0,4"
                                      data-bs-placement="right"
                                      data-bs-html="true"
                                      title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"
                                      ></i>
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
                                            <span class="radio-inline-num" 
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" 
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Good</span>">3</span>

                                          <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Very good</span>">4</span>

                                          <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Excellent</span>">5</span>
                                      </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>1. Ability to handle a team</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_reliability_dependability" name="dependability_handle_a_team" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_reliability_dependability" name="dependability_handle_a_team" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_reliability_dependability" name="dependability_handle_a_team" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_reliability_dependability" name="dependability_handle_a_team" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_reliability_dependability" name="dependability_handle_a_team" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>2. Ability to handle a project</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input reliability_dependability_checkSelect1" name="dependability_handle_a_project" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input reliability_dependability_checkSelect2" name="dependability_handle_a_project" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input reliability_dependability_checkSelect3" name="dependability_handle_a_project" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input reliability_dependability_checkSelect4" name="dependability_handle_a_project" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input reliability_dependability_checkSelect5" name="dependability_handle_a_project" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>3. Ability to finish the tasks with minimum supervision within the set deadlines</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input reliability_dependability_checkSelect1" name="dependability_the_set_deadlines" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input reliability_dependability_checkSelect2" name="dependability_the_set_deadlines" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input reliability_dependability_checkSelect3" name="dependability_the_set_deadlines" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input reliability_dependability_checkSelect4" name="dependability_the_set_deadlines" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input reliability_dependability_checkSelect5" name="dependability_the_set_deadlines" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <h4>Comments  
                                      <i class='bx bx-info-circle'
                                          data-bs-toggle="tooltip"
                                          data-bs-offset="0,4"
                                          data-bs-placement="right"
                                          data-bs-html="true"
                                          title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>"
                                          >
                                      </i>
                                    </h4>
                                    <textarea class="form-control" name="dependability_comments" id="" cols="3" rows="3" placeholder="Please Enter Comments"></textarea>
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
                                    <i class='bx bx-info-circle'
                                      data-bs-toggle="tooltip"
                                      data-bs-offset="0,4"
                                      data-bs-placement="right"
                                      data-bs-html="true"
                                      title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"
                                      ></i>
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
                                            <span class="radio-inline-num" 
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Not sufficient</span>">1</span>

                                            <span class="radio-inline-num" 
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Sufficient</span>">2</span>

                                            <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Good</span>">3</span>

                                          <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Very good</span>">4</span>

                                          <span class="radio-inline-num"
                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<span>Excellent</span>">5</span>
                                      </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>1. Follows the scheduled work shift</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_time_management" name="time_management_scheduled_work_shift" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_time_management" name="time_management_scheduled_work_shift" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_time_management" name="time_management_scheduled_work_shift" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_time_management" name="time_management_scheduled_work_shift" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_time_management" name="time_management_scheduled_work_shift" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>2. Meets the required working hours</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input time_management_checkSelect1" name="time_management_required_working_hours" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input time_management_checkSelect2" name="time_management_required_working_hours" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input time_management_checkSelect3" name="time_management_required_working_hours" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input time_management_checkSelect4" name="time_management_required_working_hours" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input time_management_checkSelect5" name="time_management_required_working_hours" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr class="remove_bb">
                                    <td>
                                        <p>3. Uses Bitrix24 to keep internal and external deadlinesclearly with your teammates</p>
                                    </td>
                                    <td>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input time_management_checkSelect1" name="time_management_deadlinesclearly_with_your_teammates" value="1" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input time_management_checkSelect2" name="time_management_deadlinesclearly_with_your_teammates" value="2" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input time_management_checkSelect3" name="time_management_deadlinesclearly_with_your_teammates" value="3" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input time_management_checkSelect4" name="time_management_deadlinesclearly_with_your_teammates" value="4" /> &nbsp;&nbsp; </label>
                                        <label class="radio-inline"> <input type="radio" class="form-check-input time_management_checkSelect5" name="time_management_deadlinesclearly_with_your_teammates" value="5" /> &nbsp;&nbsp; </label>
                                    </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <h4>Comments  
                                      <i class='bx bx-info-circle'
                                          data-bs-toggle="tooltip"
                                          data-bs-offset="0,4"
                                          data-bs-placement="right"
                                          data-bs-html="true"
                                          title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>"
                                          >
                                      </i>
                                    </h4>
                                    <textarea class="form-control" name="time_management_comments" id="" cols="3" rows="3" placeholder="Please Enter Comments"></textarea>
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
                                        <i class='bx bx-info-circle'
                                          data-bs-toggle="tooltip"
                                          data-bs-offset="0,4"
                                          data-bs-placement="right"
                                          data-bs-html="true"
                                          title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"
                                          ></i>
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
                                                <span class="radio-inline-num" 
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Not sufficient</span>">1</span>

                                                <span class="radio-inline-num" 
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Sufficient</span>">2</span>

                                                <span class="radio-inline-num"
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Good</span>">3</span>

                                              <span class="radio-inline-num"
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Very good</span>">4</span>

                                              <span class="radio-inline-num"
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Excellent</span>">5</span>
                                          </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>1. Ability to learn new project standards in a short amount of time</p>
                                        </td>
                                        <td>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_adaptability" name="adaptability_short_amount_of_time" value="1" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_adaptability" name="adaptability_short_amount_of_time" value="2" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_adaptability" name="adaptability_short_amount_of_time" value="3" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_adaptability" name="adaptability_short_amount_of_time" value="4" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_adaptability" name="adaptability_short_amount_of_time" value="5" /> &nbsp;&nbsp; </label>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>2. Ability to adjust depending on the project needs</p>
                                        </td>
                                        <td>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect1" name="adaptability_ability_to_adjust_depending" value="1" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect2" name="adaptability_ability_to_adjust_depending" value="2" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect3" name="adaptability_ability_to_adjust_depending" value="3" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect4" name="adaptability_ability_to_adjust_depending" value="4" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect5" name="adaptability_ability_to_adjust_depending" value="5" /> &nbsp;&nbsp; </label>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>3. Ability to work on multiple projects</p>
                                        </td>
                                        <td>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect1" name="adaptability_work_on_multiple_projects" value="1" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect2" name="adaptability_work_on_multiple_projects" value="2" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect3" name="adaptability_work_on_multiple_projects" value="3" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect4" name="adaptability_work_on_multiple_projects" value="4" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect5" name="adaptability_work_on_multiple_projects" value="5" /> &nbsp;&nbsp; </label>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>4. Ability to learn new disciplines, software, and adapt this knowledge to new challenges</p>
                                        </td>
                                        <td>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect1" name="adaptability_learn_new_disciplines_software" value="1" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect2" name="adaptability_learn_new_disciplines_software" value="2" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect3" name="adaptability_learn_new_disciplines_software" value="3" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect4" name="adaptability_learn_new_disciplines_software" value="4" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input adaptability_checkSelect5" name="adaptability_learn_new_disciplines_software" value="5" /> &nbsp;&nbsp; </label>
                                        </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">
                                        <h4>Comments  
                                          <i class='bx bx-info-circle'
                                              data-bs-toggle="tooltip"
                                              data-bs-offset="0,4"
                                              data-bs-placement="right"
                                              data-bs-html="true"
                                              title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>"
                                              >
                                          </i>
                                        </h4>
                                        <textarea class="form-control" name="adaptability_comments" id="" cols="3" rows="3" placeholder="Please Enter Comments"></textarea>
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
                                        <i class='bx bx-info-circle'
                                          data-bs-toggle="tooltip"
                                          data-bs-offset="0,4"
                                          data-bs-placement="right"
                                          data-bs-html="true"
                                          title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"
                                          ></i>
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
                                                <span class="radio-inline-num" 
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Not sufficient</span>">1</span>

                                                <span class="radio-inline-num" 
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Sufficient</span>">2</span>

                                                <span class="radio-inline-num"
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Good</span>">3</span>

                                              <span class="radio-inline-num"
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Very good</span>">4</span>

                                              <span class="radio-inline-num"
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Excellent</span>">5</span>
                                          </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>1. Ability to learn new project standards in a short amount of time</p>
                                        </td>
                                        <td>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_initiative_proactive" name="initiative_proactive_ability_to_learn_new_project" value="1" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_initiative_proactive" name="initiative_proactive_ability_to_learn_new_project" value="2" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_initiative_proactive" name="initiative_proactive_ability_to_learn_new_project" value="3" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_initiative_proactive" name="initiative_proactive_ability_to_learn_new_project" value="4" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_initiative_proactive" name="initiative_proactive_ability_to_learn_new_project" value="5" /> &nbsp;&nbsp; </label>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>2. Ability to adjust depending on the project needs</p>
                                        </td>
                                        <td>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect1" name="initiative_proactive_adjust_depending_on_the_project" value="1" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect2" name="initiative_proactive_adjust_depending_on_the_project" value="2" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect3" name="initiative_proactive_adjust_depending_on_the_project" value="3" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect4" name="initiative_proactive_adjust_depending_on_the_project" value="4" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect5" name="initiative_proactive_adjust_depending_on_the_project" value="5" /> &nbsp;&nbsp; </label>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>3. Ability to work on multiple projects</p>
                                        </td>
                                        <td>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect1" name="initiative_proactive_work_on_multiple_projects" value="1" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect2" name="initiative_proactive_work_on_multiple_projects" value="2" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect3" name="initiative_proactive_work_on_multiple_projects" value="3" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect4" name="initiative_proactive_work_on_multiple_projects" value="4" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect5" name="initiative_proactive_work_on_multiple_projects" value="5" /> &nbsp;&nbsp; </label>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>4. Ability to learn new disciplines, software, and adapt this knowledge to new challenges</p>
                                        </td>
                                        <td>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect1" name="initiative_proactive_learn_new_disciplines_software" value="1" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect2" name="initiative_proactive_learn_new_disciplines_software" value="2" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect3" name="initiative_proactive_learn_new_disciplines_software" value="3" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect4" name="initiative_proactive_learn_new_disciplines_software" value="4" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input initiative_proactive_checkSelect5" name="initiative_proactive_learn_new_disciplines_software" value="5" /> &nbsp;&nbsp; </label>
                                        </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">
                                        <h4>Comments  
                                          <i class='bx bx-info-circle'
                                              data-bs-toggle="tooltip"
                                              data-bs-offset="0,4"
                                              data-bs-placement="right"
                                              data-bs-html="true"
                                              title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>"
                                              >
                                          </i>
                                        </h4>
                                        <textarea class="form-control" name="initiative_proactive_comments" id="" cols="3" rows="3" placeholder="Please Enter Comments"></textarea>
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
                                        <i class='bx bx-info-circle'
                                          data-bs-toggle="tooltip"
                                          data-bs-offset="0,4"
                                          data-bs-placement="right"
                                          data-bs-html="true"
                                          title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"
                                          ></i>
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
                                                <span class="radio-inline-num" 
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Not sufficient</span>">1</span>

                                                <span class="radio-inline-num" 
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Sufficient</span>">2</span>

                                                <span class="radio-inline-num"
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Good</span>">3</span>

                                              <span class="radio-inline-num"
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Very good</span>">4</span>

                                              <span class="radio-inline-num"
                                                data-bs-toggle="tooltip"
                                                data-bs-offset="0,4"
                                                data-bs-placement="right"
                                                data-bs-html="true"
                                                title="<span>Excellent</span>">5</span>
                                          </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>1. Ability to learn new project standards in a short amount of time</p>
                                        </td>
                                        <td>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_creativity_problem_solving" name="creativity_problem_solving_learn_new_project" value="1" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_creativity_problem_solving" name="creativity_problem_solving_learn_new_project" value="2" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_creativity_problem_solving" name="creativity_problem_solving_learn_new_project" value="3" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_creativity_problem_solving" name="creativity_problem_solving_learn_new_project" value="4" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input checkSelect_creativity_problem_solving" name="creativity_problem_solving_learn_new_project" value="5" /> &nbsp;&nbsp; </label>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>2. Ability to adjust depending on the project needs</p>
                                        </td>
                                        <td>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect1" name="creativity_problem_solving_depending_project_needs" value="1" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect2" name="creativity_problem_solving_depending_project_needs" value="2" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect3" name="creativity_problem_solving_depending_project_needs" value="3" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect4" name="creativity_problem_solving_depending_project_needs" value="4" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect5" name="creativity_problem_solving_depending_project_needs" value="5" /> &nbsp;&nbsp; </label>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>3. Ability to work on multiple projects</p>
                                        </td>
                                        <td>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect1" name="creativity_problem_solving_work_multiple_projects" value="1" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect2" name="creativity_problem_solving_work_multiple_projects" value="2" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect3" name="creativity_problem_solving_work_multiple_projects" value="3" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect4" name="creativity_problem_solving_work_multiple_projects" value="4" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect5" name="creativity_problem_solving_work_multiple_projects" value="5" /> &nbsp;&nbsp; </label>
                                        </td>
                                    </tr>
                                    <tr class="remove_bb">
                                        <td>
                                            <p>4. Ability to learn new disciplines, software, and adapt this knowledge to new challenges</p>
                                        </td>
                                        <td>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect1" name="creativity_problem_solving_knowledge_to_new_challenges" value="1" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect2" name="creativity_problem_solving_knowledge_to_new_challenges" value="2" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect3" name="creativity_problem_solving_knowledge_to_new_challenges" value="3" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect4" name="creativity_problem_solving_knowledge_to_new_challenges" value="4" /> &nbsp;&nbsp; </label>
                                            <label class="radio-inline"> <input type="radio" class="form-check-input creativity_problem_solving_checkSelect5" name="creativity_problem_solving_knowledge_to_new_challenges" value="5" /> &nbsp;&nbsp; </label>
                                        </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">
                                        <h4>Comments  
                                          <i class='bx bx-info-circle'
                                              data-bs-toggle="tooltip"
                                              data-bs-offset="0,4"
                                              data-bs-placement="right"
                                              data-bs-html="true"
                                              title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>"
                                              >
                                          </i>
                                        </h4>
                                        <textarea class="form-control" name="creativity_problem_solving_comments" id="" cols="3" rows="3" placeholder="Please Enter Comments"></textarea>
                                      </td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                          </div>
                        </div>
                      </div>


                       
                          <!-- <div class="table-responsive text-nowrap">
                                <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>Indicator</th>
                                        <th>
                                          Assessment
                                            <i class='bx bx-info-circle'

                                            data-bs-toggle="tooltip"
                                            data-bs-offset="0,4"
                                            data-bs-placement="right"
                                            data-bs-html="true"
                                            title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance scores</span>"
                                            ></i>
                                            (Out of 5)
                                        </th>
                                        <th>Comments
                                          <i class='bx bx-info-circle'
                                          data-bs-toggle="tooltip"
                                          data-bs-offset="0,4"
                                          data-bs-placement="right"
                                          data-bs-html="true"
                                          title="<i class='bx bx-trending-up bx-xs' ></i> <span>Add performance comments</span>"
                                          ></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td><strong>Communication</strong></td>
                                        <td>
                                            <input type="text" class="form-control" id="communication_assessment" name="communication_assessment" placeholder="Value" required data-parsley-trigger="keyup" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="communication_comments" name="communication_comments" placeholder="Comments" required data-parsley-trigger="keyup" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Performance</strong></td>
                                        <td>
                                            <input type="text" class="form-control" id="performance_assessment" name="performance_assessment" placeholder="Value" required data-parsley-trigger="keyup" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="performance_comments" name="performance_comments" placeholder="Comments" required data-parsley-trigger="keyup" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Quality</strong></td>
                                        <td>
                                            <input type="text" class="form-control" id="quality_assessment" name="quality_assessment" placeholder="Value" required data-parsley-trigger="keyup" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="quality_comments" name="quality_comments" placeholder="Comments" required data-parsley-trigger="keyup" />
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>

                            <div class="mb-3 col-md-12">
                            </div>
                        </div> -->


                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            