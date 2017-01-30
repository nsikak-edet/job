<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-12 col-md-6 col-xs-12">
                <div class="advertise-content pl-15">
                    <h3 class="uppercase pb-16 mb-21 mt-26"><i class="fa fa-chevron-circle-right text-left"></i> Resume Details </h3>

                    <div class="single-job-post fix">
                        <!-- Show resume details --->
                        <?php if(@$employee_details != null): ?>
                        <div class="job-title col-5 pl-30">
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
                        <div class="address col-2 mt-20">
                            <span class="pull-left col-2 block pr-20 mtb-17">
                                                <a href="#"><img src="<?php echo base_url(); ?>uploads/passports/<?php echo @$employee_details->passport; ?>" alt="passport" width="120px"></a>
                                            </span>
                            </div>
                        <?php endif; ?>
                        <!-- /Show resume details --->

                    </div>

                </div>

                <div class="advertise-content pl-15">
                    <h3 class="uppercase pb-16 mb-21 mt-26"><i class="fa fa-chevron-circle-right text-left"></i> Education </h3>

                    <div class="single-job-post fix">
                        <!-- Show resume education --->
                        <?php if(@$employee_education != null): ?>
                            <div class="job-title col-7 pl-30">
                                <div class="fix pl-30 mt-29 ">
                                    <h4 class="mb-5"><?php echo @$employee_education->school_name ?></h4>
                                    <h5><a href="#"><?php echo @$employee_education->degree ?></a></h5>
                                    <p>Location: <?php echo @$employee_education->school_location ?></p>
                                    <p class="mt-10"><?php echo @$employee_details->description ?></p>
                                </div>
                            </div>

                        <?php endif; ?>
                        <!-- /Show resume education --->

                    </div>

                </div>

                <div class="advertise-content pl-15">
                    <h3 class="uppercase pb-16 mb-21 mt-26"><i class="fa fa-chevron-circle-right text-left"></i> Experience</h3>

                    <div class="single-job-post fix">
                        <!-- Show resume education --->
                        <?php if(@$employee_experience != null) foreach(@$employee_experience as $experience): ?>
                            <div class="job-title col-7 pl-30">
                                <div class="fix pl-30 mt-29 ">
                                    <h4 class="mb-5"><?php echo @$experience->title ?></h4>
                                    <h5>From  <?php echo date('M Y',strtotime(@$employee_education->from)) ?> To <?php echo date('M Y',strtotime(@$employee_education->to)) ?></h5>
                                    <p class="mt-10"><?php echo @$experience->description ?></p>
                                </div>
                            </div>

                        <?php endforeach;  ?>
                        <!-- /Show resume education --->

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

