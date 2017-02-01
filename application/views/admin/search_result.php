<!--Start of Job Post Area-->
<div class="job-post-area ptb-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center ">
                    <h2 class="uppercase">Submitted Job Adverts</h2>
                    <div class="separator mt-35 mb-77">
                        <span><img src="<?php echo getAssetsURL() ?>images/icons/1.png" alt=""></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="job-post-container mb-20 fix"><h4><?php echo @$total_search_result ?> Jobs Found</h4></div>

                <div class="job-post-container fix">
                    <?php if(isset($search_result) && $search_result != null) foreach($search_result as $job) : ?>
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
                            <div class="time-payment col-12 pr-10 text-center pt-18">
                                <a href="<?php echo base_url() ?>portal/activate/<?php echo $job->id ?>?a=<?php echo ($job->is_active == 1) ? 0 : 1 ?>" class="btn btn-default btn-sm text-info mr-10"> <i class="text-left"></i>
                                    <?php echo ($job->is_active == 1) ? 'Deactivate' : 'Activate' ?>
                                </a>
                                <a href="<?php echo base_url() ?>recruiter/edit_job/<?php echo $job->id ?>" class="btn btn-default btn-sm text-info mr-10"> <i class="text-left"></i>
                                  Edit
                                </a>
                                <a href="<?php echo base_url() ?>portal/del/<?php echo $job->id ?>" class="btn btn-default btn-sm text-info mr-10"> <i class="text-left"></i>
                                    Delete
                                </a>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="job-post-container mt-20 fix"><?php echo $pagination; ?> </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Job Post Area -->