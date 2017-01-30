<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form method="post" action="<?php echo base_url() ?>recruiter/add_job"  id="newAdvertForm">
                <div class="area-title text-left">
                    <div>

                    </div>
                    <h1 class="pt-10 pb-10">Create New Job Advert</h1><hr>
                </div>
                <div class="account-form-container fix mt-10">
                    <h5>Company Details</h5>
                    <div class="login-form mt-36">
                        <div class="single-info pb-14 fix">
                            <label for="text" class="pull-left m-0 lg-text">Job Title*</label>
                            <div class="form-box col-4 fix">
                                <input type="text" id="title" name="title" value="<?php echo set_value('title') ?>" placeholder="Please enter job title">
                                <div class="text-danger title_error error"><?php echo form_error('title'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="company_name" class="pull-left m-0 lg-text">Company Name*</label>
                            <div class="form-box col-4 fix">
                                <input type="text" id="company_name" name="company_name" value="<?php echo set_value('company_name') ?>" placeholder="Please enter company name ">
                                <div class="text-danger company_name_error error"><?php echo form_error('company_name'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="company_address" class="pull-left m-0 lg-text">Company Address*</label>
                            <div class="form-box col-4 fix">
                                <input type="text" id="company_address" name="company_address" value="<?php echo set_value('company_address') ?>" placeholder="Please enter company address">
                                <div class="text-danger company_address_error error"><?php echo form_error('company_address'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="email_address" class="pull-left m-0 lg-text">Email Address*</label>
                            <div class="form-box col-4 fix">
                                <input type="email" id="email" name="email" value="<?php echo set_value('email') ?>" placeholder="Please enter email address">
                                <div class="text-danger email_error error"><?php echo form_error('email'); ?></div>
                            </div>
                        </div>


                        <div class="single-info mb-14 fix"><br>
                            <h5>Job Details</h5>
                        </div>

                        <div class="single-info mb-14 fix">
                            <label for="salary" class="pull-left m-0 lg-text">Salary</label>
                            <div class="form-box col-4 fix">
                                <input type="text" id="salary" name="salary" value="<?php echo set_value('salary') ?>" placeholder="Please enter salary for this job">
                                <div class="text-danger salary_error error"><?php echo form_error('salary'); ?></div>
                            </div>
                        </div>
                        <div class="single-info mb-14 fix">
                            <label for="company_type" class="pull-left m-0 lg-text">Salary type</label>
                            <div class="form-box col-4 fix">
                                <select name="salary_type">
                                    <option value="0">Select</option>

                                    <!-- Salary Types  --->
                                    <?php foreach(@$salary_types as $salary_type){
                                        $name = $salary_type->type;
                                        $id = $salary_type->id;
                                        echo "<option value='$id'>$name</option>";
                                    } ?>
                                </select>
                                <div class="text-danger salary_type_error error"><?php echo form_error('salary_type'); ?></div>
                            </div>
                        </div>

                        <div class="single-info mb-14 fix">
                            <label for="job_type" class="pull-left m-0 lg-text">Job Type*</label>
                            <div class="form-box col-4 fix">
                               <select name="job_type">
                                   <option value="0">Select</option>
                                   <!-- Job Types  --->
                                   <?php foreach(@$job_types as $job_type){
                                       $name = $job_type->name;
                                       $id = $job_type->id;
                                       echo "<option value='$id'>$name</option>";
                                   } ?>
                               </select>
                                <div class="text-danger job_type_error error"><?php echo form_error('job_type'); ?></div>
                            </div>
                        </div>

                        <div class="single-info mb-14 fix">
                            <label for="job_location" class="pull-left m-0 lg-text">Job Location*</label>
                            <div class="form-box col-4 fix">
                                <select name="job_location">
                                    <option value="0">Select</option>
                                    <!-- Job Locations  --->
                                    <?php foreach(@$job_locations as $job_location){
                                        $name = $job_location->name;
                                        $id = $job_location->id;
                                        echo "<option value='$id'>$name</option>";
                                    } ?>
                                </select>
                                <div class="text-danger job_location_error error"><?php echo form_error('job_location'); ?></div>
                            </div>
                        </div>

                        <div class="single-info mb-14 fix">
                            <label for="job_category" class="pull-left m-0 lg-text">Job Category*</label>
                            <div class="form-box col-4 fix">
                                <select name="job_category">
                                    <option value="0">Select</option>
                                    <!-- Job Locations  --->
                                    <?php foreach(@$job_categories as $job_category){
                                        $name = $job_category->name;
                                        $id = $job_category->id;
                                        echo "<option value='$id'>$name</option>";
                                    } ?>
                                </select>
                                <div class="text-danger job_category_error error"><?php echo form_error('job_category'); ?></div>
                            </div>
                        </div>

                        <div class="single-info mb-14 fix">

                            <div class="form-box col-12 fix">
                                <label for="descripton" class="pull-left m-0 lg-text">Job Description*</label>
                            </div>
                        </div>
                         <div class="single-info mb-14 fix">
                            <textarea name="job_description" class="tinymcetext"></textarea>
                            <div class="text-danger job_description_error error"></div>
                        </div>
                        <div class="single-info pb-14 fix">
                            <label for="text" class="pull-left m-0 lg-text">Expiration Date*</label>
                            <div class="form-box col-4 fix">
                                <input type="text" id="expiration_date" name="expiration_date" value="" placeholder="Please enter job expiration date">
                                <div class="text-danger expiration_date_error error"><?php echo form_error('title'); ?></div>
                            </div>
                        </div>
                        <input type="hidden" name="create_new_job" value="1" />
                    </div>
                    <button class="button button-style-two medium mt-15">Create New Job Advert</button>
                </div>
            </form>
        </div>
    </div>
</div>

