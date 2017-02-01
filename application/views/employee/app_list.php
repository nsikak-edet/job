<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-12 col-md-6 col-xs-12">
                <div class="advertise-content pl-15">
                    <h3 class="uppercase pb-16 mb-21 mt-26"><i class="fa fa-file text-left"></i> My submitted applications
                    </h3>
                </div>
            </div>
            <div class="col-lg-12 col-md-6 mt-40 col-xs-12">
                <div class="advertise-content pl-15">
                    <?php if (isset($applications) && $applications != null) foreach (@$applications as $application): ?>
                        <div class="single-job-post fix">
                            <div class="job-title col-3 pl-30">
                          <span
                              class="pull-left block mtb-15"><?php echo date('d-m-Y', strtotime($application->date_applied)) ?>
                          </span>
                                <div class="fix pl-30 mt-10">
                                    <h5><a href="<?php echo base_url() ?>portal/job/<?php echo $application->id ?>"><?php echo $application->title ?></a></h5>
                                </div>
                            </div>
                            <div class="address col-3 pl-100">
                        <span class="mtb-10 block"><?php echo $application->company_name; ?>

                            </div>
                            <div class="keyword col-4 pl-20 pt-7 pb-20">
                                <a href="<?php echo base_url() ?>portal/job/<?php echo $application->id ?>" class="btn btn-default btn-sm text-info mr-10"> <i class="fa fa-eye text-left"></i> view</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>

