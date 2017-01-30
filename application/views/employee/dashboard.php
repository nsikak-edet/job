<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-12 col-md-6 col-xs-12">
                <div class="advertise-content pl-15">
                    <h3 class="uppercase pb-16 mb-21 mt-26"><i class="fa fa-file text-left"></i> My Resume
                    </h3>

                    <div class="single-job-post fix">
                        <!-- Show if resume not yet updated --->
                        <?php if(@$employee_details == null): ?>
                        <div class="job-title col-5 pl-30 pt-20 pb-20"><h4 class="alert alert-info">Please update your resume</h4></div>
                        <?php endif; ?>
                        <!-- /Show if resume not yet updated --->

                        <!-- Show resume details --->
                        <?php if(@$employee_details != null): ?>
                        <div class="job-title col-5 pl-30">
                                            <span class="pull-left col-2 block pr-20 mtb-17">
                                                <a href="#"><img src="<?php echo base_url(); ?>uploads/passports/<?php echo @$employee_details->passport; ?>" alt="passport" width="120px"></a>
                                            </span>

                            <div class="fix pl-30 mt-29 ">
                                <h4 class="mb-5"><?php echo @$employee_details->first_name . ' ' . @$employee_details->middle_name . ' ' . @$employee_details->last_name?></h4>
                                <h5><a href="#"></a></h5>

                                <p class="mt-10"><?php echo @$employee_details->description ?></p>
                            </div>
                        </div>
                            <div class="address col-3 pl-100">
                                            <span class="mtb-30 block"><span class="text-info">Country:</span> <?php echo @$employee_details->country_name ?><br>
                                            <span class="text-success">City:</span> <?php echo @$employee_details->city ?><br>
                                            <span class="text-info">Address:</span> <?php echo @$employee_details->address ?><br>
                                            <span class="text-info">Phone Number:</span> <?php echo @$employee_details->phone_number ?></span>
                            </div>
                        <?php endif; ?>
                        <!-- /Show resume details --->

                    </div>

                </div>
            </div>


            <div class="col-md-12">
                <div class="col-lg-12 col-md-6 col-xs-12">
                    <a href="<?php echo base_url() ?>employee/view" class="button large-button mt-9">Preview</a>
                    <a href="<?php echo base_url() ?>employee/resume" class="button large-button mt-9">Edit</a>
                </div>
            </div>

        </div>
    </div>
</div>

