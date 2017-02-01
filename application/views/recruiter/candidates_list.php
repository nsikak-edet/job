<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-12 col-md-6 col-xs-12">
                <div class="advertise-content pl-15">
                    <h3 class="uppercase pb-16 mb-21 mt-26"><i class="fa fa-users text-left"></i> Candidates
                    </h3>
                    <p class="pr-50"><?php echo sizeof(@$candidates) ?> candidates applied for this job<b</p>

                </div>
            </div>

            <div class="col-lg-12 col-md-6 mt-10 col-xs-12">
                <div class="advertise-content pl-15">
                    <?php if (isset($candidates) && $candidates != null) foreach (@$candidates as $candidate): ?>
                        <div class="single-job-post fix">
                            <div class="job-title col-3 pl-30">
                          <span
                              class="pull-left block mtb-15"><?php echo date('d-m-Y', strtotime($candidate->date_created)) ?>
                          </span>
                                <div class="fix pl-30 mt-10">
                                    <h5><a href="<?php echo base_url() ?>portal/job/<?php echo $candidate->id ?>"><?php echo $candidate->first_name . ' '.$candidate->middle_name.' '.$candidate->last_name; ?></a></h5>
                                </div>
                            </div>
                            <div class="address col-3 pl-100">
                        <span class="mtb-10 block"><?php echo $candidate->city ?>
                            </div>
                            <div class="keyword col-4 pl-20 pt-7">
                                <a href="<?php echo base_url() ?>employee/view/<?php echo $candidate->id ?>" class="btn btn-default btn-sm text-info mr-10"> <i class="fa fa-eye text-left"></i> Candidate Resume</a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>

