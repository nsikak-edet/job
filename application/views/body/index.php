<!--Start of Job Post Area-->
<div class="job-post-area ptb-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center ">
                    <h2 class="uppercase">Recent Jobs</h2>
                    <div class="separator mt-35 mb-77">
                        <span><img src="<?php echo getAssetsURL() ?>images/icons/1.png" alt=""></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="job-post-container fix">
                    <?php if(isset($recent_jobs) && $recent_jobs != null) foreach($recent_jobs as $job) : ?>
                    <div class="single-job-post fix">
                        <div class="job-title col-4 pl-30">
                            <div class="fix pl-10 mt-29">
                                <h4 class="mb-4"><?php echo $job->title ?></h4>
                                <h5><a href="<?php echo base_url() ?>portal/job/<?php echo $job->id ?>"><?php echo $job->company_name ?></a></h5>
                            </div>
                        </div>
                        <div class="address col-3 pl-50">
                                            <span class="mtb-30 block"><?php echo $job->job_category ?><br>
                                                <?php echo $job->job_location ?></span>
                        </div>
                        <div class="time-payment col-3 pl-60 text-center pt-5">
                            <div class="time-payment col-12 pr-10 text-center pt-5">
                                <span class="block mb-6"><?php echo $job->salary ?> <br><span style="font-size:12px;font-weight:lighter"><?php echo $job->type ?></span></span>
                                <a href="<?php echo base_url() ?>portal/job/<?php echo $job->id ?>" class="button"><?php echo $job->job_type ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Job Post Area -->