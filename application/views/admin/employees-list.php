<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-0"><span class="text-muted fw-light"><a href="<?php echo base_url('Admin'); ?>"><i class="bx bx-left-arrow-alt"></i> Dashboard </a> / Employee Page /</span> Employee List</h4>
        <span class="emp-list-addbtn">
            <a href="<?php echo base_url('Admin/addEmployees'); ?>" class="btn btn-outline-primary"><i class='bx bx-plus'></i> Employee</a>
        </span>

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
        <div class="col-md-12">
            <?php if($uploaded = $this->session->flashdata('emp_delete_success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
            <strong><?php echo $uploaded; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php elseif($tryAgain = $this->session->flashdata('emp_delete_success')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                <strong><?php echo $tryAgain; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
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
        <div class="col-md-12">
            <?php if($uploaded = $this->session->flashdata('emp_update_status_success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
            <strong><?php echo $uploaded; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php elseif($tryAgain = $this->session->flashdata('emp_update_status_not')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                <strong><?php echo $tryAgain; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                <thead class="table-light">
                    <tr>
                    <th>Employee</th>
                    <th>Email</th>
                    <th>Departments</th>
                    <th>Designation</th>
                    <th>Date of Joining</th>
                    <th>Date of Termination</th>
                    <th>Status</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                <?php if($empdata): ?>
                    <?php foreach ($empdata as $data): ?>
                        <tr>
                            <td>
                              <div class="avatar-edit">
                                  <img src="<?php echo base_url($data->employee_image); ?>" alt="admin profile" class="w-px-40 h-auto rounded-circle">&nbsp;
                                  <a href="<?php echo base_url('Admin/showEmployeeInfo/'.$data->main_employee_id); ?>"><strong><?php echo $data->employee_first_name; ?> <i class='bx bx-link' ></i></strong></a>
                              </div>
                            </td>
                            <td><?php echo $data->employee_email; ?></td>
                            <td><?php echo $data->department_name; ?></td>
                            <td><?php echo $data->employee_designation; ?></td>
                            <td><?php echo $data->employee_doj; ?></td>

                            <?php if($data->employee_dot): ?>
                                <td><?php echo $data->employee_dot; ?></td>
                            <?php else: ?>
                                <td></td>
                            <?php endif; ?>

                            <?php if(($data->employee_status)=='1'): ?>
                                <td><span class="badge bg-label-success me-1">Active</span></td>
                            <?php else: ?>
                                <td><span class="badge bg-label-danger">Deactivate</span></td>
                            <?php endif; ?>  
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">

                                        <a class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="<?php echo '#empStatus'.$data->main_employee_id; ?>" href="javascript:void(0);"
                                        ><i class="bx bx-edit-alt me-1"></i> Status</a
                                        >

                                        <a class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="<?php echo '#empDelete'.$data->main_employee_id; ?>" href="javascript:void(0);"
                                        ><i class="bx bx-trash me-1"></i> Delete</a
                                        >

                                    </div>
                                </div>
                            </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr class="empty_td">
                        <td><strong><i class='bx bxs-quote-alt-left'></i> Employee Details Empty <i class='bx bxs-quote-alt-right' ></i></strong></td>
                    </tr>
                <?php endif; ?> 
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php if($empdata): ?>
<?php foreach ($empdata as $data): ?>
<form action="<?php echo base_url('Admin/UpdateStatusEmp'); ?>" method="POST">
    <div class="modal fade" id="<?php echo 'empStatus'.$data->main_employee_id; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel2">Update Employee Status</h5>
                <br><br>
                <input type="hidden" name="main_employee_id" value="<?php echo $data->main_employee_id; ?>">
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>

            <div class="modal-body">
                <label for="designation" class="form-label">Status <span class="isrequired">*</span></label>
                <select class="form-select" name="employee_status">
                    <option value="1" selected="">Please select status</option>
                    <option value="1">Active</option>
                    <option value="2">Deactivate</option>
                </select>
            </div>

            <div class="modal-footer footer-flex">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
                </button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </div>
        </div>
    </div>
</form>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>

<?php if($empdata): ?>
<?php foreach ($empdata as $data): ?>
<form action="<?php echo base_url('Admin/deleteEmpData'); ?>" method="POST">
    <div class="modal fade" id="<?php echo 'empDelete'.$data->main_employee_id; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel2">Delete Employee Information?</h5>
                <br><br>
                <input type="hidden" name="main_employee_id" value="<?php echo $data->main_employee_id; ?>">
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
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            </div>
        </div>
    </div>
</form>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>