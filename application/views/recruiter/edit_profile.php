<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php if(isset($msg) && $msg != null) echo "<div role='alert' class='alert alert-success'> <strong>Profile successfully saved!</strong> </div>"; ?>
            <form action="" method="post">
                <div class="area-title text-left">
                    <h1 class="pt-10 pb-10">Edit Profile Data</h1><hr>
                </div>
                <div class="account-form-container fix mt-10">
                    <div class="login-form mt-36">
                        <div class="single-info pb-14 fix">
                            <label for="email" class="pull-left m-0 lg-text">Email*</label>
                            <div class="form-box col-4 fix">
                                <input type="email" value="<?php echo @$recruiter_data->email; ?>" id="email" name="email" placeholder="Please enter your email">
                                <div class="text-danger"><?php echo form_error('email'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="first_name" class="pull-left m-0 lg-text">First Name*</label>
                            <div class="form-box col-4 fix">
                                <input type="text" value="<?php echo @$recruiter_data->first_name; ?>" id="first_name" name="first_name" placeholder="Please enter your first name">
                                <div class="text-danger"><?php echo form_error('first_name'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="last_name" class="pull-left m-0 lg-text">Last Name*</label>
                            <div class="form-box col-4 fix">
                                <input type="text" value="<?php echo @$recruiter_data->last_name; ?>" id="last_name" name="last_name" placeholder="Please enter your last name">
                                <div class="text-danger"><?php echo form_error('last_name'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="phone_number" class="pull-left m-0 lg-text">Phone Number*</label>
                            <div class="form-box col-4 fix">
                                <input type="text" id="phone_number" name="phone_number" value="<?php echo @$recruiter_data->phone_number; ?>" placeholder="Please enter your phone number">
                                <div class="text-danger"><?php echo form_error('phone_number'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="company_name" class="pull-left m-0 lg-text">Company Name*</label>
                            <div class="form-box col-4 fix">
                                <input type="text" id="company_name" name="company_name" value="<?php echo @$recruiter_data->company; ?>" placeholder="Please enter your company name">
                                <div class="text-danger"><?php echo form_error('company_name'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="company_type" class="pull-left m-0 lg-text">Company Type*</label>
                            <div class="form-box col-4 fix">
                               <select class="form-control" name="company_type">
                                   <option value="0">Select</option>
                                   <!--- company_type options --->
                                   <?php

                                   foreach($company_types as $type){
                                       $name = htmlspecialchars($type->type);
                                       $id = intval($type->id);
                                       $select_default = ($type->type == @$recruiter_data->type) ? 'selected' : '';
                                       echo "<option value='$id' $select_default>$name</option>";
                                   }

                                   ?>
                                   <!--- /company_types options --->

                               </select>
                                <div class="text-danger"><?php echo form_error('company_type'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                        </div>
                    </div>
                    <button class="button button-style-two medium mt-15" name="update_profile" value="1">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>

