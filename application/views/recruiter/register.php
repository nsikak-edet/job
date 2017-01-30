<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="" method="post">
                <div class="area-title text-left">
                    <h1 class="pt-10 pb-10">Create your recruiter account</h1><hr>
                </div>
                <div class="account-form-container fix mt-10">
                    <div class="login-form mt-36">
                        <div class="single-info pb-14 fix">
                            <label for="email" class="pull-left m-0 lg-text">Email*</label>
                            <div class="form-box col-4 fix">
                                <input type="email" id="email" name="email" value="<?php echo set_value('email') ?>" placeholder="Please enter your email">
                                <div class="text-danger"><?php echo form_error('email'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="first_name" class="pull-left m-0 lg-text">First Name*</label>
                            <div class="form-box col-4 fix">
                                <input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name') ?>" placeholder="Please enter your first name">
                                <div class="text-danger"><?php echo form_error('first_name'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="last_name" class="pull-left m-0 lg-text">Last Name*</label>
                            <div class="form-box col-4 fix">
                                <input type="text" id="last_name" name="last_name" value="<?php echo set_value('last_name') ?>" placeholder="Please enter your last name">
                                <div class="text-danger"><?php echo form_error('last_name'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="phone_number" class="pull-left m-0 lg-text">Phone Number*</label>
                            <div class="form-box col-4 fix">
                                <input type="text" id="phone_number" name="phone_number" value="<?php echo set_value('phone_number') ?>" placeholder="Please enter your phone number">
                                <div class="text-danger"><?php echo form_error('phone_number'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="company_name" class="pull-left m-0 lg-text">Company Name*</label>
                            <div class="form-box col-4 fix">
                                <input type="text" id="company_name" name="company_name" value="<?php echo set_value('company_name') ?>" placeholder="Please enter your company name">
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
                                       echo "<option value='$id'>$name</option>";
                                   }

                                   ?>

                                   <!--- /company_types options --->
                                   <div class="text-danger"><?php echo form_error('company_type'); ?></div>
                               </select>
                                <div class="text-danger"><?php echo form_error('company_type'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="company_type" class="pull-left m-0 lg-text">Password*</label>
                            <div class="form-box col-4 fix">
                                <input type="password" id="password" name="password" placeholder="Please enter your password">
                                <div class="text-danger"><?php echo form_error('password'); ?></div>
                            </div>
                        </div>

                        <div class="single-info mb-14 fix">
                            <label for="company_type" class="pull-left m-0 lg-text">Confirm Password*</label>
                            <div class="form-box col-4 fix">
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="Please enter your password">
                                <div class="text-danger"><?php echo form_error('confirm_password'); ?></div>
                            </div>
                        </div>

                        <div class="single-info mb-14 fix">
                        </div>
                    </div>
                    <span class="block conditions fix mt-34"><input type="checkbox" name="terms_status" class="p-0 pull-left">I agree with the terms of use</span>
                    <div class="text-danger"><?php echo form_error('terms_status'); ?></div>

                    <button class="button button-style-two medium mt-15" name="create_account" value="1">Create Account</button>
                </div>
            </form>
        </div>
    </div>
</div>

