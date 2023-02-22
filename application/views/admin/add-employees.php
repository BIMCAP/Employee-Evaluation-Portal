
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"><a href="<?php echo base_url('Admin'); ?>"><i class="bx bx-left-arrow-alt"></i> Dashboard</a> / Employee Page /</span> Add Employee</h4>
              <span class="emp-list-addbtn">
                  <a href="<?php echo base_url('Admin/employeesList'); ?>" class="btn btn-outline-primary"><i class='bx bx-list-ul' ></i> Employee</a>
              </span>
              <div class="row">
              <form id="formAccountSettings" method="POST" action="<?php echo base_url('Admin/postEmployeeData'); ?>"  data-parsley-validate data-toggle="validator" enctype="multipart/form-data">
                <div class="col-md-12">
                  <?php if($uploaded = $this->session->flashdata('emp_upload_success')): ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <strong><?php echo $uploaded; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php elseif($tryAgain = $this->session->flashdata('emp_upload_success')): ?>
                      <div class="alert alert-danger alert-dismissible" role="alert">
                      <strong><?php echo $tryAgain; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>
                  </div>

                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <div class="holder">
                          <img
                            src="<?php echo base_url('assets_admin/img/icons/profile-upload.png'); ?>"
                            alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="imgPreview"
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
                              required data-parsley-trigger="keyup"
                            />
                          </label>
                          <p class="text-muted mb-0">Allowed JPG, JPEG or PNG. Image Resolution: 225px * 225px. Max size of 800K </p>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">First Name <span class="isrequired">*</span></label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="employee_first_name"
                              placeholder="John"
                              autofocus
                              required data-parsley-trigger="keyup"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Last Name <span class="isrequired">*</span></label>
                            <input class="form-control" type="text" name="employee_last_name" id="lastName" placeholder="Doe" required data-parsley-trigger="keyup" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail <span>*</span></label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="employee_email"
                              placeholder="john.doe@example.com"
                              required data-parsley-trigger="keyup"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Phone Number <span class="isrequired">*</span></label>
                            <div class="form-group md-group show-label">
                              <input class="form-control" name="employee_number" type="tel" id="phone" placeholder="e.g. +1 702 123 4567" value="+1 " required data-parsley-trigger="keyup">
                            </div>
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="address" class="form-label">Address <span class="isrequired">*</span></label>
                            <input type="text" class="form-control" id="address" name="employee_address" placeholder="Address" required data-parsley-trigger="keyup" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">City <span class="isrequired">*</span></label>
                            <input class="form-control" type="text" id="city" name="employee_city" placeholder="City" required data-parsley-trigger="keyup"/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <div class="form-group md-group show-label">
                            <label class="form-label" for="country">Country <span class="isrequired">*</span></label>
                              <select name="employee_country" id="address-country" class="select2 form-select form-control" required data-parsley-trigger="keyup">
                                </select>
                              </div>
                            </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">Departments <span class="isrequired">*</span></label>
                            <select id="department_id" name="employee_department" class="select2 form-select" required data-parsley-trigger="keyup">
                              <option value="">Select Departments</option>
                              <?php if($departments): ?>
                                  <?php foreach($departments as $data): ?>
                                    <option value="<?php echo $data->department_id; ?>"><?php echo $data->department_name; ?></option>
                                  <?php endforeach; ?>
                              <?php endif; ?>
                            </select> 
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">Designation <span class="isrequired">*</span></label>
                            <select id="designation_id" name="employee_designation" class="select2 form-select" required data-parsley-trigger="keyup">
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">Date Of Joining <span class="isrequired">*</span></label>
                            <input class="form-control" name="employee_doj" type="date" id="html5-date-input" required data-parsley-trigger="keyup">
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">Date Of Termination</label>
                            <input class="form-control" type="date" name="employee_dot" id="html5-date-input">
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">Employee Password <span class="isrequired">*</span></label>
                            <input class="form-control" name="emp_password" type="text" id="html5-date-input" required data-parsley-trigger="keyup">
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="designation" class="form-label">Level</label>
                            <select class="form-control" name="emp_level" id="">
                                <option value="" selected disabled>Enter Level</option>
                                <option value="2">Employee</option>
                                <option value="3">Manager</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="designation" class="form-label">Status <span class="isrequired">*</span></label>
                              <select class="form-select" name="employee_status" id="exampleFormControlSelect1" aria-label="Default select example" required data-parsley-trigger="keyup">
                              <option selected="" disabled>Please select status</option>
                              <option value="1">Active</option>
                              <option value="2">Deactivate</option>
                            </select>
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
                        