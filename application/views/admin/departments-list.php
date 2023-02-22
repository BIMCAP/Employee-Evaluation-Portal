<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"><a href="<?php echo base_url('Admin'); ?>"><i class="bx bx-left-arrow-alt"></i> Dashboard</a> / Department Page /</span> Departments List</h4>
    <span class="emp-list-addbtn">
        <a href="<?php echo base_url('Admin/addDepartments'); ?>" class="btn btn-outline-primary"><i class='bx bx-plus'></i> Department</a>
    </span>
    <div class="col-md-12">
            <?php if($uploaded = $this->session->flashdata('dep_delete_success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
            <strong><?php echo $uploaded; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php elseif($tryAgain = $this->session->flashdata('dep_not_deleted')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                <strong><?php echo $tryAgain; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-12">
            <?php if($uploaded = $this->session->flashdata('dep_update_success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
            <strong><?php echo $uploaded; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php elseif($tryAgain = $this->session->flashdata('dep_update_try_again')): ?>
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
                    <th>Department</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                <?php if($departmentdata): ?>
                    <?php foreach ($departmentdata as $data): ?>
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $data->department_name; ?></strong></td>
                            <td><?php echo $data->department_date; ?></td>
                            <?php if(($data->department_status)=='1'): ?>
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
                                    data-bs-target="<?php echo '#departmentdEditModal'.$data->department_id ; ?>" href="javascript:void(0);"
                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                    >

                                    <a class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="<?php echo '#departmentdDeleteModal'.$data->department_id ; ?>" href="javascript:void(0);"
                                    ><i class="bx bx-trash me-1"></i> Delete</a
                                    >

                                </div>
                                </div>
                            </td>
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


<?php if($departmentdata): ?>
<?php foreach ($departmentdata as $data): ?>
<form action="<?php echo base_url('Admin/updateDepartmentData'); ?>" method="POST">
<div class="card-body">
    <div class="row gy-3">
        <div class="col-lg-4 col-md-6">
            <div class="modal fade" id="<?php echo 'departmentdEditModal'.$data->department_id ; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Update Department</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Department Name <span class="isrequired">*</span></label>
                            <input type="hidden" name="department_id" value='<?php echo $data->department_id; ?>'>
                            <input type="text" class="form-control" name="department_name" value='<?php echo $data->department_name; ?>'  />
                            </div>
                            <div class="mb-3">
                            <label for="designation" class="form-label">Status <span class="isrequired">*</span></label>
                                <select class="form-select" name="department_status">
                                <option selected="" disabled>Please select status</option>
                                <option value="1">Active</option>
                                <option value="2">Deactivate</option>
                                </select>
                        </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-success">Update changes</button>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>

<?php if($departmentdata): ?>
<?php foreach ($departmentdata as $data): ?>
<form action="<?php echo base_url('Admin/deleteDepartmentData'); ?>" method="POST">
    <div class="modal fade" id="<?php echo 'departmentdDeleteModal'.$data->department_id ; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel2">Delete Employee Information?</h5>
                <br><br>
                <input type="hidden" name="department_id" value="<?php echo $data->department_id; ?>">
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