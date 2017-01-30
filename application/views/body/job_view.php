<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-12 col-md-6 col-xs-12">

                <div class="advertise-content pl-15">
                    <h3 class="uppercase pb-16 mb-21 mt-26"><i class="fa fa-chevron-circle-right text-left"></i> Job Details </h3>

                    <div class="single-job-post fix">
                        <!-- Show resume education --->
                        <?php if(@$job != null): ?>
                            <div class="job-title col-7 pl-30">
                                <div class="fix pl-30 mt-29 ">
                                    <h4 class="mb-5">Job Title: <?php echo @$job->title ?></h4>
                                    <h5><a href="#"><?php echo @$job->company_name ?></a></h5><br>
                                    <p>Company Address: <?php echo @$job->company_address ?><br>
                                        Location: <?php echo @$job->job_location ?> <br>
                                        Category: <?php echo @$job->job_category ?> <br>
                                        <span class="text-info"><?php echo @$job->job_type ?></span> <br>
                                        Salary: <?php echo @$job->salary ?> ( <?php echo @$job->type ?>)<br>
                                        Expiration: <?php echo date('dS F, Y',strtotime($job->expiration_date)) ?>
                                        </p>

                                   <h4 class="mt-40">Job Description</h4>
                                   <p class="mt-10 pb-20"><?php echo @$job->job_description ?></p>
                                </div>
                            </div>

                        <?php endif; ?>
                        <!-- /Show resume education --->

                    </div>

                </div>

                <div class="advertise-content pl-15 mt-20">
                    <div class=" fix">
                        <div class="col-lg-12 col-md-6 col-xs-12">
                            <a href="<?php echo base_url() ?>portal/apply/<?php echo @$job->id ?>" class="button large-button mt-9">Apply Now</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

