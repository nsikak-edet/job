<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

                <div class="area-title text-left">
                    <h1 class="pt-10 pb-10">My Resume</h1><hr>

                </div>

            <div class="job-post-container fix mb-10">
                <div class="single-job-post fix" style="border:none">
                    <?php if(@$employee_details->passport != ''): ?>
                    <img alt="passport" style="border:2px inset #5bc0de" src="<?php echo base_url(); ?>uploads/passports/<?php echo @$employee_details->passport; ?>" width="180px" alt="">
                    <?php endif; ?>
                </div>

            </div>



            <div class="job-post-container fix mb-10">
                    <div class="single-job-post fix">
                        <div class="keyword col-4 pl-20 pt-10 pb-10">
                            <span class='text-info pt-20' id="upload-file-info"></span>
                            <span class='text-danger pt-20'><?php echo @$upload_error; ?></span>
                            <form action="upload_passport" method="post" enctype="multipart/form-data" class="form-inline">
                                <div class="form-group">
                                    <label class="btn btn-info" for="my-file-selector">
                                        <input id="my-file-selector" name="passport" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                                        Upload your passport
                                    </label>
                                </div>
                                <div class="form-group"><button id=""  class="button button-style-two medium">Upload</button></div>
                            </form>
                        </div>
                    </div>
            </div>

                <div class="panel-group" id="accordion">
                    <!--- EMPLOYEE DETAILS --->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                            </span>Employee Details</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in resumeDetails">
                            <div class="panel-body">
                                <form method="post" action="<?php echo base_url() ?>employee/save_details" id="resumeDetails" >
                                   <!--- employee details --->
                                    <div class="account-form-container fix mt-10">
                                        <h5>Employee Details</h5>
                                        <div class="login-form mt-36">
                                            <div class="single-info pb-14 fix">
                                                <label for="text" class="pull-left m-0 lg-text">First Name*</label>
                                                <div class="form-box col-4 fix">
                                                    <input type="text" id="first_name" name="first_name" value="<?php echo @$employee_details->first_name; ?>" placeholder="Please enter first name">
                                                    <div class="text-danger first_name_error error"><?php echo form_error('first_name'); ?></div>
                                                </div>
                                            </div>
                                            <div class="single-info mb-14 fix">
                                                <label for="middle_name" class="pull-left m-0 lg-text">Middle Name*</label>
                                                <div class="form-box col-4 fix">
                                                    <input type="text" id="middle_name" name="middle_name" value="<?php echo @$employee_details->middle_name; ?>" placeholder="Please enter middle name (initials) ">
                                                    <div class="text-danger middle_name_error error"><?php echo form_error('middle_name'); ?></div>
                                                </div>
                                            </div>
                                            <div class="single-info mb-14 fix">
                                                <label for="last_name" class="pull-left m-0 lg-text">Last Name*</label>
                                                <div class="form-box col-4 fix">
                                                    <input type="text" id="last_name" name="last_name" value="<?php echo @$employee_details->last_name; ?>" placeholder="Please enter last name">
                                                    <div class="text-danger last_name_error error"><?php echo form_error('last_name'); ?></div>
                                                </div>
                                            </div>
                                            <div class="single-info mb-14 fix">
                                                <label for="country" class="pull-left m-0 lg-text">Country*</label>
                                                <div class="form-box col-4 fix">
                                                    <select name="country">
                                                        <option value="0">Select</option>
                                                        <?php
                                                            if(isset($countries)){
                                                                foreach($countries as $country){

                                                                    $id = $country->id;
                                                                    $name = $country->country_name;
                                                                    $selected = ($id == @$employee_details->country) ? "selected" : "";
                                                                    echo "<option value='$id' $selected>$name</option>";
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                    <div class="text-danger country_error error"><?php echo form_error('country'); ?></div>
                                                </div>
                                            </div>

                                            <div class="single-info mb-14 fix">
                                                <label for="city" class="pull-left m-0 lg-text">City*</label>
                                                <div class="form-box col-4 fix">
                                                    <input type="text" id="city" name="city" value="<?php echo @$employee_details->city; ?>" placeholder="Please enter city">
                                                    <div class="text-danger city_error error"><?php echo form_error('city'); ?></div>
                                                </div>
                                            </div>
                                            <div class="single-info mb-14 fix">
                                                <label for="address" class="pull-left m-0 lg-text">Address*</label>
                                                <div class="form-box col-4 fix">
                                                    <input type="text" id="address" name="address" value="<?php echo @$employee_details->address; ?>" placeholder="Please enter address">
                                                    <div class="text-danger address_error error"><?php echo form_error('address'); ?></div>
                                                </div>
                                            </div>

                                            <div class="single-info mb-14 fix">
                                                <label for="phone_number" class="pull-left m-0 lg-text">Phone Number*</label>
                                                <div class="form-box col-4 fix">
                                                    <input type="text" id="city" name="phone_number" value="<?php echo @$employee_details->phone_number; ?>" placeholder="Please enter phone number">
                                                    <div class="text-danger phone_number_error error"><?php echo form_error('job_type'); ?></div>
                                                </div>
                                            </div>

                                            <div class="single-info mb-14 fix">
                                                <label for="email" class="pull-left m-0 lg-text">Email*</label>
                                                <div class="form-box col-4 fix">
                                                    <input type="text" id="email" name="email" value="<?php echo @$employee_details->email; ?>" placeholder="Please enter email">
                                                    <div class="text-danger email_error error"><?php echo form_error('email'); ?></div>
                                                </div>
                                            </div>

                                            <div class="mb-14 mt-30">
                                                <div class="col-12">
                                                    <label for="descripton" class=" m-0 lg-text"><h6>Description of yourself*</h6></label>
                                                </div>
                                            </div>
                                            <style>
                                                #summernote ul{list-style:disc}
                                            </style>

                                            <div class="single-info mb-14 fix">
                                                <textarea name="description" style="height:20px" class="tinymcetext"><?php echo @$employee_details->description; ?></textarea>
                                                <div class="text-danger description_error error"></div>
                                            </div>

                                            <div role='alert' class='alert alert-success pt-10' id="resume_success_msg" style="display:none"> <strong>Resume Data saved!</strong> </div>
                                            <input type="hidden" name="employee_details" value="1" />
                                        </div>
                                        <button id="" ng-click="saveResumeDetails()" class="button button-style-two medium mt-15">Save</button>

                                    </div>
                                    <!--- /employee details --->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--- /EMPLOYEE DETAILS --->

                    <!--- EMPLOYEE EDUCATION --->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                            </span>Employee Education</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse employeeEducation">
                            <div class="panel-body">
                                <form method="post" action="<?php echo base_url() ?>employee/save_education" id="employeeEducation" >
                                    <!--- employee education --->
                                    <div class="account-form-container fix mt-10">
                                        <h5>Employee Details</h5>
                                        <div class="login-form mt-36">
                                            <div class="single-info pb-14 fix">
                                                <label for="text" class="pull-left m-0 lg-text">School Location*</label>
                                                <div class="form-box col-4 fix">
                                                    <input type="text" id="school_location" name="school_location" value="<?php echo @$employee_education->school_location; ?>" placeholder="Please enter where you got your degree">
                                                    <div class="text-danger school_location_error error"><?php echo form_error('school_location'); ?></div>
                                                </div>
                                            </div>
                                            <div class="single-info pb-14 fix">
                                                <label for="text" class="pull-left m-0 lg-text">School Name*</label>
                                                <div class="form-box col-4 fix">
                                                    <input type="text" id="school_name" name="school_name" value="<?php echo @$employee_education->school_name; ?>" placeholder="Please enter school name/college name">
                                                    <div class="text-danger school_name_error error"><?php echo form_error('school_name'); ?></div>
                                                </div>
                                            </div>
                                            <div class="single-info mb-14 fix">
                                                <label for="degree" class="pull-left m-0 lg-text">Degree*</label>
                                                <div class="form-box col-4 fix">
                                                    <input type="text" id="degree" name="degree" value="<?php echo @$employee_education->degree; ?>" placeholder="Please enter degree ">
                                                    <div class="text-danger degree_error error"><?php echo form_error('degree'); ?></div>
                                                </div>
                                            </div>
                                            <div class="mb-14 mt-30">
                                                <div class="col-12">
                                                    <label for="descripton" class=" m-0 lg-text"><h6>Description*</h6></label>
                                                </div>
                                            </div>
                                            <style>
                                                #summernote ul{list-style:disc}
                                            </style>

                                            <div class="single-info mb-14 fix">
                                                <textarea name="description" style="height:20px" class="tinymcetext_small"><?php echo @$employee_education->description; ?></textarea>
                                                <div class="text-danger edu_description_error error"></div>
                                            </div>

                                            <div role='alert' class='alert alert-success pt-10' id="edu_success_msg" style="display:none"> <strong>Resume Data saved!</strong> </div>
                                            <input type="hidden" name="employee_education" value="1" />
                                        </div>
                                        <button id=""  class="button button-style-two medium mt-15">Save</button>

                                    </div>
                                    <!--- /employee education --->
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                            </span>Experience</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse employeeExperience">
                            <div class="panel-body">
                                <form method="post" action="<?php echo base_url() ?>employee/save_experience" id="employeeExperience" >
                                    <!--- employee experience --->
                                    <div class="account-form-container fix mt-10">
                                        <h5>Employee Experience</h5>

                                        <?php for(@$experience = 1; $experience <= 2; $experience) : ?>
                                        <div class="login-form mt-36">
                                            <div class="single-info pb-14 fix">
                                                <label for="text" class="pull-left m-0 lg-text">Title*</label>
                                                <div class="form-box col-4 fix">
                                                    <input type="text" id="title" name="title<?php echo $experience ?>" value="<?php echo @$employee_experience[$experience-1]->title; ?>" placeholder="Please enter job title">
                                                    <div class="text-danger title<?php echo $experience ?>_error error"><?php echo form_error('title'); ?></div>
                                                </div>
                                            </div>
                                            <div class="single-info pb-14 fix">
                                                <label for="text" class="pull-left m-0 lg-text">From*</label>
                                                <div class="form-box col-4 fix">
                                                    <input type="text" id="from" name="from<?php echo $experience ?>" value="<?php echo @$employee_experience[$experience-1]->from; ?>" placeholder="Please enter date">
                                                    <div class="text-danger from<?php echo $experience ?>_error error"><?php echo form_error('from'); ?></div>
                                                </div>
                                            </div>
                                            <div class="single-info mb-14 fix">
                                                <label for="degree" class="pull-left m-0 lg-text">To*</label>
                                                <div class="form-box col-4 fix">
                                                    <input type="text" id="to" name="to<?php echo $experience ?>" value="<?php echo @$employee_experience[$experience-1]->to; ?>" placeholder="Please enter date ">
                                                    <div class="text-danger to<?php echo $experience ?>_error error"><?php echo form_error('to'); ?></div>
                                                </div>
                                            </div>
                                            <div class="mb-14 mt-30">
                                                <div class="col-12">
                                                    <label for="descripton" class=" m-0 lg-text"><h6>Description of Job*</h6></label>
                                                </div>
                                            </div>
                                            <div class="single-info mb-14 fix">
                                                <textarea name="description<?php echo $experience ?>" style="height:20px" class="tinymcetext_small"><?php echo @$employee_experience[$experience-1]->description; ?></textarea>
                                                <div class="text-danger ex_description<?php echo $experience ?>_error error"></div>
                                            </div>

                                            <input type="hidden" name="employee_experience" value="1" />
                                        </div>
                                        <?php $experience++; endfor; ?>
                                        <div role='alert' class='alert alert-success pt-10' id="exp_success_msg" style="display:none"> <strong>Resume Data saved!</strong> </div>
                                        <button id=""  class="button button-style-two medium mt-15">Save</button>

                                    </div>
                                    <!--- /employee experience --->
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

        </div>
    </div>
</div>

