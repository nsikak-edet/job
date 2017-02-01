<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-12 col-md-6 col-xs-12">
                <div class="advertise-content pl-15">
                    <h3 class="uppercase pb-16 mb-21 mt-26"><i class="fa fa-users text-left"></i> Employee
                    </h3>
                </div>
            </div>
            <div class="col-lg-12 col-md-6 mt-40 col-xs-12">
                <div class="advertise-content pl-15">
                    <?php if (isset($employees) && $employees != null) foreach (@$employees as $employee): ?>
                        <div class="single-job-post fix">
                            <div class="job-title col-3 pl-30">
                          <span
                              class="pull-left block mtb-15"><?php echo date('d-m-Y', strtotime($employee->date_created)) ?><br>
                              <span class="text-success"><?php echo ($employee->is_active == 1) ? 'Active' : 'Inactive' ?></span>
                          </span>
                                <div class="fix pl-30 mt-10">
                                    <h6><a href="<?php echo base_url() ?>employee/view/<?php echo $employee->user_id ?>"><?php echo $employee->first_name .' '.$employee->middle_name.' '.$employee->last_name; ?></a></h6>
                                </div>
                            </div>
                            <div class="address col-3 pl-100">
                        <span class="mtb-10 block"><?php echo $employee->email; ?><br>
                            <?php echo $employee->phone_number; ?><br>
                        </span>

                            </div>
                            <div class="keyword col-4 pl-20 pt-7 pb-20">
                                <a href="<?php echo base_url() ?>employee/view/<?php echo $employee->user_id ?>" class="btn btn-default btn-sm text-info mr-10"> <i class="fa fa-eye text-left"></i> view</a>
                                <a href="<?php echo base_url() ?>employee/activate/<?php echo $employee->id ?>?a=<?php echo ($employee->is_active == 1) ? 0 : 1 ?>" class="btn btn-default btn-sm text-info mr-10"> <i class="fa fa-crosshairs text-left"></i> <?php echo ($employee->is_active == 1) ? 'Deactivate' : 'Activate' ?></a>
                                <a href="<?php echo base_url() ?>employee/del/<?php echo $employee->id ?>" class="btn btn-default btn-sm text-info mr-10"> <i class="fa fa-minus text-left"></i> Delete</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>

