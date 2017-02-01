<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-12 col-md-6 col-xs-12">
                <div class="advertise-content pl-15">
                    <h3 class="uppercase pb-16 mb-21 mt-26"><i class="fa fa-file text-left"></i> List of advertised jobs
                    </h3>

                    <p class="pr-50">Let employee apply for your job, create and manage your job adverts just by
                        following simple steps.</p>
                    <a href="<?php echo base_url() ?>recruiter/add_job" class="button large-button mt-9">Add New Job</a>
                </div>
            </div>

            <!--- SHOW THIS IF LIST IS EMPTY -->
            <?php if(isset($jobs) && $jobs == null) {
                echo '<div class="col-lg-12 col-md-6 mt-40 col-xs-12">
                <div class="advertise-content pl-15">
                    <div role="alert" class="alert alert-info"> <strong>No Adverts!</strong> You are yet to post a job, please use the button above to advertise your first job.
                    </div>
                </div>
            </div>';
            }; ?>
            <!--- /SHOW THIS IF LIST IS EMPTY -->

            <div class="col-lg-12 col-md-6 mt-40 col-xs-12">
                <div class="advertise-content pl-15">
                    <?php if (isset($jobs) && $jobs != null) foreach (@$jobs as $job): ?>
                        <div class="single-job-post fix">
                            <div class="job-title col-3 pl-30">
                          <span
                              class="pull-left block mtb-15"><?php echo date('d-m-Y', strtotime($job->date_created)) ?>
                          </span>
                                <div class="fix pl-30 mt-10">
                                    <h5><a href="<?php echo base_url() ?>portal/job/<?php echo $job->id ?>"><?php echo $job->title ?></a></h5>
                                </div>
                            </div>
                            <div class="address col-3 pl-100">
                        <span class="mtb-10 block">Applied (<?php echo intval($job->applied_count) ?>)
                            <span
                                class=""<?php echo ($job->is_active == 0) ? "style='color:brown'" : "style='color:green'" ?>><?php echo ($job->is_active == 0) ? "Inactive" : "Active" ?></span></span>
                            </div>
                            <div class="keyword col-4 pl-20 pt-7">
                                <a href="<?php echo base_url() ?>recruiter/edit_job/<?php echo $job->id; ?>"
                                   class="btn btn-default btn-sm text-info mr-10"><i class="fa fa-edit text-left"></i> Edit</a>
                                <a href="<?php echo base_url() ?>portal/job/<?php echo $job->id ?>" class="btn btn-default btn-sm text-info mr-10"> <i class="fa fa-eye text-left"></i> Preview</a>
                                <a href="<?php echo base_url() ?>recruiter/candidates/<?php echo $job->id ?>" class="btn btn-default btn-sm text-info"><i class="fa fa-users text-left"></i> Candidates</a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>

