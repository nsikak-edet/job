<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="contact-info text-left fix pt-10 pb-115 ">
                    <div class="col-lg-8">
                        <div class="single-contact-icon text-center" >
                            <i class="zmdi zmdi-folder-person"></i>
                        </div>
                        <!--- PROFILE DATA ---->

                        <div class="single-contact-text mt-18">
                            <h4><?php echo @$recruiter_data->company; ?></h4>
                            <span class="block">First Name: <?php echo @$recruiter_data->first_name; ?></span>
                            <span class="block">Last Name: <?php echo @$recruiter_data->last_name; ?></span>
                            <span class="block">Type: <?php echo @$recruiter_data->type; ?> </span>
                            <span class="block">Date Registered: <?php echo date('D d F, Y',strtotime(@$recruiter_data->company)); ?></span>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-contact-icon text-center">
                            <i class="zmdi zmdi-phone"></i>
                        </div>
                        <div class="single-contact-text mt-18">
                            <span class="block">Phone: <?php echo @$recruiter_data->phone_number; ?></span>
                            <span class="block">Email: <?php echo @$recruiter_data->email; ?></span>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-20">
                         <a href="<?php echo base_url(); ?>recruiter/edit_profile" class="button button-medium-box">edit profile</a>
                    </div>
                </div>
        </div>
    </div>
</div>

